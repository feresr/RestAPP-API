@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <style>
  .draggable
  { 	
  height:0px;
	width:0px;
  cursor:move;
}

  #containment-wrapper { 
  height:700px;
  position:relative;
  width:800px;
}
  </style>
@stop
<p> <a id="form" class="btn btn-primary"><i class="icon-plus"></i> Crear mesa</a> </p>
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<div id="containment-wrapper">
@foreach($coords as $coord)
<div id="draggable{{$coord->id}}" value="{{$coord->table_id}}" class="draggable ui-widget-content" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;" >
{{ HTML::image('images/table.png') }}
  <div class='indicators'><h3><span class="label label-success">{{$coord->table['number']}}</span></h3>
  </div>
</div>
@endforeach
</div>
<hr>
<div id="create">
</div>
</div>
</div>
</div>

 <script>
  $(document).ready(function() {
  $.getJSON("/restapp-rest/public/index.php/orders/coords", function (datos) {
    $.each(datos, function(id, item){
    $( "#draggable"+item.id ).draggable
    ({ containment: "#containment-wrapper", scroll: false }).mouseup(
    				function(){
						var coord = $(this).position();		
            var id =  $("#draggable1").val();			
						$.post("savepos/" + coord.left + "/" + coord.top+"/"+item.id, 
            				function(data){
                			if (data.success != true){
                  				alert('Error');
                			}else{
                				alert(data.message);
                }
            });  
					});
  });
  });

  $("#form").click(function(){
    $("#create").load("/restapp-rest/public/index.php/tables/create");
  });
  });
  </script>
@stop