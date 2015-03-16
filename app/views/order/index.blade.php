@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
{{HTML::script('js/chosen.jquery.js')}}
@stop

<h2>ORDENES</h2>
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
<a href="#result">
<div id='draggable' value='{{$coord->table_id}}' onclick="editar({{ $coord->table_id}})" class="img-circle" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">

{{HTML::image('images/table.png', "Imagen no encontrada", array('id' => 'back-'.$coord->table_id))}}
<div class='indicators'>
  <h3>
@if($coord->table['taken'] == true)
  <span id="marca{{$coord->table['id']}}" class="label label-success">{{$coord->table['number']}}</span>
@else
  <span id="marca{{$coord->table['id']}}" class="label label-false">{{$coord->table['number']}}</span>
@endif
</h3>
</div>
</div>
</a>
@endforeach
</div>
<hr>
<div id="result">
</div>
</div>
</div>
</div>
<script>
$('#order').addClass("active");

function editar(idtable){
$('.label-success').css({'font-size':'75%','background':'#7EA568'}); 
$('.label-false').css({'font-size':'75%','background':'#F00'});
$('#marca'+idtable).css({'font-size':'130%','background':'#2980b9'});     
$.post("edi/"+ idtable, 
            function(data){
              $('#result').html("");
                if (data.success == false){
                  $('#result').load('http://localhost/restapp-api/public/index.php/orders/create/'+idtable);
                }
                else                  
              //$.each(data, function(i,order){                
                    $('#result').load('http://localhost/restapp-api/public/index.php/orders/edit/'+data['id']);
              //});
            });                         
}

</script>
@stop