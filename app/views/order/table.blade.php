<div id="containment-wrapper">
@foreach($coords as $coord)
<a href="#">
<div id='draggable' value='{{$coord->table_id}}' onclick="editar({{ $coord->table_id}})" class="img-circle" style="left:{{$coord->x_pos}}px; top:{{$coord->y_pos}}px;">

{{HTML::image('images/table.png', "Imagen no encontrada", array('id' => 'back-'.$coord->table_id))}}
<div class='indicators'>
  <h3>
@if($coord->table['taken'] == true)
  <span id="marca{{$coord->table['id']}}" class="label label-success">{{$coord->table['number']}}</span>
@else
  <span id="marca{{$coord->table['id']}}" class="label label-false">{{$coord->table['number']}}</span>
@endif
</h3>
</div>
</div>
</a>
@endforeach
</div>