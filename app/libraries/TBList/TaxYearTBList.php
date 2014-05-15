<?php

class TaxYearTBList extends BaseTBList{

	var $table = "tax_years";
	var $table_id = "year";

    // For table display: we need to specify the column name for the result query as key and its parameter.
	var $columns = array(
		'year'     => array( 'label'=>'Tax Year', 'sortable' => true),
        'is_active'  => array('label' => 'Active','sortable' => false,),
		'year_from'     => array('label' => 'Year From','sortable' => true),
		'year_to'  => array('label' => 'Year To','sortable' => false,),
	);

    var $devices_column = array();
	
	function __construct(){
        $this->supportedOptions();

        $this->setQuery();

		$this->prepareList();

	}

    private function supportedOptions() {
        $options = array(
            'column_checkable'  => false,
            'action'            => false,
            'advance_shortcut'  => false,
        );
        parent::__construct($options);
    }

    public function setQuery() {
        $this->query = DB::table('tax_years');
    }

    protected function hooks() {

        $this->whereBlocks();

        $this->whereInBlocks();

    }

    protected function selectColumns() {
        $this->query->select(
          'tax_years.year',
          'tax_years.is_active',
          'tax_years.year_from',
          'tax_years.year_to'
        );
    }

    protected function whereBlocks() {

    }


    function colSetYear($row_data) {
		echo $row_data->year;

        ?>
        <div class="row-actions">
            <span class="edit">
                <a href="<?php echo URL::to("/admin/tax-form/settings/tax-years/{$row_data->year}/edit") ?>" title="Edit this item">Edit</a> |
            </span>
            <span class="delete">
                <a href="<?php echo URL::to("/admin/tax-form/settings/tax-years/{$row_data->year}/delete") ?>"  class="confirm-delete"  title="Delete <?php e($row_data->year) ?>" rel="permalink">Delete</a>
            </span>
        </div>
    <?php
	}

    function colSetYearFrom($row_data){
        echo dbd2c($row_data->year_from);
    }
    function colSetYearTo($row_data){
        echo dbd2c($row_data->year_to);
    }
    function colSetUpdatedAt($row_data){
        echo dbdt2c($row_data->updated_at);
    }
    function colSetIsActive($row_data){
        echo $row_data->is_active == 1 ? 'Active' : 'Inactive';
    }


}
