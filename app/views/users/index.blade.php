@extends('layouts.master')

@section('content')
<h1> USUARIOS </h1>
  @if(Session::has('notice'))
  <p> <strong> {{ Session::get('notice') }} </strong> </p>
  @endif
    <p><a href='users/create' class="btn btn-primary"><i class="icon-plus"></i> Crear nuevo usuario</a></p>
    @if($users->count())
<div class="widget-content-white glossed">
    <div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Username </th>
             <th> Apellido </th>
             <th> Nombre </th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $item)
             <tr>
                <td> {{ $item->username }} </td>
                <td> {{ $item->lastname }} </td>
                <td> {{ $item->firstname}} </td>
                <td> {{ link_to('users/'.$item->id, 'Ver') }} </td>
                <td><a href='users/{{$item->id}}/edit' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a> </td>
                <td> 
  			{{ Form::open(array('url' => 'users/'.$item->id)) }}
     		 {{ Form::hidden("_method", "DELETE") }}
        <input type="submit" value="Eliminar" class="btn btn-primary btn-xs">
   			{{ Form::close() }}
</td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>
</div>
    @else
       <p> No se han encontrado usuarios </p>
    @endif
<script type="text/javascript">
$(document).ready(function ()
{
$('#user').addClass("active");
});
</script>
@stop
