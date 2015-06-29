  <div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Usuario </th>
             <th> Apellido </th>
             <th> Nombre </th>
             <th> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $item)
             <tr>
                <td width="27%"> {{ $item->username }} </td>
                <td width="27%"> {{ $item->lastname }} </td>
                <td width="27%"> {{ $item->firstname}} </td>
                <td width="10%"><a href='javascript:editarUsuario({{$item->id}},"{{$item->username}}","{{$item->firstname}}","{{$item->lastname}}",{{$item->id_rol}})' class="btn btn-default btn-xs"><i class="icon-pencil"></i> editar</a> </td>
                <td width="9%"> 
          <a href="javascript:eliminar({{$item->id}})" class="btn btn-danger btn-xs">
          <i class="icon-remove"></i></a>
</td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>