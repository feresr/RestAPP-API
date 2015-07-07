@extends('layouts.layoutLogin')
 
@section('content')
<div class="all-wrapper no-menu-wrapper">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">

      <div class="content-wrapper bold-shadow">
        <div class="content-inner">
          <div class="main-content main-content-grey-gradient no-page-header">
<div class='errors_form'></div>
    {{ Form::open(array('url' => '/login', 'id'=>'form', 'autocomplete'=>'of')) }} 
    <h3 class="form-title form-title-first"><i class="icon-lock"></i> Inicio de sesion</h3>
    <div class="form-group">
       {{ Form::label('name', 'Usuario') }}
       {{ Form::text('username', '',array('class'=>'form-control','placeholder'=>'username', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label('password', 'Contraseña') }}
       <input class="form-control" placeholder="Password" autocomplete="of" name="password" type="password" value="" id="password">
    </div>
       {{ Form::submit('Log me',array('class'=>'btn btn-primary')) }} 
       <a href="/" class="btn btn-link">Cancel</a>
    {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop