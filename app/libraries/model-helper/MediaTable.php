<?php 


class MediaTable  extends TableHelper
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
			'file'			=> '',
			'post_title'	=> 'File',
			'author'		=> array( 'label' => 'Author', 'class' => 'hidden-sm hidden-xs'),
			'post_date' 	=> array( 'label' => 'Post Date', 'class' => 'hidden-sm hidden-xs'),
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
    	return sprintf(
            '<a href="media/%s/edit">%s</a>', $item['id'], $item['post_title']
        );
    }

    public function column_file( $item ) 
    {
    	$post = new PPost();
    	$attachment = $post->getAttachment($item['id'], 'thumbnail');
    	return sprintf(
            '<img src="%s" />', $attachment
        );
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
			'author' 		=> array('author', true),
			'post_date'		=> array('post_date', true),
			'updated_at' 	=> array('updated_at'),
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


		$this->query = "SELECT p.id, p.post_title, p.guid as file, u.firstname as author, p.post_date, p.updated_at, p.post_status FROM ".DB::getTablePrefix()."posts as p left join ".DB::getTablePrefix()."users as u on p.author_id = u.id WHERE post_type='attachment' ";

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
			'orderby'  		=> isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : 'name',
			'order' 		=> isset($_REQUEST['order']) ? $_REQUEST['order'] : 'asc',

		) );
			
	}


	



}