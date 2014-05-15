<?php

class BaseTBList extends TBList {

    protected $filter_by;


    /**
     * Filter that would display to the front end when changed TBList plugin would
     * detect and retrieve new queries
     *
     * @var: Array/Multi Array $filter
     */
    protected $filters = array();

    /**
     * @param $key
     * @return bool|string
     * @custom
     */
    public function getFilterBy($key){

        if( !array_key_exists($key, $this->filter_by) ) return false;

        $filter_data = $this->filter_by[$key];

        ob_start();
        ?>

        <div class="tags pull-left">
            <ul class="list-inline list--filter-result" id=" filter-con-result-tasks_">
            </ul>
        </div>
        <div class="pull-right ">
            <div class="filter-option-lg">
                <label class="field-label" for="#attention-of-search">Filters</label>
                <select id="input-<?php echo $key; ?>" style="width:100px;" class="selectpicker list--filter" target-container="#filter-con-result-<?php echo $key; ?>" name="<?php echo $key; ?>">
                    <?php foreach($filter_data as $group_key => $group_value) : ?>
                        <?php if( !is_array( $group_value )) : ?>
                            <option value="<?php echo  $group_key; ?>"><?php echo $group_value; ?></option>
                        <?php else : ?>
                            <optgroup label="<?php echo $group_value['label']; ?>">
                                <?php foreach($group_value['item'] as $option_key => $option_value) : ?>
                                    <option  value="<?php echo $group_key; ?>:<?php echo $option_key; ?>"><?php echo $option_value; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    protected function whereInBlocks() {
        foreach($this->filters as $filter_key ){

            list($table,$table_col) = $this->extractAliases($filter_key);
            if( $this->hasInput($table_col)){
                $value = $this->getInput($table_col);
                if (is_array($value)){
                    $this->query->whereIn($filter_key,$value);
                }
            }
        }
    }

}