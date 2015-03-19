@extends('layouts.master')
 
@section('content')
<h1> CATEGORIAS DEL MENU </h1>
<div id="mensaje" style="display:none;" class="alert alert-success">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    {{ HTML::image('images/ok.png') }}
    <div style="display:inline;" id="success_form"></div>
  </h4>
</div>
<button value="" id="reserva" class="btn btn-primary" onclick="nuevaCategoria();"><i class="icon-plus"></i> Crear Categoria</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="color:black;" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">    
        <div class='errors_form'></div>
    {{ Form::open(array('url' => 'categorias/create', 'id'=>'form')) }}
    <input type="hidden" name="id_categoria" id="id_categoria" value="">
    <div class="form-group">
       {{ Form::label ('name', 'Nombre') }}
       {{ Form::text ('name', '', array('class'=>'form-control','placeholder'=>'nombre', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('description', 'Descripcion') }}
       {{ Form::text ('description', '', array('class'=>'form-control','placeholder'=>'Descripcion', 'autocomplete'=>'of')) }} 
     </div> 
       <div class="modal-footer">
      <button type="button" onclick="guardarCategoria()" class="btn btn-primary">Guardar Categoria</button>     
      </div>
    {{ Form::close() }}   
      </div>
    </div>
  </div>
</div>

<div class="widget-content-white glossed">
    <div id="listadoCategorias">

</div>
</div>

<script type="text/javascript">
$(document).ready(function ()
{
  mostrarCategorias();
$('#cat').addClass("active");
});

function eliminar(id){
confirmar=confirm("¿Estas seguro que quieres elimar la categoria?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("categorias/delete/"+ id, 
            function(data){
                if (data.success == true){
                  $('#mensaje').show();
                  $('#success_form').html(data.message);
                  mostrarCategorias();
                }

            });  
} 
}

function cerrar(){
  $('#mensaje').hide();
}

function nuevaCategoria(){
   $('#myModal').modal(); 
   $('.errors_form').html("");
   $('.errors_form').removeClass( "alert alert-success" );
   $('#form')[0].reset();
   $('#form #id_categoria').val("");
   $('#myModalLabel').html('Nueva Categoria');
}

function editarCategoria(id,name,description){
   $('#myModal').modal(); 
   $('.errors_form_reservas').html("");
   $('.errors_form_reservas').removeClass( "alert alert-success" );
   $('#myModalLabel').html('Editar Categoria');
   $('#form #name').val(name);
   $('#form #description').val(description);
   $('#form #id_categoria').val(id);
}

function guardarCategoria(){

var form = $('#form');
var idcategoria = $('#id_categoria').val();

if(idcategoria == ""){
  var direccion = "http://localhost/restapp-api/public/index.php/categorias/create";
}else{
  direccion = "http://localhost/restapp-api/public/index.php/categorias/create/"+idcategoria;
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
                        $('.errors_form').addClass( "alert alert-danger error" );
                        $('.errors_form').html(errores);
                    }else{                 
                        $('#mensaje').show();
                        $('#success_form').html(data.message);                        
                                                                       
                        $('#form #id_categoria').val("");                        
                        $('#myModal').modal('toggle');
                        mostrarCategorias();
                    }
                  }
         });
}

function mostrarCategorias(){
  
$.get("/restapp-api/public/index.php/categorias/listado", 
            function(data){
              $('#listadoCategorias').html(data);
                                                
              
            })
  }
</script>
@stop
