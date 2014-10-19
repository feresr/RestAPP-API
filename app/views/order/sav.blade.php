<h3>No existe orden en la mesa</h1>
	<p>Seleccione un mozo y una mesa para crear una orden</p>
<div class="jumbotron">
<div id='errors_form'></div>
<div class="row">
{{ Form::open(array('url' => 'orders/crear/' . $order->id)) }}
<div class="col-lg-4">
{{ Form::label ('ordertable', 'Mesa') }}
<input type="hidden" class="form-control" id="table_id" name="table_id" value='{{$table->id}}'>
<h3><span class="badge">{{$table->number}}</span></h3>

</div>
<div class="col-lg-5">
{{ Form::label ('orderuser', 'Mozo') }}<br>
<select class="form-control" id="user_id" name="user_id">
  @foreach($users as $user)
  <option value="{{$user->id}}">{{$user->firstname}} - {{$user->lastname}}</option> 
  @endforeach
</select>
</div>
<div class="col-lg-3">
  {{ Form::submit('Guardar cambios',array('class'=>'btn btn-primary')) }}
</div>
{{ Form::close() }}
</div>
</div>