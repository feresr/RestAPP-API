@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h2> Esta seguro que quiere eliminar este item? </h2>
    <ul>
       <li> Nombre: {{ $item->name }} </li>
       <li> Descripcion: {{ $item->description }} </li>
       <li> Precio: {{ $item->price }} </li>
       <li> Categoria: {{ $item->category['name'] }} </li>
    </ul>
    <p>   {{ Form::open(array('url' => 'items/'.$item->id)) }}
      {{ Form::hidden("_method", "DELETE") }}
      {{ Form::submit("Eliminar",array('class'=>'btn btn-success')) }}
   {{ Form::close() }}</p>
    <p> {{ link_to('items', 'Volver atrás') }} </p>
</div>
</div>
</div>
</div>
</div>
@stop