@extends('layouts.default');

<h1>LOG IN</h1>

{{ Form::open(array('route' => 'sessions.store')) }}

	<ul>
			<li>
				{{ Form::label('username', 'Username:')}}
				{{ Form::text('username')}}
			</li>
			<li>
				{{ Form::label('password','Password:')}}
				{{ Form::password('password')}}
			</li>
			<li>
				{{ Form::submit()}}
			</li>
	</ul>	
{{Form::close()}}