@extends('layouts.master')
@section('content')
@section('head')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
{{HTML::script('js/charts.js')}}
@stop
            <div class="widget">
              <div class="widget-controls pull-right">
                <a href="#" class="widget-link-remove"><i class="icon-minus-sign"></i></a>
                <a href="#" class="widget-link-remove"><i class="icon-remove-sign"></i></a>
              </div>
              <h3 class="section-title first-title"><i class="icon-tasks"></i> Statistics</h3>
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                  <div class="widget-content-blue-wrapper animated flipInY changed-up">
                    <div class="widget-content-blue-inner padded">
                      <div class="pre-value-block"><i class="icon-dashboard"></i> Ordenes</div>
                      <div class="value-block">
                        <div class="value-self">{{$orders}}</div>
                        <div class="value-sub">Atendidas</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                  <div class="widget-content-blue-wrapper animated flipInY changed-up">
                    <div class="widget-content-blue-inner padded">
                      <div class="pre-value-block"><i class="icon-user"></i> Usuarios</div>
                      <div class="value-block">
                        <div class="value-self">{{$users->count()}}</div>
                        <div class="value-sub">Registrados</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 text-center hidden-md">
                  <div class="widget-content-blue-wrapper animated flipInY changed-up">
                    <div class="widget-content-blue-inner padded">
                      <div class="pre-value-block"><i class="icon-signin"></i> Sold Items</div>
                      <div class="value-block">
                        <div class="value-self">275</div>
                        <div class="value-sub">This Week</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                  <div class="widget-content-blue-wrapper animated flipInY changed-up">
                    <div class="widget-content-blue-inner padded">
                      <div class="pre-value-block"><i class="icon-money"></i> Net Profit</div>
                      <div class="value-block">
                        <div class="value-self">$9,240</div>
                        <div class="value-sub">Yesterday</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<div class='row'>
<div class='col-md-7'>
<div class='widget'>
<h3 class="section-title first-title"><i class="icon-table"></i> Balance</h3>
<div class='widget-content-white padded glossed'>
<div id="chart_div" style="height: 400px;"></div>
</div>
</div>
</div>
  <div class='col-md-5'>
    <div class='widget'>
<h3 class="section-title first-title"><i class="icon-table"></i> Top Sellers</h3>
<div class="widget-content-white padded glossed">
<div id="piechart"></div>
    <table id='cat' class="table">
      <thead>
        <tr>
          <th>Items</th>
          <th>Cantidad</th>
        </tr>
      </thead>
    <tbody>
  </tbody>
</table>
</div>
</div>
</div>
</div>
<div class="row">
<div class='widget col-md-6'>
<h3 class="section-title first-title"><i class="icon-table"></i> Cantidad facturada por mozo</h3>
<div class='widget-content-white padded glossed'>
<div id="chart_div1" style="height: 400px;"></div>
</div>
</div>
<div class='widget col-md-6'>
<h3 class="section-title first-title"><i class="icon-table"></i> Cantidad de mesas por mozo</h3>
<div class='widget-content-white padded glossed'>
<div id="chart_div2" style="height: 400px;"></div>
</div>
</div>
</div>
<h3 class="section-title first-title"><i class="icon-tasks"></i> Ordenes</h3>
<div class="panel-group" id="accordion">
@foreach($users as $user)
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{$user->firstname}}">
          {{$user->firstname.', '.$user->lastname}}
        </a>
      </h4>
    </div>
    <div id="{{$user->firstname}}" class="panel-collapse collapse">
    @if($user->orders()->count())
      <div class="panel-body">
        <div class="widget-content-white glossed">
          <div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Fecha </th>
             <th> Estado </th>
             <th> Mesa </th>
             <th> </th>
          </tr>
          </thead>
        <tbody>
      @foreach($user->orders as $order)
              <tr>
                <td> {{ $order->created_at }} </td>
                <td> @if($order->active==true)
                <span class="label label-success">Abierta</span>
              @else
                <span class="label label-danger">Cerrada</span>
              @endif
              </td>
                <td> {{$order->table['number']}}</td>
                <td> {{ link_to('orders/'.$order->id, 'Ver') }} </td>               
                <td>
                @if($order->status==1)  
                  {{ link_to('orders/edit/'.$order->id, 'Editar',array('class'=>'btn btn-default btn-xs')) }} 
                @endif
                </td>
                <td> 
        {{ Form::open(array('url' => 'orders/'.$order->id)) }}
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
      </div>
    @else
    <div class="alert alert-danger">No existen ordenes</div>
      @endif
    </div>
  </div>
@endforeach
</div>
@stop