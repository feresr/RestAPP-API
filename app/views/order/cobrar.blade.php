@extends('layouts.master')

@section('content')
<div class="widget">
<div class="widget-content-white glossed">
  <div class="padded">
<h1> Mesa Nro: <span class="badge"><h2>{{ $order->table_id }}</h2></span> </h1>
    <ul>
       <li> Mozo: {{ $order->user['name'].' '.$order->user['lastname']}} </li>
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
                <td> $ {{$item->pivot->price }}</td>
            </tr>
            @endforeach
              <tr>
                <td>
                <h3>Total: <span class="label label-success">$ {{$order->total}}</span></h3>
                </td>
            </tr>
    </ul>
	</table>
  <p>
      {{ Form::open(array('url' => 'orders/cobrar/'.$order->id)) }}
      <input type="submit" value="Guardar" class="btn btn-primary">
      {{ Form::close() }}
  <button type="button" class="btn btn-default">Imprimir factura</button>
</p>
    <p> {{ link_to('orders', 'Ir a ordenes') }} </p>
</div>
</div>
</div>
@stop