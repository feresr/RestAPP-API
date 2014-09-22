@extends('layouts.master')

@section('content')
@if(Session::has('notice'))
<div class="alert alert-danger fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h4>{{ Session::get('notice') }}</h4>
    </div>
    @endif
<h1> RESERVAS </h1>
<p> {{ link_to ('reservas/create', 'Crear nueva Reserva') }} </p>
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
                <td> <a href = 'reservas/{{$reserva->id}}/edit' class="btn btn-default btn-xs">Editar</a> </td>
                <td><a href='reservas/{{$reserva->id}}/delete' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
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
</script>
@stop
