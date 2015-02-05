<div style="background-color:#eeeeee; color:#333333;">
<div class="padded">
  <table class="table table-striped">
      <thead>
      <tr style="background-color:#FFBB33;">
         <th> Fecha </th>
         <th> Nombre </th>
         <th> Cantidad de personas </th>
         <th colspan="2"></th>
      </tr>
      </thead>
      <tbody>
      @foreach($reservas as $reserva)
         <tr>
            <td> {{ $reserva->fecha }} </td>
            <td> {{ $reserva->name }} </td>
            <td> {{ $reserva->cantidad }} </td>
            <td> <a href = 'javascript:editarReserva({{$reserva->id}},"{{$reserva->name}}","{{$reserva->fecha}}",{{$reserva->cantidad}})' class="btn btn-default btn-xs"></i>editar</a> </td>
            <td><a href='javascript:confirmarDelete({{$reserva->id}},"{{$reserva->name}}",{{$reserva->id_facebook}})' class="btn btn-danger btn-xs">eliminar</a></td>
         </tr>
      @endforeach
      </tbody>
  </table>
</div>
</div>