<?php
 class CocinaController extends BaseController {

public function index(){
	return View::make('cocina.index');
		}

public function items(){
	$orders = Order::where('active', true)->get();
	$quantOrders = DB::table('orders')->where('active', true)->count();
	$quantItems = DB::table('item_order')->count();
	return View::make('cocina.orders', array('orders' => $orders, 'quantOrders' => $quantOrders, 'quantItems' => $quantItems));
		}

public function orderview($id){
	$order = Order::find($id);
	if($order){
		$order->ready= true;
		$order->save();
		return Response::json(array(
			'success' => true
		));
	}
		return Response::json(array(
			'success' => false
		));
		}

public function itemsOrders($cant, $items){
	$quantOrders = DB::table('orders')->where('active', true)->count();
	$quantItems = DB::table('item_order')->count();
	if ($quantOrders > $cant) {
		return Response::json(array(
			'success' => true,
			'message' => 'Se ha creado una nueva orden'
		));
	}
	if ($quantOrders < $cant) {
		return Response::json(array(
			'success' => true,
			'message' => 'Se ha eliminado una orden'
		));
	}
	if ($quantItems>$items) {
		return Response::json(array(
			'success' => true,
			'message' => 'Se ha agregado un item a una orden'
		));
	}
	if ($quantItems<$items) {
		return Response::json(array(
			'success' => true,
			'message' => 'Se ha eliminado un item a una orden'
		));
	}
		return Response::json(array(
			'success' => false
		));
		}

		public function chkItem($id){
			$itemOrder = OrderItem::find($id);
			$itemOrder->view = 1;
			$itemOrder->save();
		return Response::json(array(
			'success' => true,
		));
		}
	}
?>