@extends('layouts.master')
 
@section('content')
<h1> ITEMS DEL MENU </h1>
@if(Session::has('notice'))
<div class="alert alert-danger fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h4>{{ Session::get('notice') }}</h4>
    </div>
    @endif
<p> <a href='items/create' class="btn btn-primary"><i class="icon-plus"></i> Crear nuevo item</a> </p>
<!--    @if($categories->count())
     @foreach($categories as $category)
     {{ link_to ('item/create/'.$category->id, $category->name, array('class'=>'btn btn-danger')) }}
     @endforeach
     <br>
     <br>-->
<div class="panel-group" id="accordion">
@foreach($categories as $category)
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{$category->name}}">
          {{$category->name}}
        </a>
      </h4>
    </div>
    <div id="{{$category->name}}" class="panel-collapse collapse in">
      <div class="panel-body">
      <table class="table table-striped">
      <thead>
          <tr>
             <th> Codigo </th>
             <th> Nombre </th>
             <th> Descripcion</th>
             <th> Precio</th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($category->items as $item)
             <tr>
                <td> {{ $item->id }} </td>
                <td> {{ $item->name }} </td>
                <td> {{ $item->description }} </td>
                <td> <h4><span class="label label-success">$ {{$item->price}}</span></h4></td>
                <td> <a href='items/{{$item->id}}/edit' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a></td>
                <td><a href='items/{{$item->id}}/delete' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
             </tr>
          @endforeach
          </tbody>
      </table>
      </div>
    </div>
  </div>
@endforeach
</div>
    @else
       <p> Primero debe crear las categorias </p>
    @endif
<script type="text/javascript">
$(document).ready(function ()
{
$('#item').addClass("active");
});
</script>
@stop
