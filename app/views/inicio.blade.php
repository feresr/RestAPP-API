@extends('layouts.master')
@section('content')
@section('head')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
{{HTML::script('js/charts.js')}}
{{HTML::script('js/bootstrap-datetimepicker.min.js')}}
{{HTML::script('js/bootstrap-datetimepicker.es.js')}}
{{HTML::style('css/bootstrap-datetimepicker.min.css')}}
@stop
<?php 
$hasta = date('Y-m-d');
$nuevafecha = strtotime ( '-1 month' , strtotime ( $hasta ) ) ;
$desde = date ( 'Y-m-d' , $nuevafecha );
?>
            <div class="widget">
              <div class="widget-controls pull-right">
                <a href="#" class="widget-link-remove"><i class="icon-minus-sign"></i></a>
                <a href="#" class="widget-link-remove"><i class="icon-remove-sign"></i></a>
              </div>
              <h3 class="section-title first-title"><i class="icon-tasks"></i> Estadísticas</h3>
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
                      <div class="pre-value-block"><i class="icon-signin"></i>Items Vendidos</div>
                      <div class="value-block">
                        <div class="value-self">275</div>
                        <div class="value-sub">Esta Semana</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                  <div class="widget-content-blue-wrapper animated flipInY changed-up">
                    <div class="widget-content-blue-inner padded">
                      <div class="pre-value-block"><i class="icon-money"></i> Ganancias</div>
                      <div class="value-block">
                        <div class="value-self">$9,240</div>
                        <div class="value-sub">Hoy</div>
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
  <div class="form-group">
                <label for="date1" class="col-md-2 control-label">Desde:</label>
                <div class="input-group date form_date col-md-10" data-date="" data-date-format="dd MM yyyy" data-link-field="date1" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" id="ventas1" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
        <input type="hidden" id="date1" value="{{$desde}}" /><br/>
        <label for="date2" class="col-md-2 control-label">Hasta:</label>
                <div class="input-group date form_date col-md-10" data-date="" data-date-format="dd MM yyyy" data-link-field="date2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" id="ventas2" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
        <input type="hidden" id="date2" value="{{$hasta}}" /><br/>
      </div>
<!--Desde: <input value="{{$desde}}" placeholder="Fecha" autocomplete="of" name="date1" type="date" id="date1">
Hasta: <input value="{{$hasta}}" placeholder="Fecha" autocomplete="of" name="date2" type="date" id="date2"> -->
<button id='busqueda' type="button" class="btn btn-default pull-right" style="margin-top:5px;">Buscar</button>
<br>
<hr>
<div id="chart_div" style="height: 400px;"></div>
<br>
</div>
</div>
</div>
  <div class='col-md-5'>
    <div class='widget'>
<h3 class="section-title first-title"><i class="icon-table"></i> Mas vendidos</h3>
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

<div class='widget'>
<h3 class="section-title first-title"><i class="icon-table"></i>Imformacion Mozos</h3>
<div class='widget-content-white padded glossed'>
  <div class="form-group">
<label for="fechaMozo1" class="col-md-1 control-label">Desde:</label>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="fechaMozo1" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="25" type="text" value="" id="mozo1" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
        <input type="hidden" id="fechaMozo1" value="{{$desde}}" />
        <label for="fechaMozo2" class="col-md-1 control-label">Hasta:</label>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="fechaMozo2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="25" type="text" id="mozo2" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
        <input type="hidden" id="fechaMozo2" value="{{$hasta}}" />
</div>
<hr>
<button style="float:right;" id='busquedaMozo' class="btn btn-default" type="button">Buscar</button>
<br><br>
<div class="row">
<div class='col-md-6'>
<div id="chart_div1" style="height: 400px;"></div>
</div>
<div class='col-md-6'>
<div id="chart_div2" style="height: 400px;"></div>
</div>
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
          @if($order->active==true)
              <tr>
                <td> {{ $order->created_at }} </td>
                <td> 
                <span class="label label-success">Abierta</span>              
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
        <button type="submit" class="btn btn-danger btn-xs"><i class="icon-remove"></i></button>
        {{ Form::close() }}
                </td>
             </tr>
             @endif
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
<script type="text/javascript">
$('#estadisticas').addClass("active");

var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var f = new Date();
var fecha1 = f.getDate() +" "+ meses[f.getMonth()-1] + " "+f.getFullYear();
var fecha2 = f.getDate() +" "+ meses[f.getMonth()] + " "+f.getFullYear();
$( "#ventas1" ).val(fecha1);
$( "#ventas2" ).val(fecha2);
$( "#mozo1" ).val(fecha1);
$( "#mozo2" ).val(fecha2);
//document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());

$('.form_date').datetimepicker({
    language:  'es',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });

$("#busqueda").click(function (){          

var desde = $( "#date1" ).val();
var hasta = $( "#date2" ).val();
draw(desde, hasta);                       
});

function draw(desde, hasta) {

$.getJSON("/restapp-api/public/index.php/admin/colum/"+desde+"/"+hasta,
 function (datos) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Meses');
        data.addColumn('number', 'Total');
          
          $.each(datos, function(id, item){
            //obtengo el nombre del mes como string
          valorFecha = meses[item.fecha-1];
          data.addRows([
            [valorFecha, item.total],
            ])
          })

        var options = {
          title: 'Ventas Mensuales',
          hAxis: {title: 'Meses', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
  });
}

$("#busquedaMozo").click(function (){          
var desdeM = $( "#fechaMozo1" ).val();
var hastaM = $( "#fechaMozo2" ).val();

drawMozos(desdeM, hastaM);
drawMesas(desdeM, hastaM);                     
});

function drawMozos(desde, hasta) {

$.getJSON("/restapp-api/public/index.php/admin/colum1/"+desde+"/"+hasta,
 function (datos) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'User');
        data.addColumn('number', 'Total');
          
          $.each(datos, function(id, item){
          data.addRows([
            [item.firstname, item.total],
            ])
          })

        var options = {
          title: 'Cantidad Facturada por mozo',
          hAxis: {title: 'Mozos', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
  });
}

function drawMesas(desde, hasta) {

$.getJSON("/restapp-api/public/index.php/admin/mesasXmozo/"+desde+"/"+hasta,
 function (datos) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'User');
        data.addColumn('number', 'Total');
          
          $.each(datos, function(id, item){
          data.addRows([
            [item.firstname, item.total],
            ])
          })

        var options = {
          title: 'Mesas Atendidas por mozo',
          hAxis: {title: 'Mozos', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
  });
}
</script>
@stop