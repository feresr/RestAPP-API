@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
{{HTML::script('js/chosen.jquery.js')}}
  <style>
  .draggable
  { 	
  height:110px;
	width:130px;
  position: absolute;
}
.label-false {
background-color: red;
}
  .draggable.active
  {   
  background-color: #2980b9;
  border-color: #2980b9;
}

  #containment-wrapper { 
  height:700px;
  position:relative;
  width:800px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
  </style>
@stop
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<div id="containment-wrapper">
@foreach($coords as $coord)
<div id='table_select' value='{{$coord->table_id}}' onclick="editar({{ $coord->table_id}})" class="draggable" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">
{{ HTML::image('images/table.png') }}
@if($coord->table['taken'] == true)
  <div class='indicators'><h3><span class="label label-success">{{$coord->table['number']}}</span></h3>
  </div>
@else
  <div class='indicators'><h3><span class="label label-false">{{$coord->table['number']}}</span></h3>
  </div>
@endif
</div>
@endforeach
</div>
<hr>
<div id="result">
</div>
</div>
</div>
</div>
<script>

function editar(idtable){          
$.post("edi/"+ idtable, 
            function(data){
              $('#result').html("");
                if (data.order == ""){
                  alert("no existe orden");
                  $('#result').html(data.error);
                }
              $.each(data, function(i,order){
                    $('#result').load('http://localhost/restapp-rest/public/index.php/orders/edit/'+order.id);
              })
            });                         
}
</script>
@stop