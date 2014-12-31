<h3>No existe orden en la mesa</h1>
	<p>Seleccione un mozo para crear la orden en la mesa seleccionada</p>
<div class="jumbotron">
<div id='errors_form'></div>
<div class="row">
{{ Form::open(array('url' => 'orders/create/' . $order->id)) }}
<div class="col-lg-4">
{{ Form::label ('ordertable', 'Mesa') }}
<input type="hidden" class="form-control" id="table_id" name="table_id" value='{{$table->id}}'>
<div id='table_select'>
{{ HTML::image('images/table.png') }}
  <div class='indicators'><h3><span class="label label-success">{{$table->number}}</span></h3>
  </div>
</div>
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
	<br>
  {{ Form::submit('Crear',array('class'=>'btn btn-primary')) }}
</div>
{{ Form::close() }}
</div>
</div>