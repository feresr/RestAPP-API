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
                <td><a href='users/{{$item->id}}/edit' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a> </td>
                <td> 
          <a href="javascript:confirmar({{$item->id}})" class="btn btn-danger btn-xs">
          <i class="icon-remove"></i></a>
</td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>