<?php
namespace App\Modules\Tax;

class TaxMLSController extends \BaseController
{
    function getIndex() {

        $list = new \TaxMLSTBList();

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

        return \View::make('tax::tax-settings.tax-mls.index')->with('list', $list);
    }

    /**
     * @param \TaxMLS $tax_mls
     * @return mixed
     */
    function getCreate() {
        return \View::make('tax::tax-settings.tax-mls.create_edit');
    }

    /**
     * @param \TaxMLS $tax_mls
     * @return mixed
     */
    function postCreate() {
        $tax_mls = new \TaxMLS;
        if ($has_error = $tax_mls->validateData()){
            return $has_error;
        }

        $tax_mls->saveData();

        return \Redirect::to('/admin/tax-form/settings/tax-mls')
            ->with('success_msg',"Successfully added Medicare Levy Surcharge(MLS).");
    }

    /**
     * @param \TaxMLS $tax_mls
     * @return mixed
     */
    function getEdit(\TaxMLS $tax_mls) {
        return \View::make('tax::tax-settings.tax-mls.create_edit')->with('tax_mls',$tax_mls);
    }

    function postEdit(\TaxMLS $tax_mls) {
        if ($has_error = $tax_mls->validateData()){
            return $has_error;
        }

        $tax_mls->saveData();

        return \Redirect::to("/admin/tax-form/settings/tax-mls/{$tax_mls->id}/edit")
            ->with('success_msg',"Successfully updated Medicare Levy Surcharge(MLS).");

    }

    function getDelete(\TaxMLS $tax_mls) {
        $tax_mls->deleteData();

        return \Redirect::to("/admin/tax-form/settings/tax-mls")
            ->with('success_msg',"Successfully deleted Medicare Levy Surcharge(MLS).");
    }


}