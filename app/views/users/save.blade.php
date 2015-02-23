@extends('layouts.master')

@section('content')
@section('head')
{{HTML::script('js/functions.js')}}
@stop
<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h1> Usuario </h1>
<div class='errors_form'></div>
    {{ Form::open(array('url' => 'users/create/' . $user->id, 'id'=>'form')) }}
    <input type="hidden" class="form-control" id= 'link' value='users'>
    <div class="form-group">
       {{ Form::label ('username', 'Nickname') }}
       {{ Form::text ('username', $user->username, array('class'=>'form-control','placeholder'=>'nickname', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('name', 'Nombre real') }}
       {{ Form::text ('firstname', $user->firstname, array('class'=>'form-control','placeholder'=>'nombre', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('lastname', 'Apellido') }}
       {{ Form::text ('lastname', $user->lastname, array('class'=>'form-control','placeholder'=>'Apellido', 'autocomplete'=>'of')) }} 
     </div> 
       @if($user->id)
          <!-- {{ Form::hidden ('_method', 'PUT') }} -->
       @else
       <div class="form-group">
          {{ Form::label ('password', 'Contraseña') }}
          {{ Form::password ('password',array('class'=>'form-control','placeholder'=>'password', 'autocomplete'=>'of')) }}
      </div>
       @endif
       {{ Form::submit('Guardar usuario',array('class'=>'btn btn-primary')) }}
       {{ link_to('users', 'Volver') }}
    {{ Form::close() }}
</div>
</div>
</div>
</div>
<div class="col-md-4">
{{ HTML::image('images/user.png', "Imagen no encontrada", array('id' => 'user')) }}
</div>
</div>
@stop