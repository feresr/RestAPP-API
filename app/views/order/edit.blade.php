@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <style>
  .draggable
  { 	
  height:110px;
	width:130px;
  position: absolute;
}

  .draggable.active
  {   
  background-color: #2980b9;
  border-color: #2980b9;
}

  #containment-wrapper { 
  border:1px solid #000;
  height:700px;
  position:relative;
  width:800px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
  </style>
@stop
<div id="containment-wrapper">
@foreach($coords as $coord)
<div id='table_select' value='{{$coord->table_id}}' onclick="editar({{ $coord->table_id}})" class="draggable" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">
{{ HTML::image('images/table.png') }}
  <div class='indicators'><h3><span class="label label-success">{{$coord->table_id}}</span></h3>

  </div>
</div>
@endforeach
</div>
<div id="result">
</div>

<script>
/*$('#table_select').click(function() {
    $('#table_select').removeClass('active');
    $(this).addClass('active');
  });*/
function editar(idtable){          
$.getJSON("edi/"+ idtable, 
            function(data){
              $('#result').html("");
                if (data.success == false){
                  $('#result').html("No existen ordenes en esta mesa");
                }
              $.each(data, function(i,order){
                    // si la respuesta fue exitosa entonces eliminamos la fila de la tabla 
                    //$('#result').html("");
                    $('#result').load('http://localhost/restapp-rest/public/index.php/orders/list/'+order.id);
                    //$("#tabla").load('list/'+idorder);
              })
            });                         
}
</script>
@stop