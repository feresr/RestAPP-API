 <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<div id="containment-wrapper">
@foreach($coords as $coord)
<div id="draggable{{$coord->id}}" value="{{$coord->table_id}}" class="draggable" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;" >
{{ HTML::image('images/table.png') }}
@if($coord->table['taken'] == true)
  <div class='indicators indicatorsTable'><h3><span class="label label-false">{{$coord->table['number']}}</span></h3>
  </div>
@else
  <div class='indicators indicatorsTable'><h3><span class="label label-success">{{$coord->table['number']}}</span></h3>
  </div>
@endif
</div>
@endforeach
</div>
<hr>
<div id="create">
</div>
</div>
</div>
</div>