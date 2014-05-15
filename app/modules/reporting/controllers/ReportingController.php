<?php 
namespace App\Modules\Reporting;

class ReportingController extends \BaseController
{

	/**
	 * Display overview reporting
	 *@param none
	 *@return none
	 */
	public function indexAction()
	{

		$earningGraphs = \Site::earningGraphs( date('Y') );


		return \View::make('reporting::overview')
			->with('maxSale', '100000')
			->with('earningGraphs', $earningGraphs);
	}


	/**
	 * Display sales reporting
	 *@param none
	 *@return none
	 */
	public function salesAction()
	{
		return \View::make('reporting::sales');
	}

	/**
	 * Display orders reporting
	 *@param none
	 *@return none
	 */
	public function ordersAction()
	{
		$lists = new \OrderTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}

		$customers = \Order::getCustomers();
		$ordernos = \Order::getOrderNos();

		return \View::make('reporting::orders')
			->with('customers', $customers)
			->with('ordernos', $ordernos )
			->with('lists', $lists);
	}

	/**
	 * Display members reporting
	 *@param none
	 *@return none
	 */
	public function membersAction()
	{

		// $users 		= User::all();
	
		$lists = new \UserTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}

		$groups = \Group::where('group', '!=', 'Super User')->select('group', 'id')->get();

		return \View::make('reporting::members')
			->with('groups', $groups)
			->with('lists', $lists);
	}





	
}