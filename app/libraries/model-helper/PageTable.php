<?php 


class PageTable  extends TableHelper
{
	private $query;
	private $table 	= "posts";
	private $config = array();
	private $data 	= null;

	public function column_default($item, $column_name)
	{

	    return $item[ $column_name ];
	}

	public function get_columns()
	{
		$columns = array(
			'id' 			=> '<input type="checkbox" name="cb" class="checkall" />',
			'post_title'	=> 'Title',
			'guid'			=> array( 'label' => 'Slug', 'class' => 'hidden-sm hidden-xs'),
			'author'		=> 'Author',
			'post_date'		=> array( 'label' => 'Posted Date', 'class' => 'hidden-sm hidden-xs'),
			'post_status' 	=> 'Status',
		);
		return $columns;
	}

	public function column_id( $item ) 
	{

        return sprintf(
            '<input type="checkbox" name="cid[]" value="%s" />', $item['id']
        );    
    }

    public function column_post_title( $item ) 
    {
		$title =(strlen($item['post_title']) > 50) ? substr($item['post_title'], 0, 50).'...' : $item['post_title'];
    	return sprintf(
            '<a href="page/%s/edit">%s</a>
        	 <div class="row-actions">
	            <span class="edit">
	                <a href="page/%s/edit" title="Edit this item">Edit</a> |
	            </span>
	            <span class="view">
	                <a href="%s" target="_blank" title="Delete " rel="permalink">View</a> | 
	            </span>
	            <span class="delete">
	                <a href="page/delete?cid[]=%s" class="confirm-delete" title="Delete " rel="permalink">Delete</a>
	            </span>
	         </div>
            ', $item['id'], $title,$item['id'], URL::to($item['guid']),$item['id']	
        );

		// $title =(strlen($item['post_title']) > 50) ? substr($item['post_title'], 0, 50).'...' : $item['post_title'];
  //   	return sprintf(
  //           '<a href="page/%s/edit">%s</a>', $item['id'], $title
  //       );
    }
	


    public function column_post_status( $item )
    {
    	if($item['post_status'] == 'publish'){
    		$status = 'label-success';
    		$text = 'Published';
    	}
    	elseif($item['post_status'] == 'draft')
    	{
    		$status = 'label-elite-gold';
    		$text = 'Draft';
    	}   
    	elseif($item['post_status'] == 'auto-draft')
    	{
    		$status = 'btn-light-blue';
    		$text = 'Auto Draft';
    	} 
		else
    	{
    		$status = 'label-danger';
    		$text = 'Trashed';
    	}
    	return sprintf('<span class="label %s">%s</span>', $status, $text);
    }

 


    public function get_searchable_columns()
    {
    	$searchable_columns = array(
    		'post_title',
    	);

    	return $searchable_columns;
    }

	public function get_sortable_columns()
	{
		$sortable_columns = array(
			'post_title' 	=> array('post_title', true),
			'author'		=> array('author', true),
			'post_date'		=> array('post_date', true),
			'post_status' 	=> array('post_status', true)
		);
		return $sortable_columns;
	}

	public function usort_reorder($a, $b)
	{

		$orderby 	= (isset($_REQUEST['orderby']) && !empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'post_title';

		$order 		= (isset($_REQUEST['order']) && !empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc';


		$result     = strcmp($a[$orderby], $b[$orderby]);

		return ( $order == 'asc' ) ? $result : -$result; 

	}

	public function _search()
	{
		$query = '';
		

		if(isset($_REQUEST['s']))
		{	
			$s = $_REQUEST['s'];

			$columns = $this->get_searchable_columns();
			
			$t_column = count($columns) - 1;
			

			$query = " AND (";
			foreach( $columns as $index => $column )
			{
				$query .= " $column LIKE '%$s%' ";
				if($t_column !=  $index) $query .= " OR ";
			}
			$query .= ")";
			
		}

		return $query;
		
	}

	

	public function prepare_items()
	{	
	

		$sortable 	= $this->get_sortable_columns();
		$hidden 	= array();
		$columns 	= $this->get_columns();

		$this->_column_headers = array( $columns, $hidden, $sortable );
		$tablPrefix = DB::getTablePrefix();

		$this->query = "SELECT 
				p.id, 
				p.guid,
				p.post_title, 
				u.firstname as author, 
				p.post_date,
				p.post_status 
			FROM 
				".$tablPrefix."posts as p 
				left join 
				".$tablPrefix."users as u on p.author_id = u.id 
			WHERE post_type='page' ";

		$this->query .= $this->_search();

		$resultSet = DB::select($this->query);


		$data = $this->arrayCastRecursive($resultSet);


		$total_items = count($data);

		$per_page = ( isset($_REQUEST['per_page']) ) ? (int)$_REQUEST['per_page'] : 10;

		$page = ( isset($_REQUEST['page']) && $_REQUEST['page'] > 0  ) ? $_REQUEST['page'] - 1 : 0;

		$offset = $page * $per_page;
		

		usort($data, array(&$this, 'usort_reorder'));

		
		$data = array_slice($data, $offset, $per_page);

		$this->items = $data;



		$this->set_pagination_args( array(
			'total_items' 	=> $total_items,
			'per_page'    	=> $per_page,
			'current_page' 	=> $page + 1, 
			'total_page' 	=> ceil($total_items / $per_page), 
			'search' 		=> isset($_REQUEST['s']) ? $_REQUEST['s'] : null,
			'orderby'  		=> isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : 'post_title',
			'order' 		=> isset($_REQUEST['order']) ? $_REQUEST['order'] : 'asc',

		) );
			
	}


	



}