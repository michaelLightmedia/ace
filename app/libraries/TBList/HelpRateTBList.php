<?php

class HelpRateTBList extends BaseTBList{

	var $table = "help_rates";
	var $table_id = "id";


    // For table display: we need to specify the column name for the result query as key and its parameter.

	var $columns = array(
		'taxable_income_from'     => array('label' => 'Taxable Income From','sortable' => false),
		'taxable_income_to'  => array('label' => 'Taxable Income to','sortable' => false,),
		'repayment_rate'        => array('label' => 'Repayment Rate','sortable' => true,),
        'id'     => array( 'label'=>'ID', 'sortable' => false )
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
        $this->query = DB::table('help_rates');
    }

    protected function hooks() {

        $this->whereBlocks();

        $this->whereInBlocks();

    }

    protected function selectColumns() {
        $this->query->select(
          'help_rates.id',
          'help_rates.taxable_income_from',
          'help_rates.taxable_income_to',
          'help_rates.repayment_rate',
          'help_rates.updated_at'
        );
    }

    protected function whereBlocks() {

    }


    function colSetTaxableIncomeFrom($row_data){
        if ( is_null(trim($row_data->taxable_income_from)) || $row_data->taxable_income_from == 0 ){
            echo "below";
        } else {
            echo format_currency($row_data->taxable_income_from,0);
        }
        ?>
        <div class="row-actions">
            <span class="edit">
                <a href="<?php echo URL::to("/admin/tax-form/settings/help-rates/{$row_data->id}/edit") ?>" title="Edit this item">Edit</a> |
            </span>
            <span class="delete">
                <a href="<?php echo URL::to("/admin/tax-form/settings/help-rates/{$row_data->id}/delete") ?>" class="confirm-delete" title="Delete <?php e($row_data->id) ?>" rel="permalink">Delete</a>
            </span>
        </div>
    <?php
    }

    function colSetID($row_data) {
		echo $row_data->id;
	}

    function colSetUpdatedAt($row_data){
        echo dbdt2c($row_data->updated_at);
    }
    function colSetTaxableIncomeTo($row_data){

        if ( is_null(trim($row_data->taxable_income_to)) || $row_data->taxable_income_to == 0 ){
            echo "above";
        } else {
            echo format_currency($row_data->taxable_income_to,0);
        }
    }





}
