@extends('layouts.master')

@section('content')
<div class="widget">
<div class="widget-content-white glossed">
<div class="padded">
<h1> Mesa Nro: <span class="badge"><h2>{{ $order->table['number'] }}</h2></span> </h1>
    <ul>
       <li> Mozo: {{ $order->user['name'].' '.$order->user['lastname']}} </li>
       <li> Estado: @if($order->active==true)
       				<span class="label label-success">Abierta</span>
       				@else
       				<span class="label label-danger">Cerrada</span>
       				@endif
        </li>
<input type="hidden" class="form-control" id= 'order_id' name="order_id" value='{{$order->id}}'>
<ul>
  <h3>Items de la orden</h3>
          <table class="table table-striped table-bordered table-hover datatable">
           <tr>
             <th> Item </th>
             <th> Descripcion </th>
             <th> Cantidad </th>
             <th> Precio unitario </th>
             <th> Precio total </th>
          </tr>
       @foreach($order->items as $item)
            <tr>
                <td> {{ $item->name }} </td>
                <td> {{ $item->description }} </td>
                <td> {{ $item->pivot->quantity }} </td>
                <td> $ {{$item->pivot->price}}</td>
                <td>$ {{$item->pivot->price*$item->pivot->quantity}}</td>
          </tr>
      @endforeach
            <tr>
                <td><h3>Total: <span class="label label-success">$ {{$order->total}}</span></h3></td>
            </tr>
        </table>
    </ul>
    <p> {{ link_to('orders', 'Ir a ordenes') }} </p>
</div>
</div>
</div>
@stop