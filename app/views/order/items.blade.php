<ul>
  <h3>ITEMS DE LA ORDEN</h3>
          <table class="table table-striped table-bordered table-hover datatable">
           <tr>
             <th> Item </th>
             <th> Descripcion </th>
             <th> Cantidad </th>
             <th> Precio unitario </th>
             <th> Precio total </th>
          </tr>
       @foreach($order->items as $item)
            <tr>
                <td> {{ $item->name }} </td>
                <td> {{ $item->description }} </td>
                <td> {{ $item->pivot->quantity }} </td>
                <td> $ {{$item->pivot->price}}</td>
                <td> $ {{$item->pivot->price * $item->pivot->quantity}}</td>
                <td> <a href='http://localhost/restapp-api/public/index.php/orders/editar/{{$item->id}}' class="btn btn-default btn-xs"><i class="icon-pencil"></i> edit</a></td>
              <td>
                <button id="button" onclick="eliminar({{ $item->pivot->id }}, {{ $order->id }})" class="btn btn-danger btn-xs"><i class="icon-remove"></i></button>
              </td>
          </tr>
      @endforeach
            <tr>
                <td><h3>Total:<span class="label label-success">$ {{$order->total}}</span></h3></td>
            </tr>
        </table>
    </ul>
<script type="text/javascript">
function eliminar(iditem, idorder){   
confirma = confirm("¿Estas seguro que quieres elimar el item seleccionado?"); 
if (confirma){
  $.post('orders/'+iditem, 
            function(data){
                if (data.success != true){
                  alert('Error: quiere eliminar un item que no existe');
                }else{
                    $("#tabla").load('list/'+idorder);
                }
            });
  }                                
}
</script>