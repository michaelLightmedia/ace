<?php 


class TableHelper
{
	public $_column_headers = array();
	public $items 			= array();
	public $total_items 	= 0;
	public $per_page 		= 0;
	public $cur_page 		= 0;
	public $total_page 		= 0;
	public $orderby 		= null;
	public $order 			= null;
	public $search 			= null;

	public function _header_footer()
	{
		$headers = $this->_column_headers; 
		?>

    	<tr>
    		 
      	<?php foreach( $headers[0]  as $key => $val ):

			$order = ( $this->order == 'asc' ) ? 'desc' : 'asc' ;
			
			$pageURL = $this->getUrl($this->per_page, $this->search, $key, $order, $this->cur_page);
		
		
			$class = ($this->orderby == $key) ?  'sorting_'.$this->order : null;

			$class .= ' '.is_array( $val ) ? isset( $val['class'] ) ? $val['class'] : null  : null;
			$label = is_array( $val ) ? isset( $val['label'] ) ? $val['label'] : null  : $val;

			?>
            <th data-groupby="<?php echo $key ?>" data-order="<?php echo $order; ?>" class="data-<?php echo $key ?>" 
            	class="column_header <?php echo (isset($headers[2][$key])) ? 'sorting ' : null;  echo $class;?>">
            	<a <?php echo (isset($headers[2][$key])) ? 'href="'.$pageURL.'"' : null ?> class="<?php echo (isset($headers[2][$key])) ? 'sorting' : null; ?>">

            		<?php echo $label; ?>
            	</a>
            </th>
  		<?php endforeach; ?>
  		</tr>
      
	<?php
	}

	
	public function _body()
	{
	?>
		
		<?php
		for($i = 0; $i < count($this->items); $i++):?>
			<tr>
			<?php foreach( $this->_column_headers[0]  as $key => $val  ):
				$rowSet = (array)$this->items[$i];

				$class = ' '.is_array( $val ) ? isset( $val['class'] ) ? $val['class'] : null  : null;
				?>
        	
	            <td class="<?php echo $class; ?>"><?php  
	            $method = "column_$key";
	            if(method_exists($this, $method))
	            {
	            	echo $this->$method( $rowSet );
	            }
	            else
	            {
	            	echo $this->column_default($rowSet, $key);
	        	}?></td>
      		
      		<?php 
      		endforeach;
      		?>
      		</tr>
      		<?php
  		endfor; ?>
    <?php
	}



	public  function display($hasfooter = true)
	{?>

		<table data-url="<?php echo $this->curPageURL(); ?>" cellpadding="0" cellspacing="0" border="0" class="table table-sm table-bordered table-hover table-default" id="table">
      		<thead class="table-pretty-head">
      			<?php $this->_header_footer(); ?>
      		</thead>
      		<tbody>
      			<?php $this->_body(); ?>
      		</tbody>
      		<?php if($hasfooter): ?>
	      		<tfoot>
	      			<?php $this->_header_footer(); ?> 
	      		</tfoot> 
      		<?php endif; ?>
      	</table>

	<?php
	
	}


	public function records_per_page()
	{
		$pages = array(5, 10, 25, 50, 100);
		$per_page = ($this->per_page) ? $this->per_page : 10;
	?>
		<div class="selectpicker-sm">
			<select class="selectpicker" id="per_page" name="per_page" onchange="this.form.submit()" >
				<?php foreach($pages as $p): ?>
					<option value="<?php echo $p; ?>" <?php echo ($p == $per_page)? 'selected="selected"' : null; ?> ><?php echo $p; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<?php
	}


	public function search_box()
	{
		$s = ($this->search)? $this->search : null;
	?>
		<div class="pull-right search">
			<form class="form-inline form-rounded" role="form">
				<div class="form-group">
					<i class="fa fa-search"></i>
					<input type="text" class="form-control" id="s" name="s" placeholder="Search..">
				</div>
			</form>
		</div>
	<?php
	}

	public function pagination_info()
	{
		?>
		<div class="table-resultspagination_info" id="pagination_info">
			Showing <?php echo $this->cur_page.' to '.$this->total_page.' of '.$this->total_items; ?> 
			entries</div>
		
	<?php 
	}

	

	public function pagination()
	{ 
		$pageURL 	= $this->curPageURL();
		$current 	= $this->cur_page;
		$total 		= $this->total_page;

		$prev 		= ( $current > 1) ? $current - 1 : 1;
		$next 		= ( $current < $total ) ? $current + 1 : $total;

		if($total)
		{
	?>
		
		<ul class="pagination <?php echo $current; ?>">
			
			<li data-page="1" class="prev <?php echo ( $current == 1 ) ? 'disabled' : null; ?>"><a href="<?php echo $prev ?>"><i class="fa fa-fast-backward"></i></a></li>
			<li data-page="<?php echo $prev; ?>" class="prev <?php echo ( $current == 1 ) ? 'disabled' : null; ?>"><a href="<?php echo $prev ?>"><i class="fa fa-backward"></i></a></li>
			<?php 
			$page = $current - 5;
			$page = ($page < 1) ? 1 : $page;

			for( $i = 1; $i <= 10; $i++ ):
				if($page > $total ) break;

				$pageURL = $this->getUrl($this->per_page, $this->search, $this->orderby, $this->order, $page);?>
			<li data-page="<?php echo $page; ?>" class="<?php echo ($current == $page) ? 'active' : null; ?>">
				<a href="<?php echo $pageURL; ?>"><?php echo $page; ?></a></li>
			<?php $page++; 
			endfor; ?>
			<li data-page="<?php echo $next; ?>" class="next <?php echo ( $current == $total ) ? 'disabled' : null; ?>"><a href="<?php echo $next ?>"><i class="fa fa-forward"></i></a></li>
			<li data-page="<?php echo $total; ?>" class="next <?php echo ( $current == $total ) ? 'disabled' : null; ?>"><a href="<?php echo $next ?>"><i class="fa fa-fast-forward"></i></a></li>
		</ul>
	
	
	
	<?php
		}
	}

	public function getUrl($per_page, $search, $orderby, $order, $page)
	{

		$url 		= '?per_page=%d&s=%s&orderby=%s&order=%s&page=%d';

		$url 		= sprintf($url, $per_page, $search, $orderby, $order, $page );

		return $this->curPageURL().$url;

	}

	public function curPageURL() {

		$current_url = 'http://';
		$current_url .= $_SERVER['HTTP_HOST']; // Get host
		$path = explode( '?', $_SERVER['REQUEST_URI'] ); // Blow up URI
		$current_url .= $path[0]; // Only use the rest of URL - before any parameters
		$current_url = $current_url; //urlencode( $current_url ); // Encode it for use

		return $current_url;
	}



	public function set_pagination_args( $args = array() )
	{

		$this->total_items 	= $args['total_items'];
		$this->per_page 	= $args['per_page'];
		$this->cur_page 	= $args['current_page'];
		$this->total_page   = $args['total_page'];
		$this->search 		= $args['search'];
		$this->orderby 		= $args['orderby'];
		$this->order 		= $args['order'];

	}	

	public function arrayCastRecursive($array)
	{
	    if (is_array($array)) {
	        foreach ($array as $key => $value) {
	            if (is_array($value)) {
	                $array[$key] = $this->arrayCastRecursive($value);
	            }
	            if ($value instanceof stdClass) {
	                $array[$key] = $this->arrayCastRecursive((array)$value);
	            }
	        }
	    }
	    if ($array instanceof stdClass) {
	        return (array)$array;
	    }
	    return $array;
	}


	public function ajaxTableHelper( $lists, $footer = TRUE )
	{
		$lists->prepare_items();
			
		ob_start();

		$lists->display( $footer );

		$table 	= ob_get_contents();
		if (ob_get_contents()) ob_end_clean();

		ob_start();
		$lists->pagination_info();

		$paging_info = ob_get_contents();
		if (ob_get_contents()) ob_end_clean();

		ob_start();
		$lists->pagination();

		$paging = ob_get_contents();
		if (ob_get_contents()) ob_end_clean();

		
		
		return array(
			'table' 		=> $table, 
			'paging' 		=> $paging,
			'paging_info' 	=> $paging_info
			);
	}

}