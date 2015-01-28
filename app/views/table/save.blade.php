<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h1> {{$title}} Mesa </h1>
<div id='errors_form'></div>
    {{ Form::open(array('url' => 'tables/create/' . $table->id, 'id'=>'form')) }}
    <input type="hidden" class="form-control" id= 'link' value='tables'>
    <div class="form-group">
       {{ Form::label ('number', 'Numero') }}
       {{ Form::text ('number', $table->number, array('class'=>'form-control','placeholder'=>'numero', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('quantity', 'Cantidad de personas') }}
       {{ Form::text ('seats', $table->seats, array('class'=>'form-control','placeholder'=>'cantidad de personas', 'autocomplete'=>'of')) }} 
     </div>
    <div class="form-group">
       {{ Form::label ('description', 'Descripcion') }}
       {{ Form::text ('description', $table->description, array('class'=>'form-control','placeholder'=>'Descripcion', 'autocomplete'=>'of')) }} 
     </div>
       {{ Form::submit('Guardar mesa',array('class'=>'btn btn-primary pull-right')) }}
       @if ($table->id != null)
       <a href="javascript:confirmar({{$table->id}})" class="btn btn-danger">Eliminar</a>
       @endif
       <a id="finish" class="btn btn-default">Cerrar</a>
    {{ Form::close() }}
</div>
</div>
</div>
</div>
<div class="col-md-2">
</div>
</div>
<script type="text/javascript">
var form = $('#form');
form.on('submit', function () {
  $.ajax({
           type: form.attr('method'),
           dataType: "json",
           url: form.attr('action'),
           data: form.serialize(),
           success: function (data)
                  {
                  if(data.success == false){
                        var errores = '';
                        for(datos in data.errors){
                         errores +=  data.errors[datos]+'<br>';
                        }
                        $('#errors_form').addClass("alert alert-danger");
                        $('#errors_form').html(errores);
                    }else{
                      $('#errors_form').removeClass("alert alert-danger");
                      $('#errors_form').addClass("alert alert-success");
                      $('#errors_form').html("Los cambios se guardaron correctamente correctamente");
                      //$("#new").html("");
                      if(data.create == true){
                        $(form)[0].reset();//limpiamos el formulario
                      }
                      //  location.href = "http://localhost/restapp-rest/public/index.php/tables";
                    }
                  }
         }); 
  return false;
});

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
} 
}

$("#finish").click(function(){
  $("#new").html("");
})
</script>