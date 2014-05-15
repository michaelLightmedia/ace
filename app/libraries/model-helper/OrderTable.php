<?php 


class OrderTable  extends TableHelper
{
	private $query;
	private $config = array();
	private $data 	= null;
	private $cust_id = 0;
	private $columns = null;
	private $urlDetails = null;

	public function __construct( $user_id = false, $args = array( 'columns' => null, 'urlDetails' => null ) )
	{
		$this->cust_id = $user_id;

		extract($args);
		$this->columns = $columns;
		$this->urlDetails = $urlDetails;
	}

	public function column_default($item, $column_name)
	{
		
	    return $item[ $column_name ];
	}

	public function get_columns()
	{
		$columns = array(
			'id' 			=> array( 'label' => '<input type="checkbox" name="cb" class="checkall" />', 'class' => ''),
			'order_no'		=> array( 'label' => 'Order no.', 'class' => ''),
			'name'			=> array( 'label' => 'Customer Name', 'class' => ''),
			'total_item'	=> array( 'label' => 'Total Quantity', 'class' => ''),
			'total_price' 	=> array( 'label' => 'Total Price', 'class' => ''),
			'total_points_to_earn' 	=> array( 'label' => 'Total points to earn', 'class' => 'hidden-sm hidden-xs'),
			'redeemable_points' 	=> array( 'label' => 'Maximum redeemable csk$', 'class' => 'hidden-sm hidden-xs'),
			'customer_redeemed_points' 	=> array( 'label' => 'Customer points used', 'class' => 'hidden-sm hidden-xs'),
			'date_order' 			=> array( 'label' => 'Date of order', 'class' => 'hidden-sm hidden-xs'),
			'payment_status' 		=> array( 'label' => 'Payment Status', 'class' => 'hidden-sm hidden-xs'),
			'order_status' 			=> array( 'label' => 'Order Status', 'class' => ''),
		);
		return $this->columns ? $this->columns : $columns;
	}

	public function column_id( $item ) 
	{

        return sprintf(
            '<input type="checkbox" name="cid[]" value="%s" />', $item['id']
        );    
    }

    public function column_order_no( $item ) 
    {
    	$url = $this->urlDetails ? $this->urlDetails : 'admin/order/%s/details';
    	return sprintf(
            '<a href="'.URL::to($url).'">%s</a>', $item['order_no'], $item['order_no']
        );
    }

    public function column_order_status( $item ) 
    {

    	if(strtolower($item['order_status']) == 'complete'){
    		$status = 'label-success';
    		$text = 'Completed';
    	}
    	elseif(strtolower($item['order_status']) == 'in progress'){
    		$status = 'label-elite-gold';
    		$text = 'In Progress';
    	}
    	else{
    		$status = 'label-danger';
    		$text = 'Cancel';
    	}

    	return sprintf('<span class="label %s">%s</span>', $status, $text);
    }

    public function column_payment_status( $item )
    {
    	if(strtolower($item['payment_status']) == 'completed'){
    		$status = 'label-success';
    		$text = 'Completed';
    	}
    	elseif(strtolower($item['payment_status']) == 'pending' || $item['payment_status'] == ''){
    		$status = 'label-elite-gold';
    		$text = 'Pending';
    	}
    	else{
    		$status = 'label-danger';
    		$text = $item['payment_status'];
    	}

    	return sprintf('<span class="label %s">%s</span>', $status, $text);
    }


    public function get_searchable_columns()
    {
    	$searchable_columns = array(
    		'concat(u.firstname," ",u.lastname)',
    		'o.id',
    	);

    	return $searchable_columns;
    }

	public function get_sortable_columns()
	{
		$sortable_columns = array(
			'order_no' 			=> array('order_no', true),
			'name' 				=> array('name', true),
			'total_item'		=> array('total_item', true),
			'total_price'		=> array('total_price', true),
			'total_points_to_earn'=> array('total_points_to_earn',true),
			'redeemable_points'	=> array('redeemable_points', true),
			'customer_redeemed_points' 	=> array('customer_redeemed_points', true),
			'date_order' 		=> array('date_order', true), 
			'payment_status' 	=> array('payment_status', true), 
			'order_status' 		=> array('order_status', true), 
		);
		return $sortable_columns;
	}

	public function usort_reorder($a, $b)
	{

		$orderby 	= (isset($_REQUEST['orderby']) && !empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'date_order';

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
		$input = Input::all();

		$sortable 	= $this->get_sortable_columns();
		$hidden 	= array();
		$columns 	= $this->get_columns();
		$tblPrefix 	= DB::getTablePrefix();
		$this->_column_headers = array( $columns, $hidden, $sortable );


		$this->query = "SELECT o.*, o.id as order_no, p.payment_status,
			concat(u.firstname,' ', u.lastname) as name
			FROM ".$tblPrefix."orders as o
			LEFT JOIN ".$tblPrefix."users as u ON u.id = o.user_id 
			LEFT JOIN ".$tblPrefix."payments as p ON o.id = p.order_number 
			WHERE 1 = 1 ";


		if($this->cust_id !== FALSE)
		{
			$this->query .= " and o.user_id = ".$this->cust_id;
		}

		if( isset($input['filter_order_status']) && $input['filter_order_status'] != -1)
		{
			$this->query .= " and o.order_status = '".$input['filter_order_status']."'";
		}

		if( isset($input['filter_from']) && isset($input['filter_to']) && trim( $input['filter_from'] ) != '' && trim($input['filter_to']) != '' )
		{
			$this->query .= " and DATE_FORMAT(o.date_order, '%Y-%m-%d') >= '".date('Y-m-d', strtotime($input['filter_from']))."'";
			$this->query .= " and DATE_FORMAT(o.date_order, '%Y-%m-%d') <= '".date('Y-m-d', strtotime($input['filter_to']))."'";
		}

		if( isset( $input['filter_user_id'] ) && (int)$input['filter_user_id'] > 0 )
		{
			$this->query .= " and user_id = ". (int)$input['filter_user_id'];
		}


		

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
			'orderby'  		=> isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : 'date_order',
			'order' 		=> isset($_REQUEST['order']) ? $_REQUEST['order'] : 'desc',

		) );
			
	}


	



}