@extends('layouts.master')

@section('content')

<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
      <h1> Item de Menu </h1>
      <div class='errors_form'></div>
    {{ Form::open(array('url' => 'item/create/' . $itemmenu->id,'class'=>'form-horizontal', 'id'=>'form')) }}
    <div class="form-group">
       {{ Form::label ('name', 'Nombre') }}
       {{ Form::text ('name', $itemmenu->name, array('class'=>'form-control','placeholder'=>'nombre', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('description', 'Descripcion') }}
       {{ Form::text ('description', $itemmenu->description, array('class'=>'form-control','placeholder'=>'Descripcion', 'autocomplete'=>'of')) }} 
     </div> 
       <div class="form-group">
          {{ Form::label ('price', 'Precio') }}
          {{ Form::text ('price',$itemmenu->price,array('class'=>'form-control','placeholder'=>'Precio', 'autocomplete'=>'of')) }}
      </div>
       <input type="hidden" class="form-control" id= 'category_id' name="category_id" value='{{$itemcategory->id}}'>
       {{ Form::submit('Guardar item',array('class'=>'btn btn-success')) }}
       {{ link_to('items', 'Cancelar') }}
    {{ Form::close() }}
  </div>
</div>
</div>
</div>
<div class="col-md-4">
  <br>
{{ HTML::image('images/menu-icon.png', "Imagen no encontrada", array('id' => 'principito')) }}
</div>
</div>
<script type="text/javascript">

$(document).ready(function ()
{
var form = $('#form');
form.bind('submit', function () {
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
                        $('.errors_form').removeClass( "alert alert-danger error" )
                        $('.errors_form').addClass( "alert alert-success" );
                        $('.errors_form').html("Se agrego el item correctamente");                        
                    }
                  }
         }); 
  return false;
});
});
</script>
@stop