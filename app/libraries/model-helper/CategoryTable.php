<?php 


class CategoryTable  extends TableHelper
{
	private $query;
	private $config 	= array();
	private $data 		= null;
	private $taxonomy 	= '';

	public function __construct($taxonomy = 'category')
	{
		$this->taxonomy = $taxonomy;
	}

	public function column_default($item, $column_name)
	{

	    return $item[ $column_name ];
	}

	public function get_columns()
	{
		$columns = array(
			'term_id' 		=> '<input type="checkbox" name="cb" class="checkall" />',
			'name'			=> 'Name',
			'description'	=> 'Description',
			'slug' 			=> 'Slug',
			'count' 		=> 'Post',
		);
		return $columns;
	}

	public function column_term_id( $item ) 
	{

        return sprintf(
            '<input type="checkbox" name="cid[]" value="%s" />', $item['term_id']
        );    
    }

    public function column_name( $item ) 
    {
    	return sprintf(
            '<a href="'. URL::to('admin/taxonomy/'. $this->taxonomy .'/%s/edit').'">%s</a>', $item['term_id'], $item['name']
        );
    }

    public function column_description( $item ) 
    {
    	$description = $item['description'];
    	if(strlen($description) > 30)
    		return substr(strip_tags($description), 0, 27).'...';
    	else
    		return $description;
    }


 


    public function get_searchable_columns()
    {
    	$searchable_columns = array(
    		'name',
    	);

    	return $searchable_columns;
    }

	public function get_sortable_columns()
	{
		$sortable_columns = array(
			'name' 			=> array('name', true),
			'description' 	=> array('description', true),
			'slug' 			=> array('slug', true),
			'count' 			=> array('count', true)
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
	

		$sortable 	= $this->get_sortable_columns();
		$hidden 	= array();
		$columns 	= $this->get_columns();

		$this->_column_headers = array( $columns, $hidden, $sortable );


		$this->query = "SELECT 
			a.term_id, 
			a.name, 
			a.slug, 
			b.term_taxonomy_id, 
			b.description,
			b.parent, 
			b.count  
		FROM 
			".DB::getTablePrefix()."terms as a 
		left join 
			".DB::getTablePrefix()."term_taxonomy as b on a.term_id = b.term_id WHERE taxonomy='". $this->taxonomy ."' ";


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