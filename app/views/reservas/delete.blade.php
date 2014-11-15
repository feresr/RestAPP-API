@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h2> Esta seguro que quiere eliminar esta reserva? </h2>
    <ul>
       <li> Fecha: {{ $reserva->date }} </li>
       <li> Nombre: {{ $reserva->name }} </li>
       <li> Cantidad: {{ $reserva->cantpersons }} </li>
    </ul>
    <p>   {{ Form::open(array('url' => 'reservas/'.$reserva->id)) }}
      {{ Form::hidden("_method", "DELETE") }}
      {{ Form::submit("Eliminar",array('class'=>'btn btn-success')) }}
   {{ Form::close() }}</p>
    <p> {{ link_to('reservas', 'Volver atrás') }} </p>
</div>
</div>
</div>
</div>
</div>
@stop