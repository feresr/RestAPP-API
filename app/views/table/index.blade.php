@extends('layouts.master')
 
@section('content')
@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
@stop

<h2>MESAS</h2>
<div id="mensaje" style="display:none;" class="alert alert-success">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    {{ HTML::image('images/ok.png') }}
    <div style="display:inline;" id="success_form"></div>
  </h4>
</div>
<div class="btn-group">
<button value="" id="usuario" class="btn btn-primary" onclick="nuevaMesa();"><i class="icon-plus"></i> Crear Mesa New</button>
<a href="#new" id="save" class="btn btn-primary"><i class="icon-plus"></i> Crear mesa</a>
<a href="tables/edit" class="btn btn-primary"><i class="icon-pencil"></i> Editar posicion</a>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="color:black;" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">    

      </div>
    </div>
  </div>
</div>
<div id="listadoMesas">
</div>
<script>

mostrarMesas();
$('#table').addClass("active");

function mostrarMesas(){
  
$.get("/restapp-api/public/index.php/tables/listado", 
            function(data){
              $('#listadoMesas').html(data);                                  
              
            })
  }

function cerrar(){
  $('#mensaje').hide();
}

function nuevaMesa(){
   $('#myModal').modal(); 
   $('.errors_form').html("");
   $('.errors_form').removeClass( "alert alert-success" );   
   $('.modal-body').load('tables/create', function(){ 
            $('#delete').hide();
            $('#form')[0].reset();           
            $('#myModalLabel').html('Nueva Mesa');            
        });
   $('#form #id_table').val("");
   
}

function editarMesa(idtable){
  $('.label-success').css({'font-size':'75%','background':'#7EA568'}); 
  $('.label-false').css({'font-size':'75%','background':'#F00'});
  $('#marca'+idtable).css({'font-size':'130%','background':'#2980b9'});

 $('#myModal').modal(); 
 $('.errors_form_reservas').html("");
 $('.errors_form_reservas').removeClass( "alert alert-success" );
 $('.modal-body').load('tables/edit/'+ idtable, function(){                       
            $('#myModalLabel').html('Editar Mesa');
            $('#delete').show();
        });
}

function guardarMesa(){

var form = $('#form');
var idtable = $('#id_table').val();

if(idtable == ""){
  var direccion = "http://localhost/restapp-api/public/index.php/tables/create";
}else{
  direccion = "http://localhost/restapp-api/public/index.php/tables/create/"+idtable;
}

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
                        $('#errors_form').addClass( "alert alert-danger error" );
                        $('#errors_form').html(errores);
                    }else{                 
                        $('#mensaje').show();
                        $('#success_form').html(data.message);                                                              
                                               
                        $('#myModal').modal('toggle');
                        mostrarMesas();
                    }
                  }
         });
}

function confirmar(id){ 
confirmar=confirm("¿Estas seguro que quieres elimar la mesa?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("tables/delete/"+ id, 
            function(data){
                if (data.success == true){
                  alert('La mesa se elimino correctamente!');
                  location.href = "http://localhost/restapp-api/public/index.php/tables";
                }

            });  
}} 
</script>
@stop