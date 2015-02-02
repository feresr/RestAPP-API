<div style="background-color:black;">
<div class="padded">
  <table class="table table-bordered">
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
            <td> {{ $reserva->fecha }} </td>
            <td> {{ $reserva->name }} </td>
            <td> {{ $reserva->cantidad }} </td>
            <td> <a href = 'reservas/{{$reserva->id}}/edit' class="btn btn-default btn-xs"><i class="icon-pencil"></i>editar</a> </td>
            <td><a href='javascript:confirmar({{$reserva->id}})' class="btn btn-danger btn-xs">eliminar</a></td>
         </tr>
      @endforeach
      </tbody>
  </table>
</div>
</div>