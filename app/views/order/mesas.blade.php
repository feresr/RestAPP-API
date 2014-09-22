@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <style>
  .draggable { 	height:100px;
	padding:10px 10px 10px 10px;
	width:100px;cursor:move;
border:1px #000 solid;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
  #containment { 
  border:1px solid #000;
  height:700px;
  margin: 0px 0px 0px 0px;
  position:relative;
  width:800px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
  </style>
@stop
<div id="containment">
@foreach($coords as $coord)
<div id="draggable{{$coord->id}}" value="{{$coord->id}}" class="draggable ui-widget-content" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;" >
{{ HTML::image('images/table.png') }}
</div>
@endforeach
</div>
 
 <script>
  $(function() {
    $( "#draggable1" ).draggable
    ({ containment: "#containment", scroll: false }).mouseup(
    				function(){
						var coord = $(this).position();		
            var id =  $("#draggable1").val();			
						$.post("savepos/" + coord.left + "/" + coord.top+"/"+1, 
            				function(data){
                			if (data.success != true){
                  				alert('Error');
                			}else{
                				alert(data.message);
                }
            });  
					});
        $( "#draggable2" ).draggable
    ({ containment: "#containment", scroll: false }).mouseup(
            function(){
            var coord = $(this).position();   
            var id =  $("#draggable2").val();  
            $.post("savepos/" + coord.left + "/" + coord.top + "/" + 2, 
                    function(data){
                      if (data.success != true){
                          alert('Error');
                      }else{
                        alert(data.message);
                }
            });  
          });
        $( "#draggable9" ).draggable
    ({ containment: "#containment", scroll: false }).mouseup(
            function(){
            var coord = $(this).position();   
            var id =  $("#draggable2").val();  
            $.post("savepos/" + coord.left + "/" + coord.top + "/" + 9, 
                    function(data){
                      if (data.success != true){
                          alert('Error');
                      }else{
                        alert(data.message);
                }
            });  
          });
        $( "#draggable4" ).draggable
    ({ containment: "#containment", scroll: false }).mouseup(
            function(){
            var coord = $(this).position();   
            var id =  $("#draggable2").val();  
            $.post("savepos/" + coord.left + "/" + coord.top + "/" + 4, 
                    function(data){
                      if (data.success != true){
                          alert('Error');
                      }else{
                        alert(data.message);
                }
            });  
          });
  });
  </script>
@stop