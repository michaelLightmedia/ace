<?php
namespace App\Modules\Tax;

class TaxRateController extends \BaseController
{
    function getIndex() {

        $list = new \TaxRateTBList();

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

        return \View::make('tax::tax-settings/tax-rates.index')->with('list', $list);
    }

    /**
     * @param TaxRate $tax_rate
     *
     * @return mixed
     */
    function getCreate() {
        return \View::make('tax::tax-settings/tax-rates.create_edit');
    }

    /**
     * @param TaxRate $tax_rate
     *
     * @return mixed
     */
    function postCreate() {
        $tax_rate = new \TaxRate;
        if ($has_error = $tax_rate->validateData()){
            return $has_error;
        }
        $tax_rate->saveData();

        return \Redirect::to('/admin/tax-form/settings/tax-rates')
            ->with('success_msg',"Successfully added tax rates.");
    }

    /**
     * @param TaxRate $tax_rate
     * @return mixed
     */
    function getEdit(\TaxRate $tax_rate) {
        return \View::make('tax::tax-settings/tax-rates.create_edit')->with('tax_rate',$tax_rate);
    }

    function postEdit(\TaxRate $tax_rate) {
        if ($has_error = $tax_rate->validateData()){
            return $has_error;
        }

        $tax_rate->saveData();

        return \Redirect::to("/admin/tax-form/settings/tax-rates/{$tax_rate->id}/edit")
            ->with('success_msg',"Successfully updated tax rates.");

    }

    function getDelete(\TaxRate $tax_rate) {
        $tax_rate->delete();

        return \Redirect::to("/admin/tax-form/settings/tax-rates")
            ->with('success_msg',"Successfully deleted tax rates.");
    }


}