<?php 


class UserTable  extends TableHelper
{
	private $query;
	private $table 	= "Site_users";
	private $config = array();
	private $data 	= null;

	public function column_default($item, $column_name)
	{
		switch( $column_name ) 
		{ 
	        case 'id':
	        case 'email':
	            return $item[ $column_name ];
	        case 'name':
	         	return $item['firstname'].' '. $item['lastname'];
	        default:
	        	return $item[ $column_name ];
    	}
	}

	public function get_columns()
	{
		$columns = array(
			'id' 			=> '<input type="checkbox" name="cb" class="checkall" />',
			'name'			=> 'Name',
			'email'			=> array( 'label' => 'Email', 'class' => 'hidden-sm hidden-xs'),
			'address_1' 	=> array( 'label' => 'Address', 'class' => 'hidden-sm hidden-xs'),
			'group' 		=> 'Group',
			'active' 		=> 'Active'
		);
		return $columns;
	}

	public function column_id( $item ) 
	{

        return sprintf(
            '<input type="checkbox" name="cid[]" value="%s" />', $item['id']
        );    
    }

    public function column_name( $item ) 
    {
    	return sprintf(
            '<a href="'.URL::to('admin/member/%s/edit/membership').'">%s</a>', $item['id'], $item['name']
        );
    }

    public function column_active( $item )
    {
    	if($item['active']){
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
    		'concat(firstname," ",lastname)',
    		'email',
    		'address_1',
    	);

    	return $searchable_columns;
    }

	public function get_sortable_columns()
	{
		$sortable_columns = array(
			'name' 		=> array('name', true),
			'email' 	=> array('email', true),
			'address_1'	=> array('address_1', true),
			'group'		=> array('group', true),
			'active' 	=> array('active', true),
			'created_at' => array('created_at', true), 
		);
		return $sortable_columns;
	}

	public function usort_reorder($a, $b)
	{

		$orderby 	= (isset($_REQUEST['orderby']) && !empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'name';

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
	
		$input = Input::all();



		$sortable 	= $this->get_sortable_columns();
		$hidden 	= array();
		$columns 	= $this->get_columns();
		$tblPrefix 	= DB::getTablePrefix();
		$this->_column_headers = array( $columns, $hidden, $sortable );


		$this->query = "SELECT u.id, 
			concat(u.firstname,' ', u.lastname) as name, 
			u.created_at, 
			u.total_spend,
			u.points,
			g.group,
			u.created_at,
			u.active,
			u.email,
			u.gender,
			u.address_1
			FROM ".$tblPrefix."users as u
			LEFT JOIN ".$tblPrefix."groups as g ON g.id = u.group_id 
			WHERE 1 = 1 ";

		$this->query .= $this->_search();


		if( isset($input['filter_active']) && $input['filter_active'] != -1)
		{
			$this->query .= " and u.active = '".(int)$input['filter_active']."'";
		}

		if( isset($input['filter_from']) && isset($input['filter_to']) && trim( $input['filter_from'] ) != '' && trim($input['filter_to']) != '' )
		{
			$this->query .= " and DATE_FORMAT(u.created_at, '%Y-%m-%d') >= '".date('Y-m-d', strtotime($input['filter_from']))."'";
			$this->query .= " and DATE_FORMAT(u.created_at, '%Y-%m-%d') <= '".date('Y-m-d', strtotime($input['filter_to']))."'";
		}

		if( isset( $input['filter_group'] ) && (int)$input['filter_group'] > 0 )
		{
			$this->query .= " and u.group_id = ". (int)$input['filter_group'];
		}

		

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