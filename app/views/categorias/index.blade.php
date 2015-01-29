@extends('layouts.master')
 
@section('content')
<h1> CATEGORIAS DEL MENU </h1>
@if(Session::has('notice'))
<div class="alert alert-danger fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h4>{{ Session::get('notice') }}</h4>
    </div>
    @endif
<p><a href='categorias/create' class="btn btn-primary"><i class="icon-plus"></i> Crear categoria</a></p>
<div class='errors_form'></div>
    @if($categories->count())
<div class="widget-content-white glossed">
    <div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Nombre </th>
             <th> Descripcion </th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($categories as $category)
             <tr id='fila_{{$category->id}}'>
                <td> {{ $category->name }} </td>
                <td> {{ $category->description }} </td>
                <td> <a href='categorias/{{$category->id}}/edit' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a> </td>
                <td><a href='javascript:confirmar({{$category->id}})' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>
</div>
    @else
       <div class="alert alert-danger"> No se han encontrado categorias de menu </div>
    @endif
<script type="text/javascript">
$(document).ready(function ()
{
$('#cat').addClass("active");
});

function confirmar(id){ 
confirmar=confirm("¿Estas seguro que quieres elimar la categoria?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("categorias/delete/"+ id, 
            function(data){
                if (data.success == true){
                  alert(data.message);
                  location.href = "http://localhost/restapp-api/public/index.php/categorias";
                }

            });  
} 
}
</script>
@stop
