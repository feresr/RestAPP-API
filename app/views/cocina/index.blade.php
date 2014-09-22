@extends('layouts.kitchen')
 
@section('content')
<h1> ORDENES </h1>
 <div class='errors_form'></div>
<div class="widget-content-white glossed" id="tableOrders">

</div>
<script type="text/javascript">
$(document).ready(function ()
{
$("#tableOrders").load('listOrders');
});
</script>
@stop