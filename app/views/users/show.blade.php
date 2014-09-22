@extends('layouts.master')
 
@section('sidebar')
     @parent
     Usuario
@stop
@section('content')
<h1> {{ $user->name }} </h1>
    <ul>
    	<li> Username: {{ $user->username }} </li>
       <li> Nombre de usuario: {{ $user->firstname }} </li>
       <li> Lastname: {{ $user->lastname }} </li>
    </ul>
    <p> {{ link_to('users', 'Volver atrás') }} </p>
@stop