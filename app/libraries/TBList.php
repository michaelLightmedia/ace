<?php
/**
 * This class would take all the hassle in table list and retreive.
 * It has a bundle for both JS and PHP class to handle all for you.
 *
 * This class is intended only for the development of EDITchimp.com
 * and must not used or replicate without any permissions from the author
 *
 * @author: Stephen Cantila
 * @email: philwebservices.programmer25@gmail.com
 * @version: 2.1.3
 */

class TBList{

    /**
     * The table name
     *
     * @var string $table (required)
     */
    protected $table;

    /**
     * The target table id.
     * (e.g users.id, jobs.id, or just id)
     *
     * @var string $table_id (required)
     */
    protected $table_id = "id";

    /**
     * A helper for columns when for there specific tasks.
     *
     * @var array $devices_column
     */
    var $devices_column = array();

    /**
     * The default supported options.
     * It will be overridden when passing the new array support
     * when initializing the child class.
     *
     * @var: Array $support
     */
    protected $support = array(
        'column_checkable'  => false,
        'action'            => false,
        'advance_shortcut'  => false,
    );

    /**
     * Intended for caching the calculation of head
     *
     * @var bool hf = head and footer content
     */
    private $hf_content = false;

    /**
     * The target url that the list will request or submitted to
     * if false, then return current url.
     * This is important, if we have many table in the same page.
     * one may submit to different url.
     *
     * @added V.2
     * @var bool
     */
    public $url = false;

    /**
     * This is the main query that is specified by users
     * Note: you must only have one word " from "(all small letter,
     *       all other " from " word (big letter) will be ignored)
     *       on this query or else it will break the app.
     *
     * @var: DB String $query
     * @changed: This must be an object from laravel, static $query is deprecated.
     */
    protected $query;

    /**
     * The assoc array with the key of returned column of the specified query
     *
     * @var array
     */
    var $columns = array();

    /**
     * The display message when there is no results
     *
     * @var string $no_results (optional)
     */
    var $no_results = 'No results found.';

    /**
     * the column name that will be ordered by default.
     * default will be overridden when order_by and order_method is
     * found in the request parameter
     * (e.g users.email, users.first_name or just email)
     *
     * @var string $order_by (optional)
     */
    protected $order_by = "";

    /**
     * the column order method. Will be overridden if order_by and order_method
     * is found in the request parameter
     * must just be (asc | desc)
     *
     * @var string $order_method (optional)
     */
    protected $order_method ="asc";

    /**
     * @var int $goto_shortcut_page
     */
    var $goto_shortcut_page = 10;

    /**
     * Default per page, will be overridden from child class
     * or request parameter
     *
     * @var int
     */
    var $per_page = 25;

    /**
     * The default page, on what lists should be display
     * will be overridden via child class and request parameter
     *
     * @var int
     */
    var $page = 1;

    // Protected properties
    protected $total_count;
    protected $next_page;
    protected $previous_page;
    protected $last;
    protected $first;
    protected $goto_next;
    protected $goto_previous;
    protected $total_pages;
    protected $offset;

    // This is the binding of the data, and it is intended only for database
    // query for better security
    private $result_rows;
    protected $_bindings = array();

    /**
     * Run on initiation, will merge the supported options with
     * the new option
     * @param array $options
     */
    public function __construct($options = array()){
        $this->support = array_merge($this->support, $options);
    }

    /**
     * This will call all the method by sequence depends on the requirements
     *
     * of each other
     * @return void
     */
    public function prepareList(){

        $this->doRunHooks();

        $this->setPerPage();

        $this->setCurrentPage();

        $this->setTotalCount();

        $this->setPagination();

        $this->setQueryOrderBy();

        $this->setQueryOffset();

        $this->setResultRows();
    }

    /**
     * This will just set the per_page property
     * override default per page when there are per_page
     * in the request parameter
     * @return void
     */
    protected function setPerPage(){

        // if per_page is set to -1 then results will be unlimited
        if ($this->per_page == -1) return ;

        if( $this->hasInput('per_page') ){
            $this->per_page = $this->getInput('per_page') > 0? $this->getInput('per_page'):1;
        } else if (Session::has('per_page')) {
            $this->per_page = Session::get('per_page');
        }
    }

    /**
     * This will just set the page property
     *
     * @return void
     */
    protected function setCurrentPage(){

        if ($this->per_page == -1) return ;
        if( $this->hasInput('page') ){
            $this->page = $this->getInput('page');
        }
    }

    /**
     * This will just set the offset and limit of the query
     *
     * @return void
     */
    protected function setQueryOffset(){
        if ($this->per_page == -1) return ;

        $this->query->skip($this->offset)->take($this->per_page);
    }

    /**
     * This will set the order by string and add to query property
     *
     * @return void
     * @todo multiple order method
     */
    protected function setQueryOrderBy(){

        // if search order_by is set then set as new value
        if ( $this->hasInput('order_by') && $this->getInput('order_by') != "" ){

            // overide default order_method
            if ( $this->getInput('order_method') == "desc" ){
                $this->order_method = "desc";
            } else if($this->getInput('order_method') == "asc"){
                $this->order_method = "asc";
            }

            // check if chosen order_by is exists in the columns properties
            if ( array_key_exists( $this->getInput('order_by'),$this->columns ) ){
                $this->order_by = $this->getInput('order_by');
            }
        }

        if (!empty($this->order_by) && !empty($this->order_method)){
            // just set the default order query string
            // just like: order by column_name desc
            $this->query->orderBy($this->order_by,$this->order_method);
        }

    }

    /**
     * Will just calculate all the calculation needed to generate a pagination page
     *
     * @return void
     */
    protected function setPagination(){

        if ($this->per_page == -1) return ;

        $this->total_pages = ceil($this->total_count/$this->per_page);

        // if current page is greater than the total page
        // then set the current page equal to total page
        if( $this->page > $this->total_pages){
            $this->page = $this->total_pages;
        }

        // Calculate the offset of where
        // the retrieval index start at
        if( $this->page != 0 )
            $this->offset = (($this->page - 1)  * $this->per_page);
        else{
            $this->page = 1;
            $this->offset = 0;
        }

        // set page goto to first
        $this->first       = 1;
        $this->last        = ($this->total_pages == $this->page)? false: $this->total_pages;
        $this->next_page   = ($this->page >= $this->total_pages) ? false : $this->page + 1;
        $this->previous_page = ($this->page < 1 ) ? false : $this->page - 1;

        // calculate advance shortcut
        if ($this->support['advance_shortcut']){
            $goto_result_next     = $this->page  + $this->goto_shortcut_page;
            $goto_result_previous = $this->page  - $this->goto_shortcut_page;
            $this->goto_next     = $goto_result_next > $this->total_pages ? false: $goto_result_next;
            $this->goto_previous = $goto_result_previous < 1 ? false: $goto_result_previous;
        }
    }

    /**
     * Count the result
     *
     * @return Void
     */
    protected function setTotalCount(){
        $this->total_count  = $this->query->count();
    }

    /**
     * This will just get all the total count
     *
     * @return int the total number of row result
     */
    public function getTotalCount() {
        return $this->total_count;
    }

    /**
     * This will get the data rows from the database
     * with the all where queries
     */
    function setResultRows() {
        $this->selectColumns();

        $results = $this->query->get();
        if ($results){
            $this->result_rows = $results;
        }else{
            $this->result_rows = array();
        }
    }

    /**
     * Use this to select specific columns of the query
     *
     */
    protected function selectColumns() {}


    // Construct*where*query*blocks

    /**
     * Use this to run where or any condition query
     *
     */
    protected function hooks(){}

    /**
     * Run Hooks
     *
     * @author: Stephen Cantila
     */
    protected function doRunHooks(){
        $this->hooks();
    }

    protected function getColumnsClasses($column_key) {
        if (isset($this->columns[$column_key])
            && isset($this->columns[$column_key]['classes'])){

            return $this->columns[$column_key]['classes'];
        }
    }

    // TABLE HEADER STRUCTURE

    /**
     * This will just return the header of the table list
     *
     * @return string
     */
    public function getTableHeader(){

        ob_start(); // intended only to capture echoed string

        ?>
        <?php // Start constructing the column header ?>
        <thead class="table-pretty-head">
        <?php echo $this->getTableHeadFooter(); ?>
        </thead>
        <?php

        return ob_get_clean();
    }

    /**
     * This will just return the header of the table list
     *
     * @return string
     */
    public function getTableFooter(){
        ob_start(); // intended only to capture echoed string
        ?>
        <?php // Start constructing the column header ?>
        <tfoot>
        <?php echo $this->getTableHeadFooter(); ?>
        </tfoot>
        <?php

        return ob_get_clean();
    }

    /**
     * get the data for both header and footer.
     * @return string
     */
    public function getTableHeadFooter() {
        if ($this->hf_content) {
            return $this->hf_content;
        }

        ob_start(); // intended only to capture echoed string
        ?>
        <tr class="">
            <?php if($this->support['column_checkable']) : ?>
                <th  class="th-small check-column <?php echo $this->getColumnsClasses("column_checkable"); ?>">
                    <?php // Just call the default colSetHeaderCheckable ?>
                    <div>
                        <?php $this->colSetHeaderCheckable(); ?>
                    </div>
                </th>
            <?php endif; ?>

            <?php // Start constructing the table header columns ?>
            <?php foreach($this->columns as $column_key => $column_data) : ?>
                <?php $sortable_class = $this->getSortableClass($column_key,$column_data); ?>
                <th data-column-name="<?php echo $column_key; ?>" class="header <?php echo $sortable_class; ?> <?php echo $this->getColumnsClasses($column_key); ?>" >
                    <?php $this->getSortableLinkStart($column_key,$column_data);  ?>
                    <?php
                    // get content or display from the child column
                    // example: colSetHeaderColumnName
                    $key_col_method = $this->toCamel('col_set_header_' . $column_key);
                    // class if has a child method defined for the column header method
                    // else display the set label of this column
                    if (method_exists( $this,$key_col_method)){
                        $this->{$key_col_method}($column_key,$column_data);
                    } else {
                        echo $column_data['label'];
                    }
                    ?>
                    <?php $this->getSortableLinkEnd($column_key,$column_data); ?>
                </th>
            <?php endforeach; ?>

            <?php // Add action if the child is set to be having an action column ?>
            <?php if($this->support['action']) : ?>
                <th class="header <?php echo $this->getColumnsClasses("action"); ?>">
                    <?php // $this->colSetHeaderAction(); ?>
                </th>
            <?php endif; ?>
        </tr>

        <?php

        $markup = ob_get_clean();

        $this->hf_content = $markup;

        return $this->hf_content;
    }
    protected function getSortableLinkStart($column_key,$column_data) {
        if ($column_data['sortable']) {
            $param = $this->getParameters();
            $domain = $this->getURL();
            $param['order_by'] = $column_key;
            $param['order_method'] = $this->order_method;

            if ($this->hasInput("order_by")
                && $this->getInput("order_by") == $column_key ) {
                $param['order_by'] = $column_key;

                if ($this->hasInput("order_method")
                    && $this->getInput("order_method") == "desc"){
                    $param['order_method'] = "asc ";
                }else {
                    $param['order_method'] = "desc ";
                }
            }

            $link = $domain . "?" . http_build_query($param);
            echo "<a href=\"{$link}\">";
        }
    }

    protected function getSortableLinkEnd($column_key,$column_data) {
        if ($column_data['sortable']) {
            echo "</a>";
        }
    }

    protected function tableHeaderColGroup(){
        // This a col group that is returned
        if($this->support['column_checkable']) :
            echo '<colgroup class="' . $this->getColumnsClasses("column_checkable") . '"></colgroup>';
        endif;
        foreach($this->columns as $column_key => $column_data) :
            echo '<colgroup class="' . $this->getColumnsClasses($column_key) . '"></colgroup>';
        endforeach;
        if($this->support['action']) :
            echo '<colgroup class="'. $this->getColumnsClasses("action") . '"></colgroup>';
        endif;
    }

    protected function getSortableClass($column_key,$column_data){

        $classes = "";

        if( $column_data['sortable'] ){
            $classes .= "sorting ";

            if ($this->hasInput('order_by')
                && $this->getInput("order_by") == $column_key
                && $this->hasInput("order_method")) {

                if ($this->getInput("order_method") == "desc") {
                    $classes .= "sorting_asc ";
                } else if($this->getInput("order_method") == "asc") {
                    $classes .= "sorting_desc ";
                }
            }
        }

        return $classes;
    }

    protected function colSetHeaderCheckable() {
        ?>
        <label>
            <input autocomplete="off" type="checkbox" id="<?php echo $this->table; ?>-check-all" class="check-all" name="check" value="">
            <span class="lbl"></span>
        </label>
    <?php
    }

    protected function colSetHeaderAction() {
        echo "Actions";
    }

    // TABLE BODY STRUCTURE

    function getTableBody(){

        ob_start();
        $db_results = $this->result_rows;

        ?>
        <tbody class="list--rows">
        <?php if($this->total_count >= 1) : ?>
            <?php foreach($db_results as $db_row) : ?>
                <tr class="" data-id="<?php echo $db_row->{$this->table_id}; ?>">

                    <?php if($this->support['column_checkable']) : ?>
                        <td class="check-all-container check-column td-small <?php echo $this->getColumnsClasses("column_checkable"); ?>">
                            <?php $this->colSetCheckable($db_row); ?>
                        </td>
                    <?php endif; ?>

                    <?php foreach($this->columns as $column_key => $column_data) : ?>
                        <?php echo $this->getColumnStructure($db_row,$column_key,$column_data); ?>
                    <?php endforeach; ?>

                    <?php  if($this->support['action']) :  ?>
                        <td class="list--actions <?php echo $this->getColumnsClasses("action"); ?>">
                            <?php $this->colSetAction($db_row); ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr class="no-items">
                <td colspan="<?php echo $this->getTotalColumns(); ?>"><?php echo $this->no_results; ?></td>
            </tr>
        <?php endif; ?>
        </tbody>

        <?php
        return ob_get_clean();
    }

    private function getTotalColumns() {
        $column_count = count($this->columns);

        // On supports
        if($this->support['action']) {
            $column_count++;
        }

        if($this->support['column_checkable']) {
            $column_count++;
        }

        return $column_count;
    }

    protected function colSetCheckable($db_row) {
        $row_id = $db_row->{$this->table_id};
        ?>
        <label>
            <input  autocomplete="off" class="check-single" type="checkbox" name="check_item" id="checkbox-<?php echo $row_id; ?>" value="<?php echo $row_id; ?>">
            <span class="lbl"></span>
        </label>
    <?php
    }

    protected function colSetAction($db_row) {
        ?>
        <span>
                <a href="#" class="list--action-edit" trigger-this="a[href=#edit-user-modal]"><i class="icon-action icon-edit offset-right--2nd "></i></a>
                <a href="#" class="list--action-export" trigger-this="a[href=#export-user-modal"><i class="icon-action icon-share-alt offset-right--2nd "></i></a>
                <a href="#" class="list--action-archive" trigger-this="a[href=#archive-user-modal"><i class="icon-action icon-archive offset-right--2nd "></i></a>
            </span>
    <?php
    }

    protected function toCamel($value){
        $value = ucwords(str_replace(array('-','_'), ' ', $value));
        return lcfirst(str_replace(' ', '', $value));
    }

    protected function getColumnStructure($db_row,$column_key,$column_data){

        ob_start();

        list($table_name,$column_key) = $this->extractAliases($column_key);

        // Check if method exists i.e colSetID
        $key_col_method = $this->toCamel('col_set_' . $column_key);

        if (method_exists( $this,$key_col_method)){
            echo "<td class=\"". $this->getColumnsClasses($column_key). "\">";
            $this->$key_col_method($db_row);
            echo "</td>";
            return ob_get_clean();
        }
        ?>
        <td class="<?php echo $this->getColumnsClasses($column_key); ?>">
            <?php echo $db_row->$column_key; ?>
        </td>
        <?php return ob_get_clean();
    }


    // GET PAGINATION STRUCTURE

    public function getPagination(){

        ob_start();

        $pagi_perpage_offset = $this->page - ceil($this->goto_shortcut_page / 2);

        // Check if less than Zero
        if($pagi_perpage_offset < 1){
            $pagi_perpage_offset = 1;
        }

        $pagi_perpage_limit = $pagi_perpage_offset + $this->goto_shortcut_page;

        if($pagi_perpage_limit > $this->total_pages){
            $pagi_perpage_limit = $this->total_pages;
        }

        ?>
        <ul class="list--pagination pagination pagination--offset pull-right">

            <?php $this->getPagiFirst(); ?>

            <?php $this->getPagiGoToPrevious(); ?>

            <?php $this->getPagiPrevious(); ?>

            <?php for($i = $pagi_perpage_offset;$i <= $pagi_perpage_limit; $i++) :
                $active_class = $i == $this->page ? "active" : "";
                ?>
                <li class="<?php echo $active_class; ?>">
                    <a title="<?php echo $i; ?>" href="<?php echo $this->getPaginationURL($i) ?>" data-page="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php $this->getPagiNext(); ?>

            <?php $this->getPagiGoToNext(); ?>

            <?php $this->getPagiLast(); ?>

        </ul>

        <?php

        return ob_get_clean();
    }

    public function getPaginationInfo() {

        $markup  = "<div id=\"pagination_info\" class=\"list--pagination-info\">";
        $markup .= "Showing {$this->page} to {$this->total_pages} of {$this->total_count} entries";
        $markup .= "</div>";

        return $markup;
    }

    protected function getPagiFirst() {
        $class_disabled = $this->page == 1 ? "disabled" : "";
        ?>
        <li class="<?php echo $class_disabled; ?>">
            <a href="<?php echo $this->getPaginationURL(1) ?>" data-page="1"><i class="icon-double-angle-left <?php echo $class_disabled; ?>"></i> first</a>
        </li>
    <?php
    }

    protected function getPagiLast() {
        $class_disabled =  !$this->last ? "disabled" : "";
        ?>
        <li class="<?php echo $class_disabled; ?>">
            <a title="<?php echo  $this->last; ?>" href="<?php echo $this->getPaginationURL($this->last) ?>" data-page="<?php echo  $this->last; ?>">last <i class="icon-double-angle-right"></i>
            </a>
        </li>
    <?php
    }


    protected function getPagiPrevious() {

        $class_disabled = !$this->previous_page ? "disabled" : "";

        ?>
        <li class="<?php echo $class_disabled; ?>" >
            <a title="<?php echo $this->previous_page; ?>"
               href="<?php echo $this->getPaginationURL($this->previous_page) ?>"
               data-page="<?php echo $this->previous_page; ?>">
                <i class="icon-angle-left"></i> prev
            </a>
        </li>
    <?php
    }

    protected function getPagiNext() {
        $class_disabled = !$this->next_page ? "disabled" : "";
        ?>
        <li class="<?php echo $class_disabled; ?>" ><a title="<?php echo $this->next_page; ?>" href="<?php echo $this->getPaginationURL($this->next_page) ?>" data-page="<?php echo $this->next_page ; ?>">next <i class="icon-angle-right"></i></a></li>
    <?php
    }

    protected function getPagiGoToPrevious() {
        if (!$this->support['advance_shortcut']){
            return "";
        }

        $class_disabled = !$this->goto_previous ? "disabled" : "";

        ?>
        <li class="<?php echo $class_disabled; ?>">
            <a title="<?php echo $this->goto_previous; ?>" href="<?php echo $this->getPaginationURL($this->goto_previous) ?>" data-page="<?php echo $this->goto_previous; ?>">
                <i class="icon-angle-left"></i>
                - <?php echo $this->goto_shortcut_page; ?>
            </a>
        </li>
    <?php
    }

    protected function getPagiGoToNext() {
        if (!$this->support['advance_shortcut']){
            return "";
        }

        $class_disabled = !$this->goto_next ? "disabled" : "";
        ?>
        <li class="<?php echo $class_disabled; ?>">
            <a title="<?php echo $this->goto_next; ?>" href="<?php echo $this->getPaginationURL($this->goto_next) ?>" data-page="<?php echo $this->goto_next; ?>">

                <?php echo $this->goto_shortcut_page; ?> +
                <i class="icon-angle-right"></i>
            </a>
        </li>
    <?php
    }


    private function getPaginationURL($page) {
        $param = $this->getParameters();
        $domain = $this->getURL();

        // Return aesterisk if the current page is equal to
        // the page specified
        if ($this->page == $page) {
            return "#";
        }

        $param['page'] = $page;

        $link = $domain . "?" . http_build_query($param);
        return $link;
    }


    // Start*miscellaneous*helpers

    /**
     * generate a per page select block
     *
     * @param null $selection
     * @return string
     * @group miscellaneous
     */
    public function getPerPageLimit($selection = null) {
        ob_start();
        if ( is_null($selection)){
            $selection = array(
                1,5,10,25,50,100,250
            );
        }
        ?>
        <div class="field filter-option-lg">
            <label class="field-label" for="#attention-of-search">Per page</label>
            <select name="per_page" class=" list--per-page-limit selectpicker" data-width="80px">
                <?php foreach($selection as $val):
                    $selected_attr = $val == $this->per_page ? "selected=\"selected\"" : null; ?>
                    <option <?php echo $selected_attr; ?> class="<?php echo $val; ?>"><?php echo $val; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php
        return ob_get_clean();
    }


    // QUERY RETRIEVAL HELPER

    public function getURL() {
        if ($this->url) {
            return $this->url;
        } else {
            return Request::url();
        }
    }

    public function getParameters() {

        // Sometimes we may use tblist for the same page
        // for different url (i.e ajax)
        // so on initiation we need to check the url if set
        // manually. and URL must be the same with the actual url.
        if (!$this->url || Request::url() == $this->url) {
            return $_GET;
        } else {
            return array();
        }
    }

    public function setURL($url) {
        $this->url = $url;
    }

    /**
     * Accepts string of concatenated table aliases and its
     * column separated with dot.
     *
     * @param: string $string
     * @return array
     */
    protected function extractAliases($string) {
        if (!strpos($string,'.')) {
            return array(
                '',
                $string
            );
        }

        $exploded_key = explode('.',$string);
        return array(
            $exploded_key[0].".", // table alias
            $exploded_key[1], // column name
        );
    }

    /**
     * Will trim data recursively
     *
     * @param $val
     * @return array|string
     */
    protected function doTrim($val){
        if (is_array($val)){
            $ret = array();

            foreach ($val as $child_val){
                $ret[] = $this->doTrim($child_val);
            }
            return $ret;
        } else {
            return trim($val);
        }
    }

    /**
     * will just retrieve the input by field name
     *
     * @param $input_name
     * @return mixed
     */
    protected function getInput($input_name) {
        if ($this->hasInput($input_name)){

            $request_val = $this->doTrim($_REQUEST[$input_name]);

            // if a request value is not array then it is not a
            // filters input. so we need to check if a string value is empaty
            // and return ampty vaue
            // return empty if the input value has nothing on it
            // coz we don't want to call a method if a value is empty
            if (!is_array($request_val)){
                if (empty($request_val) || $request_val == "") return "";
            }

            return $request_val;
        } else {
            return "";
        }
    }

    /**
     * will just check the input by field name if exists
     *
     * @param $field_name
     * @return bool
     */
    protected function hasInput($field_name) {
        return isset($_REQUEST[$field_name]);
    }


    // DATA TABLE

    public function getTableData() {
        ob_start();

        ?>
        <table class="list--table table table-bordered table-hover table-default" border="0" cellspacing="0" cellpadding="0" >
            <?php echo $this->getTableHeader(); ?>
            <?php echo $this->getTableBody(); ?>
            <?php echo $this->getTableFooter(); ?>
        </table>
        <?php

        return ob_get_clean();
    }
}