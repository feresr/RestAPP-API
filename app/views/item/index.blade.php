@extends('layouts.master')
 
@section('content')
<h1> ITEMS DEL MENU </h1>
<div id="mensaje" style="display:none;" class="alert alert-success">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    {{ HTML::image('images/ok.png') }}
    <div style="display:inline;" id="success_form"></div>
  </h4>
</div>
    <button value="" id="usuario" class="btn btn-primary" onclick="nuevoItem();"><i class="icon-plus"></i> Crear Item</button>

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
    {{ Form::open(array('url' => 'items/create/', 'id'=>'form')) }}
    <input type="hidden" name="id_item" id="id_item" value="">
    <div class="form-group">
       {{ Form::label ('name', 'nombre') }}
       {{ Form::text ('name', '', array('class'=>'form-control','placeholder'=>'Nombre', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('description', 'Descripcion') }}
       {{ Form::text ('description', '', array('class'=>'form-control','placeholder'=>'Descripcion', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
        {{ Form::label ('price', 'Precio') }}
        {{ Form::text ('price','',array('class'=>'form-control','placeholder'=>'Precio', 'autocomplete'=>'of')) }}
     </div>
     <div class="form-group">
      {{ Form::label ('itemcategory', 'Categoria') }}<br>
      <div id="categorias">
      </div>
    </div>
       <div class="modal-footer">
      <button type="button" onclick="guardarItem()" class="btn btn-primary">Guardar Item</button>     
      </div>
    {{ Form::close() }}  
      </div>
    </div>
  </div>
</div>
<br>
<div class="widget-content-white glossed">
    <div id="listadoItems">
</div>
</div>

<script type="text/javascript">
$(document).ready(function ()
{
$('#item').addClass("active");
mostrarItems();
});

function mostrarItems(){
  
$.get("/restapp-api/public/index.php/items/listado", 
            function(data){
              $('#listadoItems').html(data);                                  
              
            })
  }

function cerrar(){
  $('#mensaje').hide();
}

function nuevoItem(){
   $('#myModal').modal(); 
   $('.errors_form').html("");
   $('.errors_form').removeClass( "alert alert-success" );
   $('#form')[0].reset();
   $('#form #id_item').val("");
   $('#myModalLabel').html('Nuevo Item');
   $('#categorias').load('items/categorias/null');
}

function editarItem(id,name,price,description,category){
   $('#myModal').modal(); 
   $('.errors_form').html("");
   $('.errors_form').removeClass( "alert alert-success" );

   $('#myModalLabel').html('Editar Item');
   $('#form #id_item').val(id);   
   $('#form #name').val(name);
   $('#form #price').val(price);
   $('#form #description').val(description);
   $('#categorias').load('items/categorias/'+category);
   $('#form #category_id').val(category);
}

function guardarItem(){

var form = $('#form');
var iditem = $('#id_item').val();

if(iditem == ""){
  var direccion = "http://localhost/restapp-api/public/index.php/items/create";
}else{
  direccion = "http://localhost/restapp-api/public/index.php/items/create/"+iditem;
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
                        mostrarItems();
                    }
                  }
         });
}

function confirmar(id){ 
confirmar=confirm("¿Estas seguro que quieres elimar el item del menu?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("items/delete/"+ id, 
            function(data){
                if (data.success == true){
                  alert(data.message);
                  location.href = "http://localhost/restapp-api/public/index.php/items";
                }

            });  
} 
}
</script>
@stop
