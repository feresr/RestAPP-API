@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
@stop

<h2>MESAS</h2>
<div class="btn-group">
<a href="#new" id="save" class="btn btn-primary"><i class="icon-plus"></i> Crear mesa</a>
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
<a href="#new">
<div id='draggable' value='{{$coord->table_id}}' onclick="edit({{ $coord->table_id}})" class="img-circle" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">
{{ HTML::image('images/table.png') }}
@if($coord->table['taken'] == true)
  <div class='indicators'><h3>
    <span id="marca{{$coord->table_id}}" class="label label-false">{{$coord->table['number']}}</span></h3>
  </div>
@else
  <div class='indicators'><h3>
    <span id="marca{{$coord->table_id}}" class="label label-success">{{$coord->table['number']}}</span></h3>
  </div>
@endif
</div>
</a>
@endforeach
</div>
<hr>
<div id="new">
</div>
</div>
</div>
</div>
<script>

function edit(idtable){
$('.label-success').css({'font-size':'75%','background':'#7EA568'}); 
$('.label-false').css({'font-size':'75%','background':'#F00'});
$('#marca'+idtable).css({'font-size':'130%','background':'#2980b9'});

$('#new').load("tables/edit/"+ idtable);                        
};

$('#save').click(function(){
 $('#new').load("tables/create"); 
})

</script>
@stop