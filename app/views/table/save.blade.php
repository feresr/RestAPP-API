<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h1> Mesas </h1>
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
       {{ Form::submit('Guardar mesa',array('class'=>'btn btn-success')) }}
       {{ link_to('tables', 'Cancelar') }}
    {{ Form::close() }}
</div>
</div>
</div>
</div>
<div class="col-md-4">
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
                          location.href = "http://localhost/restapp-rest/public/index.php/tables";
                    }
                  }
         }); 
  return false;
});
</script>