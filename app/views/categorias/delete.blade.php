@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h2> Esta seguro que quiere eliminar esta categoria? </h2>
    <ul>
       <li> Nombre: {{ $category->name }} </li>
       <li> Descripcion: {{ $category->description }} </li>
    </ul>
    <p>   {{ Form::open(array('url' => 'categorias/'.$category->id)) }}
      {{ Form::hidden("_method", "DELETE") }}
      {{ Form::submit("Eliminar",array('class'=>'btn btn-danger')) }}
   {{ Form::close() }}</p>
    <p> {{ link_to('categorias', 'Volver atrás') }} </p>
 </div>
 </div>
</div>
</div>
</div>
@stop