<?php

class TaxMLSTBList extends BaseTBList{

	var $table = "tax_mls";
	var $table_id = "id";


    protected $order_by = "tax_mls.taxable_income_from";

    protected $order_method ="asc";

    // For table display: we need to specify the column name for the result query as key and its parameter.
	var $columns = array(
		'taxable_income_from'  => array('label' => 'Taxable income from','sortable' => true,),
		'taxable_income_to'    => array('label' => 'Taxable income to','sortable' => true,),
		'mls_rate'        => array('label' => 'Medicare Levy Surcharge(MLS)','sortable' => true,),
		'status'        => array('label' => 'Status','sortable' => true,),
		'updated_at'        => array('label' => 'Updated at','sortable' => true,),
		'id'     => array( 'label'=>'ID', 'sortable' => true),
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
        $this->query = DB::table('tax_mls');
    }

    protected function hooks() {

        $this->whereBlocks();

        $this->whereInBlocks();

    }

    protected function selectColumns() {
        $this->query->select(
          'tax_mls.id',
          'tax_mls.taxable_income_from',
          'tax_mls.taxable_income_to',
          'tax_mls.mls_rate',
          'tax_mls.status',
          'tax_mls.updated_at'
        );
    }

    protected function whereBlocks() {

    }

    public function colSetUpdatedAt($row_data) {
        echo dbdt2c($row_data->updated_at);
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
                <a href="<?php echo URL::to("/admin/tax-form/settings/tax-mls/{$row_data->id}/edit") ?>" title="Edit this item">Edit</a> |
            </span>
            <span class="delete">
                <a href="<?php echo URL::to("/admin/tax-form/settings/tax-mls/{$row_data->id}/delete") ?>"  class="confirm-delete"  title="Delete <?php e($row_data->id) ?>" rel="permalink">Delete</a>
            </span>
        </div>
    <?php
    }
    function colSetTaxableIncomeTo($row_data){
        if ( is_null(trim($row_data->taxable_income_to)) || $row_data->taxable_income_to == 0 ){
            echo "above";
        } else {
            echo format_currency($row_data->taxable_income_to,0);
        }
    }


}
