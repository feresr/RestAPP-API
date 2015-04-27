  <div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Username </th>
             <th> Apellido </th>
             <th> Nombre </th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $item)
             <tr>
                <td> {{ $item->username }} </td>
                <td> {{ $item->lastname }} </td>
                <td> {{ $item->firstname}} </td>
                <td><a href='javascript:editarUsuario({{$item->id}},"{{$item->username}}","{{$item->firstname}}","{{$item->lastname}}",{{$item->id_rol}})' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a> </td>
                <td> 
          <a href="javascript:eliminar({{$item->id}})" class="btn btn-danger btn-xs">
          <i class="icon-remove"></i></a>
</td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>