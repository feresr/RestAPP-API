@extends('layouts.master')
@section('head')
{{HTML::script('js/bootstrap-datetimepicker.min.js')}}
{{HTML::script('js/bootstrap-datetimepicker.es.js')}}
{{HTML::style('css/bootstrap-datetimepicker.min.css')}}
@stop
@section('content')

<h1> RESERVAS </h1>
<div id="mensaje" style="display:none;" class="alert alert-success">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    {{ HTML::image('images/ok.png') }}
    <div style="display:inline;" id="success_form"></div>
  </h4>
</div>
<button value="" id="reserva" class="btn btn-primary" onclick="nuevaReserva();"><i class="icon-plus"></i> Crear Reserva</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="color:black;" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">    
        <div class='errors_form_reservas'></div>
{{ Form::open(array('url' => 'reservas/create', 'id' => 'formReserva')) }}
<input type="hidden" name="id_reserva" id="id_reserva" value="">
    <div class="form-group">
       <label style="color:black;" for="exampleInputPassword1">Fecha</label>
       <!-- <input class="form-control" placeholder="Fecha" autocomplete="of" name="date" type="date" value="" id="date">
    </div>
    <div class="form-group">-->
                <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii p" data-link-field="date">
                    <input class="form-control" size="16" type="text" id="fechaRes" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
        <input type="hidden" id="date" name="date" value="" />
            </div>
    <div class="form-group">
       <label style="color:black;">Nombre</label>
       {{ Form::text ('name', '', array('class'=>'form-control','placeholder'=>'Nombre', 'id'=>'name')) }} 
     </div> 
       <div class="form-group">
       <label style="color:black;">Cantidad de Personas</label>
       {{ Form::text ('cantpersons', '', array('class'=>'form-control','placeholder'=>'Cantidad de personas', 'id'=>'cantidad')) }} 
     </div>
      <br>
      <div class="modal-footer">
      <button type="button" onclick="guardarReserva()" class="btn btn-primary">Guardar Reserva</button>     
      </div>
{{ Form::close() }}    
      </div>
    </div>
  </div>
</div>

<div class='errors_form'></div>
<div class="widget-content-white glossed">
<div id="listadoReservas">

</div>
</div>
<script type="text/javascript">

$('.form_datetime').datetimepicker({
    language:  'es',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
    });

$(document).ready(function ()
{
mostrarReservas();
$('#res').addClass("active");
});

function eliminar(id){ 
confirmar=confirm("¿Estas seguro que quieres elimar la reserva?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("reservas/delete/"+ id, 
            function(data){
                if (data.success == true){
                  $('#mensaje').show();
                  $('#success_form').html(data.message);
                  mostrarReservas();
                }

            });  
} 
}

function cerrar(){
  $('#mensaje').hide();
}

function nuevaReserva(){
   $('#myModal').modal(); 
   $('.errors_form_reservas').html("");
   $('.errors_form_reservas').removeClass( "alert alert-success" );
   $('#formReserva')[0].reset();
   $('#formReserva #id_reserva').val("");
   $('#myModalLabel').html('Nueva Reserva');
}

function editarReserva(id,name,fecha,cantidad){
  var meses = new Array ("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var fechaYhora = fecha.split(" ");
  var fechaSp = fechaYhora[0].split("-");
  var horaSp = fechaYhora[1].split(":");
  var f = new Date(fechaSp[0],fechaSp[1],fechaSp[2],horaSp[0],horaSp[1],horaSp[2]);
  var fechaReserva = f.getDate() +" "+ meses[f.getMonth()] + " "+f.getFullYear()+" - "+f.getHours()+":"+f.getMinutes();

   $('#myModal').modal(); 
   $('.errors_form_reservas').html("");
   $('.errors_form_reservas').removeClass( "alert alert-success" );
   $('#myModalLabel').html('Editar Reserva');
   $('#formReserva #name').val(name);
   $('#formReserva #fechaRes').val(fechaReserva);
   $('#formReserva #date').val(fecha);
   $('#formReserva #cantidad').val(cantidad);
   $('#formReserva #id_reserva').val(id);
}

function guardarReserva(){

var form = $('#formReserva');
var idreserva = $('#id_reserva').val();

if(idreserva == ""){
  var direccion = "http://localhost/restapp-api/public/index.php/reservas/create";
}else{
  direccion = "http://localhost/restapp-api/public/index.php/reservas/create/"+idreserva;
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
                        $('.errors_form_reservas').addClass( "alert alert-danger error" );
                        $('.errors_form_reservas').html(errores);
                    }else{                        
                        //$('.errors_form_reservas').removeClass( "alert alert-danger error" );
                        $('#mensaje').show();
                        $('#success_form').html(data.message);                        
                                                                        
                        $('#formReserva #id_reserva').val("");                        
                        $('#myModal').modal('toggle');
                        mostrarReservas();
                    }
                  }
         });
}

function mostrarReservas(){
  
$.get("/restapp-api/public/index.php/reservas/mostrarReservas", 
            function(data){
              $('#listadoReservas').html(data);
                                                
              
            })
  }

</script>
@stop
