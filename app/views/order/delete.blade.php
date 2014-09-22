@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h2> Esta seguro que quiere eliminar esta Orden? </h2>
    <ul>
       <li> Mozo: {{$order->user['firstname']}} {{$order->user['lastname']}}</li>
       <li> Mesa Nro: {{$order->table['number']}} </li>
       <li> Estado: 
        @if($order->active==true)
          <span class="label label-success">Abierta</span>
        @else
           <span class="label label-danger">Cerrada</span>
        @endif </li>
    </ul>
    <p>   {{ Form::open(array('url' => 'orders/'.$order->id)) }}
      {{ Form::hidden("_method", "DELETE") }}
      {{ Form::submit("Eliminar",array('class'=>'btn btn-danger')) }}
   {{ Form::close() }}</p>
    <p> {{ link_to('orders', 'Volver atrás') }} </p>
</div>
</div>
</div>
</div>
</div>
@stop