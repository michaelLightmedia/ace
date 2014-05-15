<?php

class CentsPerKilometreTBList extends BaseTBList{

	var $table = "help_rates";
	var $table_id = "id";


    // For table display: we need to specify the column name for the result query as key and its parameter.

	var $columns = array(
		'engine_capacity'     => array('label' => 'Engine Capacity','sortable' => false),
		'cents_per_kilometre'  => array('label' => 'Cents Per Kilometre','sortable' => false,),
		'updated_at'  => array('label' => 'Updated At','sortable' => false,),
        'id'     => array('label'=>'ID', 'sortable' => false)
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
        $this->query = DB::table('cents_per_kilometre');
    }

    protected function hooks() {

        $this->whereBlocks();

        $this->whereInBlocks();

    }

    protected function selectColumns() {
        $this->query->select(
          'cents_per_kilometre.id',
          'cents_per_kilometre.engine_capacity',
          'cents_per_kilometre.cents_per_kilometre',
          'cents_per_kilometre.updated_at'
        );
    }

    protected function whereBlocks() {

    }


    function colSetEngineCapacity($row_data){
        echo $row_data->engine_capacity;

        ?>
        <div class="row-actions">
            <span class="edit">
                <a href="<?php echo URL::to("/admin/tax-form/settings/cents-per-kilometre/{$row_data->id}/edit") ?>" title="Edit this item">Edit</a> |
            </span>
            <span class="delete">
                <a href="<?php echo URL::to("/admin/tax-form/settings/cents-per-kilometre/{$row_data->id}/delete") ?>" class="confirm-delete" title="Delete <?php e($row_data->id) ?>" rel="permalink">Delete</a>
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


}
