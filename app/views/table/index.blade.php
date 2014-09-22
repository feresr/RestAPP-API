@extends('layouts.master')
 
@section('content')
<h1> MESAS EXISTENTES </h1>
@if(Session::has('notice'))
<div class="alert alert-danger fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h4>{{ Session::get('notice') }}</h4>
    </div>
    @endif
    <p> <a href='tables/create' class="btn btn-primary"><i class="icon-plus"></i> Crear mesa</a> </p>
    @if($tables->count())
<div class='errors_form'></div>
<div class="widget-content-white glossed">
<div id='tables' class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Numero </th>
             <th> Descripción </th>
             <th> Cantidad </th>
             <th>Estado</th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($tables as $table)
             <tr id='fila_{{$table->id}}'>
                <td> {{ $table->number }} </td>
                <td> {{ $table->description }} </td>
                <td> {{ $table->seats }} </td>
                <td> @if($table->taken == 'false')
                <span class="label label-success">Libre</span>
              @else
                <span class="label label-danger">Ocupada</span>
              @endif</td>
                <td> <a href='tables/{{$table->id}}/edit' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a></td>
                <td><a href='tables/{{$table->id}}/delete' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>
</div>
    @else
       <div class="alert alert-danger"> No se han encontrado Mesas</div>
    @endif
<script type="text/javascript">
$(document).ready(function ()
{
$('#table').addClass("active");
});
</script>
@stop
