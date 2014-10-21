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
    <div class="padded">
        <div class="row">
        @foreach($orders as $order)
        <div class="col-lg-3">
        @if($order->ready == true)
            <div class="panel panel-success">
            <span class="label label-success pull-right">Mozo: {{$order->user['firstname'].' '.$order->user['lastname']}}</span>
        @else
            <div class="panel panel-danger">
              <span class="badge pull-right alert-animated">Mozo: {{$order->user['firstname'].' '.$order->user['lastname']}}</span>
              <button id='check' value="{{$order->id}}" type="button" class="btn btn-primary pull-right">Vista </button>
        @endif
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    {{ HTML::image('images/table.png', "Imagen no encontrada", array('class' => 'img-circle')) }}
                    <h4><span class="label label-success">Mesa Nº {{$order->table['number']}}</span></h4>
                  </div>
                  <div class="col-xs-6 text-right">
                    {{ HTML::image('images/waiter.png', "Imagen no encontrada", array('class' => 'img-circle')) }}
                  </div>
                </div>
              </div>              
                <div class="panel-footer announcement-bottom">
                <td> {{ link_to('orders/'.$order->id, 'Ver') }} </td>               
                <td>
                @if($order->active==true) 
                  {{ link_to('orders/edit/'.$order->id, 'Editar',array('class'=>'btn btn-default btn-xs')) }} 
                  @endif
                </td>
          <td>
        @if($order->active==true)
        {{ link_to('orders/cobrar/'.$order->id, 'Cobrar',array('class'=>'btn btn-primary btn-xs')) }}
        @endif
                </td>
        <td> 
<td><a href='orders/{{$order->id}}/delete' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
        </td>
        <td><a href='orders/editar/{{$order->id}}' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a></td>
                </div>
            </div>
          </div>
          @endforeach
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
