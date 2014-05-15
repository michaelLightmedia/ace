<?php
namespace App\Modules\Tax;

class TaxFormController extends \BaseController
{
    function getIndex() {

        $list = new \TaxFormTBList();

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

        return \View::make('tax::index')->with('list', $list);
    }

    /**
     * @param OffsetRate $offset_rate
     *
     * @return mixed
     */
    function getCreate() {
        return \View::make('tax::tax-settings/offset-rates.create_edit');
    }


}