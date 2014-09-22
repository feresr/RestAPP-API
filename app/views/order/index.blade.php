@extends('layouts.master')
 
@section('content')

<h1> ORDENES </h1>
    @if(Session::has('notice'))
<div class="alert alert-danger fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h4>{{ Session::get('notice') }}</h4>
    </div>
    @endif
    <p> <a href='orders/create' class="btn btn-primary"><i class="icon-plus"></i> Crear nueva orden</a> </p>
    @if($orders->count())
<div class="widget-content-white glossed">
    <div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Fecha </th>
             <th> Estado </th>
             <th> Mozo </th>
             <th> Mesa </th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($orders as $item)
             <tr>
                <td> {{ $item->created_at }} </td>
                <td> @if($item->active==true)
                <span class="label label-success">Abierta</span>
              @else
                <span class="label label-danger">Cerrada</span>
              @endif </td>
                <td> {{$item->user['firstname']}} {{$item->user['lastname']}}</td>
                <td> {{$item->table['number']}}</td>
                <td> {{ link_to('orders/'.$item->id, 'Ver') }} </td>               
                <td>
                @if($item->active==true) 
                  {{ link_to('orders/edit/'.$item->id, 'Editar',array('class'=>'btn btn-default btn-xs')) }} 
                  @endif
                </td>
          <td>
        @if($item->active==true)
        {{ link_to('orders/cobrar/'.$item->id, 'Cobrar',array('class'=>'btn btn-primary btn-xs')) }}
        @endif
                </td>
        <td> 
<td><a href='orders/{{$item->id}}/delete' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
        </td>
        <td><a href='orders/editar/{{$item->id}}' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a></td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>
</div>
    @else
    <div class="alert alert-danger">No existen ordenes a la fecha</div>
    @endif
<script type="text/javascript">
$(document).ready(function (){ 
  $('#order').addClass("active");
});

</script>
@stop
