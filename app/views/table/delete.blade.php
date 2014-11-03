@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h2> Esta seguro que quiere eliminar la mesa? </h2>
    <ul>
       <li> Numero: {{ $table->number }} </li>
       <li> Descripcion: {{ $table->description }} </li>
       <li> Sillas: {{ $table->seats }} </li>
    </ul>
    <p>   {{ Form::open(array('url' => 'tables/'.$table->id)) }}
      {{ Form::hidden("_method", "DELETE") }}
      {{ Form::submit("Eliminar",array('class'=>'btn btn-danger')) }}
   {{ Form::close() }}</p><p>
<a href="/restapp-rest/public/index.php/tables" class="btn btn-default" role="button">Cancelar</a> </p>
</div>
</div>
</div>
</div>
</div>
@stop