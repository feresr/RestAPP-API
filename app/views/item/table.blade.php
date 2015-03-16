<div class="panel-group" id="accordion">
@foreach($categories as $category)
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{$category->name}}">
          {{$category->name}}
        </a>
      </h4>
    </div>
    <div id="{{$category->name}}" class="panel-collapse collapse in">
      <div class="panel-body">
      <table class="table table-striped" style='table-layout:fixed';>
      <thead>
          <tr>
             <th> Codigo </th>
             <th width="150px"> Nombre </th>
             <th width="400px"> Descripcion</th>
             <th> Precio</th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($category->items as $item)
             <tr>
                <td> {{ $item->id }} </td>
                <td> {{ $item->name }} </td>
                <td> {{ $item->description }} </td>
                <td> <h4><span class="label label-success">$ {{$item->price}}</span></h4></td>
                <td> <a href='javascript:editarItem({{$item->id}},"{{$item->name}}",{{$item->price}},"{{$item->description}}","{{$category->id}}")' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a></td>
                <td><a href='javascript:eliminar({{$item->id}})' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
             </tr>
          @endforeach
          </tbody>
      </table>
      </div>
    </div>
  </div>
@endforeach
</div>