<?php

class OffsetRateTBList extends BaseTBList{

	var $table = "offset_rates";
	var $table_id = "id";


    // For table display: we need to specify the column name for the result query as key and its parameter.

	var $columns = array(
		'status'        => array('label' => 'Status','sortable' => true,),
		'taxable_income_from'     => array('label' => 'Taxable Income From','sortable' => false),
		'taxable_income_to'  => array('label' => 'Taxable Income to','sortable' => false,),
		'base_level_eligibility'  => array('label' => 'Rebate Elibility','sortable' => false,),
		'updated_at'  => array('label' => 'Updated At','sortable' => true,),
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
            'action'            => true,
            'advance_shortcut'  => false,
        );
        parent::__construct($options);
    }

    public function setQuery() {
        $this->query = DB::table('offset_rates');
    }

    protected function hooks() {

        $this->whereBlocks();

        $this->whereInBlocks();

    }

    protected function selectColumns() {
        $this->query->select(
          'offset_rates.id',
          'offset_rates.status',
          'offset_rates.taxable_income_from',
          'offset_rates.taxable_income_to',
          'offset_rates.updated_at'
        );
    }

    protected function whereBlocks() {

    }


    function colSetStatus($row_data){
        echo $row_data->status;

        ?>

        <div class="row-actions">
            <span class="edit">
                <a href="<?php echo URL::to("/admin/tax-form/settings/offset-rates/{$row_data->id}/edit") ?>" title="Edit this item">Edit</a> |
            </span>
            <span class="delete">
                <a href="<?php echo URL::to("/admin/tax-form/settings/offset-rates/{$row_data->id}/delete") ?>"  class="confirm-delete"  title="Delete <?php e($row_data->id) ?>" rel="permalink">Delete</a>
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

    function colSetTaxableIncomeFrom($row_data){
        if ( is_null(trim($row_data->taxable_income_from)) || $row_data->taxable_income_from == 0 ){
            echo "below";
        } else {
            echo format_currency($row_data->taxable_income_from,0);
        }
    }

    function colSetTaxableIncomeTo($row_data){
        if ( is_null(trim($row_data->taxable_income_to)) || $row_data->taxable_income_to == 0 ){
            echo "above";
        } else {
            echo format_currency($row_data->taxable_income_to,0);
        }
    }


    function colSetBaseLevelEligibility($row_data){
        $base_levels = DB::table('offset_rate_base_levels')->where('offset_rate_id','=',$row_data->id)->get();

        if ($base_levels) {
            foreach($base_levels as $age) {
                echo "<p>";
                if ($age->level_from == 0 || is_null($age->level_from)) {
                    echo "less";
                } else {
                    echo $age->level_from;
                }

                echo " - ";

                if ($age->level_to == 0 || is_null($age->level_to)) {
                    echo "above";
                } else {
                    echo $age->level_to;
                }

                echo " = " . $age->offset_rate . ' %';
                echo "</p>";
            }
        } else {
            echo "no base levels found.";
        }
    }



}
