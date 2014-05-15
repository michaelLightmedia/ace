<?php 


class CommentTable  extends TableHelper
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
			'author' 	=> array( 'label' => 'Author', 'style' => 'width: 200px'),
			'comment'		=> 'Comment',
			'post_title'		=> 'In Response To'
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
		$title =  $item['post_title']; //(strlen($item['post_title']) > 50) ? substr($item['post_title'], 0, 50).'...' : $item['post_title'];
    	return sprintf(
            '<a href="%s" target="_blank">%s</a>',URL::to($item['post_type'].'/'.$item['guid']), $title
        );
    }


    public function column_comment( $item ) 
    {
		$comment = $item['comment'];
		$commentHTML = '<div class="submitted-on">Submitted on <a>'. date('Y/m/d', strtotime($item['created_at'])) .' at '. date('H:i A', strtotime($item['created_at'])) .' </a></div>';
		$commentHTML .= '<p>'.$comment.'</p>';

		return $commentHTML;
    }

    public function column_author( $item ) 
    {
		$comment = $item['comment'];
		$commentHTML = '<img src="'.URL::to(UserHelper::avatar($item['user_id'], '40x40')).'" class="pull-left mr-15px" />';
		$commentHTML .= '<span>'.$item['author'].'</span>';

		return $commentHTML;
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
			'comment'		=> array('comment', true),
			'post_title' 	=> array('post_title', true),
			'author'		=> array('author', true),
			'created_at'		=> array('created_at', true)
		);
		return $sortable_columns;
	}

	public function usort_reorder($a, $b)
	{

		$orderby 	= (isset($_REQUEST['orderby']) && !empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'created_at';

		$order 		= (isset($_REQUEST['order']) && !empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'desc';


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
				pc.id, 
				pc.user_id,
				pc.comment,
				pc.created_at,
				concat(u.firstname,' ', u.lastname) as author,
				p.post_type,
				p.guid,
				p.post_title
			FROM 
				".$tablPrefix."posts_comments as pc 
				LEFT JOIN
				".$tablPrefix."posts as p on pc.post_id = p.id
				LEFT JOIN 
				".$tablPrefix."users as u on u.id = pc.user_id ";

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
			'orderby'  		=> isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : 'created_at',
			'order' 		=> isset($_REQUEST['order']) ? $_REQUEST['order'] : 'asc',

		) );
			
	}


	



}