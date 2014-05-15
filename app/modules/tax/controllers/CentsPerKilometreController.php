<?php
namespace App\Modules\Tax;

class CentsPerKilometreController extends \BaseController
{
    function getIndex() {
        $list = new \CentsPerKilometreTBList();

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

        return \View::make('tax::tax-settings/cents-per-kilometre.index')->with('list', $list);
    }

    /**
     * @param CentsPerKilometre $cents_per_kilometre
     *
     * @return mixed
     */
    function getCreate() {
        return \View::make('tax::tax-settings/cents-per-kilometre.create_edit');
    }

    /**
     * @param CentsPerKilometre $cents_per_kilometre
     *
     * @return mixed
     */
    function postCreate() {
        $cents_per_kilometre = new \CentsPerKilometre;
        if ($has_error = $cents_per_kilometre->validateData()){
            return $has_error;
        }
        $cents_per_kilometre->saveData();

        return \Redirect::to('/admin/tax-form/settings/cents-per-kilometre')
            ->with('success_msg',"Successfully added help rates.");
    }

    /**
     * @param CentsPerKilometre $cents_per_kilometre
     * @return mixed
     */
    function getEdit(\CentsPerKilometre $cents_per_kilometre) {
        return \View::make('tax::tax-settings/cents-per-kilometre.create_edit')->with('cents_per_kilometre',$cents_per_kilometre);
    }

    function postEdit(\CentsPerKilometre $cents_per_kilometre) {
        if ($has_error = $cents_per_kilometre->validateData()){
            return $has_error;
        }


        $cents_per_kilometre->saveData();

        return \Redirect::to("/admin/tax-form/settings/cents-per-kilometre/{$cents_per_kilometre->id}/edit")
            ->with('success_msg',"Successfully updated help rates.");

    }

    function getDelete(\CentsPerKilometre $cents_per_kilometre) {
        $cents_per_kilometre->delete();

        return \Redirect::to("/admin/tax-form/settings/cents-per-kilometre")
            ->with('success_msg',"Successfully deleted help rates.");
    }

}