<?php 


class PostItemTypeTable  extends TableHelper
{
	private $query;
	private $config = array();
	private $data 	= null;
	private $post_type = null;


	public function __construct($post_type)
	{	
		$this->post_type = $post_type;
	}

	public function column_default($item, $column_name)
	{

	    return $item[ $column_name ];
    	
	}

	public function get_columns()
	{
		$columns = array(
			'post_title'	=> 'Title',
			'post_date'		=> 'Date',
			'post_status' 	=> 'Status',
		);
		return $columns;
	}

    public function column_post_title( $item ) 
    {
    	return sprintf(
            '<a class="item_type" data-dismiss="modal" data-id="%d" href="#">%s</a>', $item['id'], $item['post_title'] //'.URL::to('admin/member/%s/edit').' $item['id'], 
        );
    }

    public function column_post_status( $item )
    {
    	if($item['post_status']){
    		$status = 'label-success';
    		$text = 'Active';
    	}
    	else
    	{
    		$status = 'label-danger';
    		$text = 'Inactive';
    	}   
    	return sprintf('<span class="label %s">%s</span>', $status, $text);
    }

 


    public function get_searchable_columns()
    {
    	$searchable_columns = array(
    		'post_title'
    	);

    	return $searchable_columns;
    }

	public function get_sortable_columns()
	{
		$sortable_columns = array(
			'post_title' => array('post_title', true),
			'post_status' => array('post_status', true),
			'post_date'	=> array('post_status', true),
		);
		return $sortable_columns;
	}

	public function usort_reorder($a, $b)
	{

		$orderby 	= (isset($_REQUEST['orderby']) && !empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'post_status';

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
	
		$tablPrefix = DB::getTablePrefix();
		$sortable 	= $this->get_sortable_columns();
		$hidden 	= array();
		$columns 	= $this->get_columns();

		$this->_column_headers = array( $columns, $hidden, $sortable );


		$this->query = "SELECT 
				id, 
				post_title,
				post_date,
				post_status 
			FROM ".$tablPrefix."posts WHERE post_type='".$this->post_type."' ";

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