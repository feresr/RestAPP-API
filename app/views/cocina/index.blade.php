@extends('layouts.kitchen')
 
@section('content')
<h1> ORDENES </h1>
 <div id='mensaje'></div>
<div class="widget-content-white glossed" id="tableOrders">

</div>
<script type="text/javascript">
$(document).ready(function ()
{
$("#tableOrders").load('listOrders');
});
</script>
@stop