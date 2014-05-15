<?php
namespace App\Modules\Tax;

class OffsetRateController extends \BaseController
{
    function getIndex() {

        $list = new \OffsetRateTBList();

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

        return \View::make('tax::tax-settings/offset-rates.index')->with('list', $list);
    }

    /**
     * @param OffsetRate $offset_rate
     *
     * @return mixed
     */
    function getCreate() {
        return \View::make('tax::tax-settings/offset-rates.create_edit');
    }

    /**
     * @param OffsetRate $offset_rate
     *
     * @return mixed
     */
    function postCreate() {
        $offset_rate = new \OffsetRate;
        if ($has_error = $offset_rate->validateData()){
            return $has_error;
        }

        $offset_rate->saveData();

        return \Redirect::to('/admin/tax-form/settings/offset-rates')
            ->with('success_msg',"Successfully added help rates.");
    }

    /**
     * @param OffsetRate $offset_rate
     * @return mixed
     */
    function getEdit(\OffsetRate $offset_rate) {
        return \View::make('tax::tax-settings/offset-rates.create_edit')->with('offset_rate',$offset_rate);
    }

    function postEdit(\OffsetRate $offset_rate) {
        if ($has_error = $offset_rate->validateData()){
            return $has_error;
        }


        $offset_rate->saveData();

        return \Redirect::to("/admin/tax-form/settings/offset-rates/{$offset_rate->id}/edit")
            ->with('success_msg',"Successfully updated help rates.");

    }

    function getDelete(\OffsetRate $offset_rate) {
        $offset_rate->delete();

        return \Redirect::to("/admin/tax-form/settings/offset-rates")
            ->with('success_msg',"Successfully deleted help rates.");
    }

}