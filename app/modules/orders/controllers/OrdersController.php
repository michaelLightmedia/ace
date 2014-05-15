<?php 
namespace App\Modules\Orders;

class OrdersController extends \BaseController
{

	/**
	 * Display overview Orders
	 *@param none
	 *@return none
	 */
	public function indexAction()
	{

		$lists = new \OrderTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
			return \View::make('orders::index')
				->with('lists', $lists);
		}
	}


	/**
	 * Display sales Orders
	 *@param none
	 *@return none
	 */
	public function detailsAction($id)
	{
		$lists = new \OrderDetailsTable($id);

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
			$order = \Order::find($id);
			$user = \User::find($order->user_id);
	
			return \View::make('orders::details')
				->with('order', $order)
				->with('user', $user)
				->with('lists', $lists);
		}
	}


	public function deleteAction()
	{
		$cid = \Input::get('cid');

		$affectedRows = \Order::whereIn('id', $cid)->delete();
		if(\Request::ajax())
		{
			echo json_encode(array('status' => $affectedRows));
			exit;
		}
		else
		{
			return $affectedRows;
		}
		
	}
	

	public function statusChangeAction()
	{
		$cid = \Input::get('cid');
		$status = \Input::get('status');
		if($status != -1)
		{
			$affectedRows = \Order::whereIn('id', $cid)->update(array('order_status' => $status));
		}

		if(\Request::ajax())
		{
			echo json_encode(array('status' => $affectedRows));
			exit;
		}
		else
		{
			return $affectedRows;
		}

	}

	public function paymentStatusChangeAction()
	{
		$cid = \Input::get('cid');
		$status = \Input::get('status');
		if($status != -1)
		{
			$affectedRows = \DB::table('payments')->whereIn('order_number', $cid)->update(array('payment_status' => $status));
		}


		if(\Request::ajax())
		{
			echo json_encode(array('status' => $affectedRows));
			exit;
		}
		else
		{
			return $affectedRows;
		}

	}

	
	
}