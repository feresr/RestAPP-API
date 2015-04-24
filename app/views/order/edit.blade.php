<h3>Modifique los datos de la orden</h1>
<div class="jumbotron">
<div id='errors_form'></div>
<div class="row">
{{ Form::open(array('url' => 'orders/create/' . $order->id, 'id'=>'form_edit')) }}
<div class="col-lg-4">
{{ Form::label ('ordertable', 'Mesa') }}
<select class="form-control" id="table_id" name="table_id">
@foreach($tables as $table)
@if($table->id == $order->table_id)
<option value="{{$table->id}}" selected>Mesa #{{$table->number}} - Seats: {{$table->seats}}</option>
@else
@if($table->taken == 'true')
<option value="{{$table->id}}">Mesa #{{$table->number}} Seats: {{$table->seats}}</option>
@endif
@endif
@endforeach
</select>
</div>
<div class="col-lg-5">
{{ Form::label ('orderuser', 'Mozo') }}<br>
<select class="form-control" id="user_id" name="user_id">
  @foreach($users as $user)
  @if($user->id == $order->user_id)
  <option value="{{$user->id}}" selected>{{$user->firstname}} - {{$user->lastname}}</option>
  @else
  <option value="{{$user->id}}">{{$user->firstname}} - {{$user->lastname}}</option>
  @endif  
  @endforeach
</select>
</div>
<div class="col-lg-3">
  <br>
  {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
</div>
{{ Form::close() }}
</div>
</div>
@if($order->active==true)
<h3>Seleccione los items que desea agregar</h1>
  <div class="jumbotron">
  <div class="row">
  {{ Form::open(array('url' => 'orders/edit', 'id' => 'formulario_busqueda')) }}
  <input type="hidden" class="form-control" id= 'order_id' name="order_id" value='{{$order->id}}'>
  <div class="col-lg-6">
    <select class="chosen-select" id="item_id" name="item_id" data-placeholder="Seleccione El item">
    <option value=""></option>
    @foreach($categories as $category)
    <optgroup label="{{$category->name}}">
    @foreach($category->items as $item)
      <option value="{{$item->id}}">{{$item->name}} Precio: ${{$item->price}}</option>
    @endforeach
    </optgroup>
    @endforeach
  </select>
  </div>
    <div class="col-lg-3">
   <input class="form-control" style="margin-top: 6px; height:36px;" placeholder="cantidad" autocomplete="of" name="quantity" type="text" id="quantity">
  </div>
  <div class="col-lg-3">
  {{ Form::submit('Agregar',array('class'=>'btn btn-primary')) }}
  </div>
  {{ Form::close() }}
</div>
<div class='row'>
    <!--en este los errores del formulario--> 
<div id="mensaje" style="display:none;" class="alert alert-danger">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    <div id="success_form"></div>
  </h4>
</div>
</div>
</div>
@else
<input type="hidden" class="form-control" id= 'order_id' name="order_id" value='{{$order->id}}'>
  <div class="alert alert-danger">No puede editar esta orden, Ya fue cobrada!</div>
@endif
<div id="tabla">
</div>
<a id="finish" href="#">Ocultar</a>
<a href="javascript:eliminarOrden({{$order->id}})" style="float:right;" class="btn btn-danger">Cerrar Orden!</a>

<script type="text/javascript">

function cerrar(){
  $('#mensaje').hide();
}

$(document).ready(function ()
{
$(".chosen-select").chosen({no_results_text:'No hay resultados para '});
var id=$("#order_id").val();
$("#tabla").load('list/'+id);

var form = $('#formulario_busqueda');
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
                        for(datos in data.message){
                            errores +=  data.message[datos]+'<br>';
                        }
                        $('#mensaje').show();
                        $('#success_form').html(errores);                        
                    }else{
                        $(form)[0].reset();//limpiamos el formulario 
                        $('#mensaje').hide();                       
                        $("#tabla").load('list/'+id);
                    }
                  }
         }); 
  return false;
});


var form_edit = $('#form_edit');
form_edit.on('submit', function () {
  $.ajax({
           type: form_edit.attr('method'),
           dataType: "json",
           url: form_edit.attr('action'),
           data: form_edit.serialize(),
           success: function (data)
                  {
                  if(data.success == false){
                        var errores = '';
                        for(datos in data.message){
                            errores +=  data.message[datos]+'<br>';
                        }
                        $('#errors_form').addClass("alert alert-danger");
                        $('#errors_form').html(errores);
                    }else{
                        $('#errors_form').removeClass("alert alert-danger");
                        mensaje = "Los datos de la orden se modificaron correctamente";
                        $('#errors_form').addClass("alert alert-success");
                        $('#errors_form').html(mensaje);
                        $("#tabla").load('list/'+id);
                    }
                  }
         }); 
  return false;
});
});

function eliminarOrden(id){ 
confirmar=confirm("¿Estas seguro que quieres Finalizar la orden?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("orders/delete/"+ id, 
            function(data){
                if (data.success == true){
                  $('#mensaje').show();
                  $('#success_form').html(data.message);
                  $("#resultado").html("");
                  mostrarOrdenes();
                }

            });  
} 
}

$("#finish").click(function(){
  $("#resultado").html("");
});
</script>