@extends('layouts.master')

@section('content')
@if(Session::has('notice'))
<div class="alert alert-danger fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h4>{{ Session::get('notice') }}</h4>
    </div>
    @endif
<h1> RESERVAS </h1>
<p><a href='reservas/create' class="btn btn-primary"><i class="icon-plus"></i> Crear Reserva</a></p>
<div class='errors_form'></div>
<div class="widget-content-white glossed">
    <div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Fecha </th>
             <th> Nombre </th>
             <th> Cantidad de personas </th>
          </tr>
          </thead>
          <tbody>
          @foreach($reservas as $reserva)
             <tr>
                <td> {{ $reserva->date }} </td>
                <td> {{ $reserva->name }} </td>
                <td> {{ $reserva->cantpersons }} </td>
                <td> <a href = 'reservas/{{$reserva->id}}/edit' class="btn btn-default btn-xs"><i class="icon-pencil"></i>edit</a> </td>
                <td><a href='javascript:confirmar({{$reserva->id}})' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>
</div>
<script type="text/javascript">
$(document).ready(function ()
{
$('#res').addClass("active");
});

function confirmar(id){ 
confirmar=confirm("¿Estas seguro que quieres elimar la reserva?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("reservas/delete/"+ id, 
            function(data){
                if (data.success == true){
                  alert(data.message);
                  location.href = "http://localhost/restapp-api/public/index.php/reservas";
                }

            });  
} 
}
</script>
@stop
