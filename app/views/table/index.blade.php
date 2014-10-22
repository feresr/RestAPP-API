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

  #containment-wrapper { 
  height:700px;
  position:relative;
  width:800px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
  </style>
@stop
<div class="btn-group">
<a id="save" class="btn btn-primary"><i class="icon-plus"></i> Crear mesa</a>
<a href="tables/edit" class="btn btn-primary"><i class="icon-pencil"></i> Editar posicion</a>
</div>
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
@if(Session::has('notice'))
<div class="alert alert-success fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>{{ Session::get('notice') }}</h4>
</div>
@endif
<div id="containment-wrapper">
@foreach($coords as $coord)
<div id='table_select' value='{{$coord->table_id}}' onclick="edit({{ $coord->table_id}})" class="draggable" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">
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

function edit(idtable){      
$('#result').load("tables/edit/"+ idtable);                        
};

$('#save').click(function(){
 $('#result').load("tables/create"); 
})
</script>
@stop