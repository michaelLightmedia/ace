<?php
namespace App\Modules\Tax;

class TaxYearController extends \BaseController
{
    function getIndex() {


        $list = new \TaxYearTBList();

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

        return \View::make('tax::tax-settings/tax-year.index')->with('list', $list);
    }

    /**
     * @param TaxYear $tax_year
     * @return mixed
     */
    function getCreate() {
        return \View::make('tax::tax-settings/tax-year.create_edit');
    }

    /**
     * @param TaxYear $tax_year
     * @return mixed
     */
    function postCreate() {
        $tax_year = new \TaxYear;
        if ($has_error = $tax_year->validateData()){
            return $has_error;
        }
        $tax_year->saveData();

        return \Redirect::to('/admin/tax-form/settings/tax-years')
            ->with('success_msg',"Successfully added tax year.");
    }

    /**
     * @param TaxYear $tax_year
     * @return mixed
     */
    function getEdit(\TaxYear $tax_year) {
        return \View::make('tax::tax-settings/tax-year.create_edit')->with('tax_year',$tax_year);
    }

    function postEdit(\TaxYear $tax_year) {
        if ($has_error = $tax_year->validateData()){
            return $has_error;
        }

        $tax_year->saveData();

        return \Redirect::to("/admin/tax-form/settings/tax-years/{$tax_year->year}/edit")
            ->with('success_msg',"Successfully updated tax year.");

    }

    function getDelete(\TaxYear $tax_year) {
        $tax_year->delete();

        return \Redirect::to("/admin/tax-form/settings/tax-years")
            ->with('success_msg',"Successfully deleted tax year.");
    }


}