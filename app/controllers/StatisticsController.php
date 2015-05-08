<?php
 class StatisticsController extends BaseController {

public function index() {
   $items = DB::table('item_order')->where('item_order.created_at', '>', '2014-07-31')
   ->join('items', 'item_order.item_id', '=', 'items.id')
   ->select('items.name', DB::raw('SUM(quantity) AS quantity'))->groupBy('item_id')
   ->orderBy('quantity', 'desc')->take(8)->get();
   return Response::json($items);
   }

 public function barrasChart($desde = null, $hasta=null){

  if ($desde == null) {
      $fecha = date('Y-m-d');
      $nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
      $desde = date ( 'Y-m-d' , $nuevafecha );
  }
  if ($hasta == null) {
      $hasta = date("Y-m-d H:m:s");
  }

  $items = DB::table('orders')
                    ->select(DB::raw('SUM(total) as total, Month(created_at) as fecha'))
                    ->groupBy(DB::raw('Month(created_at)'))
                    ->whereBetween('created_at', array($desde,$hasta))
                    ->get();

 /* $items = DB::select('SELECT Month(created_at) as fecha, SUM(total) as total FROM orders
                        
                        group by Month(created_at)');*/

	return Response::json($items);
 }

 public function ventasMensuales($desde = null, $hasta=null){

  $items = DB::table('orders')
                    ->select(DB::raw('SUM(total) as total, Month(created_at) as fecha'))
                    ->groupBy(DB::raw('Month(created_at)'))
                    ->whereBetween('created_at', array($desde,$hasta))
                    ->get();

  return Response::json($items);
 }

 public function mozosMensuales($desde = null, $hasta=null){

    $orders = DB::table('orders') 
    ->whereBetween('orders.created_at', array($desde,$hasta)) 
    ->join('users', 'orders.user_id', '=', 'users.id')
    ->select('users.firstname', DB::raw('SUM(total) AS total'))
    ->groupBy('user_id')
    ->orderBy('total', 'asc')    
    ->get();
    return Response::json($orders);
 }

  public function barrasChart1($desde = null, $hasta=null){
if ($desde == null) {
      $fecha = date('Y-m-d');
      $nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
      $desde = date ( 'Y-m-d' , $nuevafecha );
  }
  if ($hasta == null) {
      $hasta = date("Y-m-d H:m:s");
  }
   $orders = DB::table('orders')
   //->where('orders.active', '=', true)
   ->whereBetween('orders.created_at', array($desde,$hasta))
   ->join('users', 'orders.user_id', '=', 'users.id')
   ->select('users.firstname', DB::raw('SUM(total) AS total'))->groupBy('user_id')
   ->orderBy('total', 'asc')->get();
	return Response::json($orders);
 }

  public function mesasXmozo($desde = null, $hasta=null){
if ($desde == null) {
      $fecha = date('Y-m-d');
      $nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
      $desde = date ( 'Y-m-d' , $nuevafecha );
  }
  if ($hasta == null) {
      $hasta = date("Y-m-d H:m:s");
  }
   $orders = DB::table('orders')
   ->whereBetween('orders.created_at', array($desde,$hasta))
   ->join('users', 'orders.user_id', '=', 'users.id')
   //->where('orders.active', '=', true)
   ->select('users.firstname',  DB::raw('COUNT(orders.id) AS total'))->groupBy('user_id')
   ->orderBy('users.firstname', 'asc')->get();
	return Response::json($orders);
 }

 public function mesasXmozoFiltrado($desde = null, $hasta=null){

   $orders = DB::table('orders')
   ->whereBetween('orders.created_at', array($desde,$hasta))
   ->join('users', 'orders.user_id', '=', 'users.id')
   //->where('orders.active', '=', true)
   ->select('users.firstname',  DB::raw('COUNT(orders.id) AS total'))->groupBy('user_id')
   ->orderBy('users.firstname', 'asc')->get();
  return Response::json($orders);
 }
}