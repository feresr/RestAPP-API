@extends('layouts.layout')
@section('content')
<div class='errors_form'></div>
  {{ Form::open(array('url' => '/', 'id' => 'form', 'class' => 'form-horizontal')) }}
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
      {{ Form::email ('email', $consulta->email, array('class'=>'form-control','placeholder'=>'Email', 'autocomplete'=>'of')) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Consulta</label>
    <div class="col-sm-8">
      {{ Form::textarea ('consulta', $consulta->consulta, array('class'=>'form-control','placeholder'=>'Consulta', 'autocomplete'=>'of')) }}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      {{ Form::submit('Enviar',array('class'=>'btn btn-success')) }}
    </div>
  </div>
{{ Form::close() }}
<script type="text/javascript">
$(document).ready(function ()
{
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
                            errores += data.errors[datos] + '<br>';
                        }
                        $('.errors_form').addClass( "alert alert-danger error" );
                        $('.errors_form').html(errores);
                    }else{
                        $(form)[0].reset();//limpiamos el formulario
                        $('.errors_form').removeClass( "alert alert-danger error" );
                        $('.errors_form').addClass( "alert alert-success" );
                        $('.errors_form').html("La consulta fue enviada correctamente");
                    }
                  }
         }); 
  return false;
});
});
</script>
@stop