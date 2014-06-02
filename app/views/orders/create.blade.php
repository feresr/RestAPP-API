@extends('layouts.default');

<h1>CREATE ORDER</h1>

{{ Form::open(array('route' => 'api.v1.orders.store')) }}

	<ul>
			<li>
				{{ Form::label('table_id', 'TABLE ID:')}}
				{{ Form::text('table_id')}}
			</li>
			<li>
				{{ Form::submit()}}
			</li>
	</ul>	
{{Form::close()}}