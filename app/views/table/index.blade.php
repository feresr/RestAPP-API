@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
{{HTML::script('js/chosen.jquery.js')}}
  <style>
  #draggable
  {   
  height:110px;
  width:130px;
  position: absolute;
}
.active{
  background-color: #357ebd;
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
<div id='draggable' value='{{$coord->table_id}}' onclick="edit({{ $coord->table_id}})" class="img-circle" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">
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
<div id="new">
</div>
</div>
</div>
</div>
<script>

function edit(idtable){      
$('#new').load("tables/edit/"+ idtable);                        
};

$('#save').click(function(){
 $('#new').load("tables/create"); 
})

$('.img-circle').on('click', function() {
$('.img-circle').removeClass('active');
    $(this).addClass('active');
});
</script>
@stop