@extends('layouts.master')

@section('content')
<h1> USUARIOS </h1>
<div id="mensaje" style="display:none;" class="alert alert-success">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    {{ HTML::image('images/ok.png') }}
    <div style="display:inline;" id="success_form"></div>
  </h4>
</div>
    <button value="" id="usuario" class="btn btn-primary" onclick="nuevoUsuario();"><i class="icon-plus"></i> Crear Usuario</button>

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
    {{ Form::open(array('url' => 'users/create', 'id'=>'form')) }}
    <input type="hidden" name="id_usuario" id="id_usuario" value="">
    <div class="form-group">
       {{ Form::label ('username', 'Nickname') }}
       {{ Form::text ('username', '', array('class'=>'form-control','placeholder'=>'nickname', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('firstname', 'Nombre real') }}
       {{ Form::text ('firstname', '', array('class'=>'form-control','placeholder'=>'nombre', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('lastname', 'Apellido') }}
       {{ Form::text ('lastname', '', array('class'=>'form-control','placeholder'=>'Apellido', 'autocomplete'=>'of')) }} 
     </div>
     <div class="form-group" id='logOculto'>
          {{ Form::label ('password', 'Contraseña') }}
          {{ Form::password ('password',array('class'=>'form-control','placeholder'=>'password', 'autocomplete'=>'of')) }}
      </div>
       <div class="modal-footer">
      <button type="button" onclick="guardarUsuario()" class="btn btn-primary">Guardar Usuario</button>     
      </div>
    {{ Form::close() }}  
      </div>
    </div>
  </div>
</div>
<div class="widget-content-white glossed">
    <div id="listadoUsuarios">
</div>
</div>
<script type="text/javascript">

mostrarUsuarios();
$('#user').addClass("active");

function eliminar(id){ 
confirmar = confirm("¿Estas seguro que quieres elimar el usuario?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("users/delete/"+ id, 
            function(data){
                if (data.success == true){
                  $('#mensaje').show();
                  $('#success_form').html(data.message);
                  mostrarUsuarios();
                }

            });  
} 
}

function cerrar(){
  $('#mensaje').hide();
}

function nuevoUsuario(){
   $('#myModal').modal(); 
   $('#form #logOculto').show();
   $('.errors_form').html("");
   $('.errors_form').removeClass( "alert alert-success" );
   $('#form')[0].reset();
   $('#form #id_usuario').val("");
   $('#myModalLabel').html('Nuevo Usuario');
}

function editarUsuario(id,username,firstname,lastname){
   $('#myModal').modal(); 
   $('.errors_form').html("");
   $('.errors_form').removeClass( "alert alert-success" );
   $('#myModalLabel').html('Editar Usuario');
   $('#form #id_usuario').val(id);   
   $('#form #username').val(username);
   $('#form #firstname').val(firstname);
   $('#form #lastname').val(lastname);
   $('#form #logOculto').hide();
}

function guardarUsuario(){

var form = $('#form');
var idusuario = $('#id_usuario').val();

if(idusuario == ""){
  var direccion = "http://localhost/restapp-api/public/index.php/users/create";
}else{
  direccion = "http://localhost/restapp-api/public/index.php/users/update/"+idusuario;
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
                                                
                        $('#myModal').modal('toggle');
                        mostrarUsuarios();
                    }
                  }
         });
}

function mostrarUsuarios(){
  
$.get("/restapp-api/public/index.php/users/listado", 
            function(data){
              $('#listadoUsuarios').html(data);                                  
              
            })
  }
</script>
@stop
