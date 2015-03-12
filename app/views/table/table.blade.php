  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">

<div id="containment-wrapper">
@foreach($coords as $coord)
<a href="#">
<div id='draggable' value='{{$coord->table_id}}' onclick="editarMesa({{ $coord->table_id}})" class="img-circle" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">
{{ HTML::image('images/table.png') }}
@if($coord->table['taken'] == true)
  <div class='indicators'><h3>
    <span id="marca{{$coord->table_id}}" class="label label-false">{{$coord->table['number']}}</span></h3>
  </div>
@else
  <div class='indicators'><h3>
    <span id="marca{{$coord->table_id}}" class="label label-success">{{$coord->table['number']}}</span></h3>
  </div>
@endif
</div>
</a>
@endforeach
</div>

</div>
</div>
</div>