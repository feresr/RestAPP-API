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
            <td> <a href = 'javascript:editarReserva({{$reserva->id}},"{{$reserva->name}}","{{$reserva->fecha}}",{{$reserva->cantidad}})' class="btn btn-default btn-xs"></i>editar</a> </td>
            <td><a href='javascript:confirmarDelete({{$reserva->id}},"{{$reserva->name}}",{{$reserva->id_facebook}})' class="btn btn-danger btn-xs">eliminar</a></td>
         </tr>
      @endforeach
      </tbody>
  </table>
</div>
</div>

<script type="text/javascript">

function confirmarDelete(id,name,idface){ 
confirmar=confirm("¿Estas seguro que quieres elimar la Reserva?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("index.php/reservasFace/delete/"+ id, 
            function(data){
                if (data.success == true){
                  alert(data.message);
                  mostrarReservas(name, idface);
                  //location.href = "http://localhost/restapp-api/public/index.php/tables";
                }

            });  
} 
}

function editarReserva(id,name,fecha,cantidad){
   $('#myModal').modal(); 
   $('#formReserva #name').val(name);
   $('#formReserva #fecha').val(fecha);
   $('#formReserva #cantidad').val(cantidad);
}
</script>