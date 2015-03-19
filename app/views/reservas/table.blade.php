<div class="padded">
          <table class="table table-striped table-bordered table-hover datatable">
          <thead>
          <tr>
             <th> Fecha </th>
             <th> Nombre </th>
             <th> Cantidad de personas </th>
          </tr>
          </thead>
          <tbody>
          @foreach($reservas as $reserva)
             <tr>
                <td> {{ $reserva->date }} </td>
                <td> {{ $reserva->name }} </td>
                <td> {{ $reserva->cantpersons }} </td>
                <td> <a href = 'javascript:editarReserva({{$reserva->id}},"{{$reserva->name}}","{{$reserva->date}}",{{$reserva->cantpersons}})' class="btn btn-default btn-xs"><i class="icon-pencil"></i>edit</a> </td>
                <td><a href='javascript:eliminar({{$reserva->id}})' class="btn btn-danger btn-xs"><i class="icon-remove"></i></a></td>
             </tr>
          @endforeach
          </tbody>
       </table>
</div>