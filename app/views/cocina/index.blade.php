@extends('layouts.kitchen')
 
@section('content')
<h1> ORDENES </h1>
<div id="mensaje" style="display:none;" class="alert alert-success">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    {{ HTML::image('images/ok.png') }}
    <div style="display:inline;" id="success_form"></div>
  </h4>
</div>

<div class="widget-content-white glossed" id="tableOrders">

</div>
<script type="text/javascript">
$(document).ready(function ()
{
$("#tableOrders").load('listOrders');
});

function cerrar(){
  $('#mensaje').hide();
}
</script>
@stop