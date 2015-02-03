 @extends('layouts.layout')
@section('formReserva')
 <div class='errors_form'></div>
{{ Form::open(array('url' => 'reservasFace/create/'.$reserva->id, 'id' => 'form')) }}
<input type="hidden" name="id_facebook" id="id_facebook">
    <div class="form-group">
       <label style="color:black;" for="exampleInputPassword1">Fecha</label>
       <input class="form-control" placeholder="Fecha" autocomplete="of" name="fecha" type="date" value="{{$reserva->date}}" id="fecha">
    </div>
    <div class="form-group">
       <label style="color:black;">Nombre</label>
       {{ Form::text ('name', $reserva->name, array('class'=>'form-control','placeholder'=>'Nombre', 'id'=>'name')) }} 
     </div> 
       <div class="form-group">
       <label style="color:black;">Cantidad de Personas</label>
       {{ Form::text ('cantpersons', $reserva->cantpersons, array('class'=>'form-control','placeholder'=>'Cantidad de personas', 'autocomplete'=>'of')) }} 
     </div>
      <br>
      <div class="modal-footer">
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      {{ Form::submit('Guardar reserva',array('class'=>'btn btn-primary')) }}       
      </div>
{{ Form::close() }}    
@stop