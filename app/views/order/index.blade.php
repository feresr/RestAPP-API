@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
{{HTML::script('js/chosen.jquery.js')}}
@stop

<h2>ORDENES</h2>
<div id="mensaje" style="display:none;" class="alert alert-success">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    {{ HTML::image('images/ok.png') }}
    <div style="display:inline;" id="success_form"></div>
  </h4>
</div>
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="color:black;" id="myModalLabel">No existe orden en la mesa</h4>
        
      </div>
<div class="modal-body">    
        <div class='errors_form'></div>
    <div id="result">
</div>
    </div>
  </div>
</div>
</div>

<div class="modal fade bs-example-modal-lg" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 900px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="color:black;" id="myModalLabel">Modifique los datos de la orden</h4>
        
      </div>
<div class="modal-body">    
        <div class='errors_form'></div>
    <div id="results">
</div>
    </div>
  </div>
</div>
</div>
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<div id="listadoOrdenes">

</div>
<hr>
    <div id="resultado">
</div>
</div>
</div>
<script>

$('#order').addClass("active");
mostrarOrdenes();

function mostrarOrdenes(){
  
$.get("/restapp-api/public/index.php/orders/listado", 
            function(data){
              $('#listadoOrdenes').html(data);           
            })
  }

function guardarOrden(){

var form = $('#form');

var direccion = "http://localhost/restapp-api/public/index.php/orders/create";

  $.ajax({
           type: 'POST',
           dataType: "json",
           url: direccion,
           data: form.serialize(),
           success: function (data)
                  {
                  if(data.success == false){
                        var errores = '';
                        for(datos in data.errors){
                            errores += data.errors[datos] + '<br>';
                        }
                        $('.errors_form').addClass( "alert alert-danger error" );
                        $('.errors_form').html(errores);
                    }else{                 
                        $('#mensaje').show();
                        $('#success_form').html(data.message);                                                     
                                                
                        $('#myModal').modal('toggle');
                        $('#miModal').modal();
                        $('#results').load('http://localhost/restapp-api/public/index.php/orders/edit/'+data['id']);
                        mostrarOrdenes();
                    }
                  }
         });
}

function editar(idtable){
$('.label-success').css({'font-size':'75%','background':'#7EA568'}); 
$('.label-false').css({'font-size':'75%','background':'#F00'});
$('#marca'+idtable).css({'font-size':'130%','background':'#2980b9'});     
$.post("edi/"+ idtable, 
            function(data){
              $('#resultado').html("");
                if (data.success == false){
                  $('#myModal').modal();
                  $('#result').load('http://localhost/restapp-api/public/index.php/orders/create/'+idtable);
                }
                else{
                  $('#results').html("");                
                  $('#miModal').modal();
                  $('#results').load('http://localhost/restapp-api/public/index.php/orders/edit/'+data['id']);
              }
            });                         
}

</script>
@stop