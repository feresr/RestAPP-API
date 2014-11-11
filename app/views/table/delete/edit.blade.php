@section('head')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <style>
  .draggable
  { 	
  height:110px;
	width:130px;
  position: absolute;
}
.label-false {
background-color: red;
}
  .draggable.active
  {   
  background-color: #2980b9;
  border-color: #2980b9;
}

  #containment-wrapper { 
  height:700px;
  position:relative;
  width:800px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
  </style>
@stop
<div id="containment-wrapper">
@foreach($coords as $coord)
<div id='table_select' value='{{$coord->table_id}}' onclick="editar({{ $coord->table_id}})" class="draggable" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">
{{ HTML::image('images/table.png') }}
@if($coord->table['taken'] == true)
  <div class='indicators'><h3><span class="label label-success">{{$coord->table['number']}}</span></h3>
  </div>
@else
  <div class='indicators'><h3><span class="label label-false">{{$coord->table['number']}}</span></h3>
  </div>
@endif
</div>
@endforeach
</div>