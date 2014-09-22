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
<h1> Categorias </h1>
<div class='errors_form'></div>
    {{ Form::open(array('url' => 'categorias/create/'. $category->id, 'id'=>'form')) }}
    <input type="hidden" class="form-control" id= 'link' value='categorias'>
    <div class="form-group">
       {{ Form::label ('name', 'Nombre') }}
       {{ Form::text ('name', $category->name, array('class'=>'form-control','placeholder'=>'nombre', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('description', 'Descripcion') }}
       {{ Form::text ('description', $category->description, array('class'=>'form-control','placeholder'=>'Descripcion', 'autocomplete'=>'of')) }} 
     </div> 
       {{ Form::submit('Guardar categoria',array('class'=>'btn btn-success')) }}
       {{ link_to('categorias', 'Cancelar') }}
    {{ Form::close() }}
</div>
</div>
</div>
</div>
<div class="col-md-4">
</div>
</div>
@stop