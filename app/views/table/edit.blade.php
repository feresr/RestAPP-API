@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
@stop

<h2>Editar posicion de mesas</h2>
<div class="btn-group">
<a href="/restapp-api/public/index.php/tables" class="btn btn-primary"><i class="icon-plus"></i> Crear mesa</a>
<a id="edit" class="btn btn-primary"><i class="icon-pencil"></i> Editar posicion</a>
</div>
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<div id="containment-wrapper">
@foreach($coords as $coord)
<div id="draggable{{$coord->id}}" value="{{$coord->table_id}}" class="draggable" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;" >
{{ HTML::image('images/table.png') }}
@if($coord->table['taken'] == true)
  <div class='indicators indicatorsTable'><h3><span class="label label-false">{{$coord->table['number']}}</span></h3>
  </div>
@else
  <div class='indicators indicatorsTable'><h3><span class="label label-success">{{$coord->table['number']}}</span></h3>
  </div>
@endif
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
  $.getJSON("/restapp-api/public/index.php/orders/coords", function (datos) {
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
    $("#create").load("/restapp-api/public/index.php/tables/create");
  });
  $("#edit").click(function(){
    $(".widget").load("/restapp-api/public/index.php/tables/edit");
  });
  });
  </script>
@stop