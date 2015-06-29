<div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Nombre </th>
             <th> Descripcion </th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($categories as $category)
             <tr id='fila_{{$category->id}}'>
                <td> {{ $category->name }} </td>
                <td> {{ $category->description }} </td>
                <td> <a href='javascript:editarCategoria({{$category->id}},"{{$category->name}}","{{$category->description}}")' class="btn btn-default btn-xs"><i class="icon-pencil"></i> editar</a> </td>
                <td><a href='javascript:eliminar({{$category->id}})' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>