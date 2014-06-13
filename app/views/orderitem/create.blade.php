@extends('layouts.default');

<h1>CREATE ORDER ITEM</h1>

{{ Form::open(array('route' => 'api.v1.orderItems.store')) }}

	<ul>
			<li>
				{{ Form::label('order_id', 'ORDER ID:')}}
				{{ Form::text('order_id')}}
			</li>
			<li>
				{{ Form::label('item_id', 'ITEM ID:')}}
				{{ Form::text('item_id')}}
			</li>
			<li>
				{{ Form::label('quantity', 'quantity:')}}
				{{ Form::text('quantity')}}
			</li>
			<li>
				{{ Form::submit()}}
			</li>
	</ul>	
{{Form::close()}}