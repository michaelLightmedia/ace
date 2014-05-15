<?php

class TaxFormTBList extends BaseTBList{

	var $table = "user_tax_years";
	var $table_id = "id";


    // For table display: we need to specify the column name for the result query as key and its parameter.

	var $columns = array(
		'client_name'     => array( 'label'=>'Name', 'sortable' => true),
        'tax_address.home_address_1'     => array('label' => 'Address','sortable' => false),
        'user_tax_details.tax_file_number'  => array('label' => 'TFN','sortable' => true,),
        'user_tax_years.tax_year'  => array('label' => 'Tax Year','sortable' => true,),
        'user_tax_years.status'        => array('label' => 'Status','sortable' => true,),
		'user_tax_years.updated_at'  => array('label' => 'Updated At','sortable' => false,),
        'user_tax_years.id'     => array( 'label'=>'ID', 'sortable' => false ),
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
        $this->query = DB::table('user_tax_years')
            ->leftJoin('user_tax_details','user_tax_years.id','=','user_tax_years.id')
            ->leftJoin('tax_address','user_tax_years.id','=','user_tax_years.id');

    }

    protected function hooks() {

        $this->whereBlocks();

        $this->whereInBlocks();

    }

    protected function selectColumns() {
        $this->query->select(array(
            'user_tax_years.id',
            'user_tax_years.updated_at',
            'user_tax_years.tax_year',
            'user_tax_years.status',
            'user_tax_years.status',
            DB::raw('concat('.DB::getTablePrefix().'user_tax_details.firstname," ", '.DB::getTablePrefix().'user_tax_details.lastname) AS client_name'),
            'user_tax_details.tax_file_number',
            'tax_address.home_address_1'
        ));
    }

    protected function whereBlocks() {
        if (Input::has('client_name')) {
            $this->query->where('client_name','LIKE','%'.Input::get('client_name'));
        }

        if (Input::has('address')) {
            $this->query->where('tax_address.home_address_1','LIKE','%'.Input::get('address'));
        }

        if (Input::has('address')) {
            $this->query->where('user_tax_details.tax_file_number','LIKE','%'.Input::get('tax_file_number'));
        }
    }


    function colSetClientName($row_data){
        echo $row_data->client_name;

        ?>

        <div class="row-actions">
            <span class="edit">
                <a href="<?php echo URL::to("/admin/tax-form/settings/offset-rates/{$row_data->id}/edit") ?>" title="Edit this item">Edit</a> |
            </span>
            <span class="delete">
                <a href="<?php echo URL::to("/admin/tax-form/settings/offset-rates/{$row_data->id}/delete") ?>"  class="confirm-delete"  title="Delete <?php e($row_data->tax_year) ?>" rel="permalink">Delete</a>
            </span>
        </div>
    <?php
    }


    function colSetTaxYear($row_data){
        echo $row_data->tax_year;
    }

    function colSetID($row_data) {
		echo $row_data->id;
	}

    function colSetUpdatedAt($row_data){
        echo dbdt2c($row_data->updated_at);
    }

    function colSetStatus($row_data){
        echo Gy::getUserTaxYearStatus($row_data->status);
    }



}
