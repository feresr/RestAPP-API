<?php
 class StatisticsController extends BaseController {

public function index() {
   $items = DB::table('item_order')->where('item_order.created_at', '>', '2014-07-31')
   ->join('items', 'item_order.item_id', '=', 'items.id')
   ->select('items.name', DB::raw('SUM(quantity) AS quantity'))->groupBy('item_id')
   ->orderBy('quantity', 'desc')->get();
   return Response::json($items);
   }

 public function barrasChart(){

$items = DB::select('SELECT Month(created_at) as fecha, SUM(total) as total FROM orders
group by Month(created_at)');

	return Response::json($items);
 }
  public function barrasChart1(){

   $orders = DB::table('orders')->where('orders.active', '=', true)
   ->join('users', 'orders.user_id', '=', 'users.id')
   ->select('users.firstname', DB::raw('SUM(total) AS total'))->groupBy('user_id')
   ->orderBy('users.firstname', 'asc')->get();
	return Response::json($orders);
 }

}