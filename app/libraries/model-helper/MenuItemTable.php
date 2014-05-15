<?php 


class MenuItemTable  extends TableHelper
{
	private $query;
	private $config 	= array();
	private $data 		= null;

	public function column_default($item, $column_name)
	{

	    return $item[ $column_name ];
	}

	public function get_columns()
	{
		$columns = array(
			'id' 		=> '<input type="checkbox" name="cb" class="checkall" />',
			'post_title'	=> 'Title',
			'menu_order'	=> 'Order',
			'access' 		=> 'Access',
			'post_status' 	=> 'Status',
		);
		return $columns;
	}

	public function column_id( $item ) 
	{

        return sprintf(
            '<input type="checkbox" name="cid[]" value="%d" />', $item['id']
        );    
    }

    public function column_post_title( $item ) 
    {	$level = $item['menu_level'] - 1;

    	$levelIndicator = $level ? '|'.str_repeat('- ', $item['menu_level']) : null;

    	return sprintf(
            '<a href="'. URL::to('admin/menu-item/%d/edit').'">%s %s</a>', $item['id'], $levelIndicator , $item['post_title']
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
    		'post_status',
    	);

    	return $searchable_columns;
    }

	public function get_sortable_columns()
	{
		$sortable_columns = array(
			'post_title' 	=> array('post_title', true),
			'menu_order' 	=> array('menu_order', true),
			'access' 		=> array('access', true),
			'post_status' 	=> array('post_status', true)
		);
		return $sortable_columns;
	}

	public function usort_reorder($a, $b)
	{

		$orderby 	= (isset($_REQUEST['orderby']) && !empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'post_parent';

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

	

	public function build_multi_level_query($level = 0)
	{	
		$tablePrefix = DB::getTablePrefix();

		$this->query = "SELECT a.post_parent, a.id, a.post_title, a.menu_level,a.menu_order, 'public' as access, a.post_status 
		FROM  ".$tablePrefix."posts as a WHERE a.post_type = ? and post_parent = ?";

		$this->query .= $this->_search();

		$sql = $this->query." order by a.id desc";
		$resultSet = DB::select($sql, ['nav_menu_item', $level]);
		if($resultSet)	
		{
			foreach($resultSet as $item)
			{
				$this->data[] = $item;
				$sql = $this->query." order by a.id asc";
				$hasChild = DB::select($this->query, ['nav_menu_item', $item->id]);
				if($hasChild)
				{
					$this->build_multi_level_query($item->id);
				}
			}
		}

		
	}


	public function prepare_items()
	{	
		

		$sortable 	= $this->get_sortable_columns();
		$hidden 	= array();
		$columns 	= $this->get_columns();

		$this->_column_headers = array( $columns, $hidden, $sortable );

		$this->build_multi_level_query(0);
		



		

		$data = $this->data;
		$data = $this->arrayCastRecursive($data);


		$total_items = count($data);

		$per_page = ( isset($_REQUEST['per_page']) ) ? (int)$_REQUEST['per_page'] : 10;

		$page = ( isset($_REQUEST['page']) && $_REQUEST['page'] > 0  ) ? $_REQUEST['page'] - 1 : 0;

		$offset = $page * $per_page;
		

		//usort($data, array(&$this, 'usort_reorder'));

		
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