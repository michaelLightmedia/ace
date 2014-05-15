<?php
namespace App\Modules\Tax;

class HelpRateController extends \BaseController
{
    function getIndex() {

        $list = new \HelpRateTBList();

        if ( \Request::ajax() )
        {

            $data = array(
                'status' => 'success',
                'pagination'=>$list->getPagination(),
                'tableData'=>$list->getTableData(),
                'paginationInfo'=>$list->getPaginationInfo(),
            );

            $response = \Response::json( $data );
            return $response;
        }

        return \View::make('tax::tax-settings/help-rates.index')->with('list', $list);
    }

    /**
     * @param HelpRate $help_rate
     *
     * @return mixed
     */
    function getCreate() {
        return \View::make('tax::tax-settings/help-rates.create_edit');
    }

    /**
     * @param HelpRate $help_rate
     *
     * @return mixed
     */
    function postCreate() {
        $help_rate = new \HelpRate;
        if ($has_error = $help_rate->validateData()){
            return $has_error;
        }
        $help_rate->saveData();

        return \Redirect::to('/admin/tax-form/settings/help-rates')
            ->with('success_msg',"Successfully added help rates.");
    }

    /**
     * @param HelpRate $help_rate
     * @return mixed
     */
    function getEdit(\HelpRate $help_rate) {
        return \View::make('tax::tax-settings/help-rates.create_edit')->with('help_rate',$help_rate);
    }

    function postEdit(\HelpRate $help_rate) {
        if ($has_error = $help_rate->validateData()){
            return $has_error;
        }

        $help_rate->saveData();

        return \Redirect::to("/admin/tax-form/settings/help-rates/{$help_rate->id}/edit")
            ->with('success_msg',"Successfully updated help rates.");

    }

    function getDelete(\HelpRate $help_rate) {
        $help_rate->delete();

        return \Redirect::to("/admin/tax-form/settings/help-rates")
            ->with('success_msg',"Successfully deleted help rates.");
    }


}