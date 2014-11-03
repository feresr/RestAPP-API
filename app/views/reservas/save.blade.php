@extends('layouts.master')

@section('content')
@section('head')
{{HTML::script('js/functions.js')}}
@stop
<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h1>{{$title}} Reserva</h1>
<div class='errors_form'></div>
{{ Form::open(array('url' => 'reservas/create/'.$reserva->id, 'id' => 'form')) }}
<input type="hidden" class="form-control" id= 'link' value='reservas'>
    <div class="form-group">
       {{ Form::label ('date', 'Fecha') }}
       <input class="form-control" placeholder="Fecha" autocomplete="of" name="date" type="date" value="{{$reserva->date}}" id="date">
    </div>
    <div class="form-group">
       {{ Form::label ('name', 'Nombre') }}
       {{ Form::text ('name', $reserva->name, array('class'=>'form-control','placeholder'=>'Nombre', 'autocomplete'=>'of')) }} 
     </div> 
       <div class="form-group">
       {{ Form::label ('cantpersons', 'Cantidad de personas') }}
       {{ Form::text ('cantpersons', $reserva->cantpersons, array('class'=>'form-control','placeholder'=>'Cantidad de personas', 'autocomplete'=>'of')) }} 
     </div>
      <br>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      {{ Form::submit('Guardar reserva',array('class'=>'btn btn-primary')) }}
       {{ link_to('reservas', 'Volver') }}
{{ Form::close() }}
</div>
</div>
</div>
</div>
<div class="col-md-4">
{{ HTML::image('images/calendar.png', "Imagen no encontrada", array('id' => 'calendar')) }}
</div>
</div>
@stop