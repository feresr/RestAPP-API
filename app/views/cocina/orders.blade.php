@if($quantOrders)
<input type="hidden" id= 'quantity' value='{{$quantOrders}}'>
<input type="hidden" id= 'quantitems' value='{{$quantItems}}'>
    <div class="padded">
        <div class="row">
        @foreach($orders as $order)
        <div class="col-lg-6">
        @if($order->ready == true)
            <div class="panel panel-success">
            <span class="label label-success pull-right">Mozo: {{$order->user['firstname'].' '.$order->user['lastname']}}</span>
        @else
            <div class="panel panel-danger">
              <span class="badge pull-right alert-animated">Mozo: {{$order->user['firstname'].' '.$order->user['lastname']}}</span>
              <button id='check' value="{{$order->id}}" type="button" class="btn btn-success btn-sm pull-right">Vista </button>
        @endif
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6 img-circle">
                    {{ HTML::image('images/table.png') }}
                      <div class='indicators'><h3><span class="label label-success">{{$order->table['number']}}</span></h3>
  </div>
                  </div>
                  <div class="col-md-6 text-right">
                    {{ HTML::image('images/waiter.png', "Imagen no encontrada", array('class' => 'img-circle')) }}
                  </div>
                </div>
              </div>              
                <div class="panel-footer announcement-bottom">
                  <button id= 'enviar' onclick="send({{$order->id}})" type="button" class="btn btn-primary pull-right">Enviar <i class="fa fa-arrow-circle-right"></i></button>
                  <h3>Items de la orden</h3>
          <table class="table table-striped table-bordered">
           <tr>
             <th> Item </th>
             <th> Descripcion </th>
             <th> Cantidad </th>
          </tr>
        <div id="form">
       @foreach($order->items as $item)
        <tr>
                <td> {{ $item->name }} </td>
                <td> {{ $item->description }} </td>
                <td> {{ $item->pivot->quantity }} </td>
                @if($item->pivot->view == false)
                <td> <div class="checkbox"><input type="checkbox" value="{{$item->pivot->id}}" class="chk"/></div></td>
                @else
                <td> <div class="checkbox"><input type="checkbox" value="{{$item->pivot->id}}" class="chk" checked="checked"/></div></td>
                @endif
          </tr>
      @endforeach
    </div>
        </table>
                </div>
            </div>
          </div>
          @endforeach
    </div>
</div>
    @else
    <div class="alert alert-danger">No existen ordenes a la fecha</div>
    @endif
<script type="text/javascript">
var cantOrders = $("#quantity").val();
var cantItems = $("#quantitems").val();

/*
function messages_longpolling( timestamp, lastId ){
  $.ajax({
           async:true,
           type: 'POST',
           dataType: 'json',
           url: 'listOrders/' + cantOrders + '/'+cantItems,
           data: 'timestamp=' + timestamp + '&lastId=' + lastId,          
           success: function( data ){
            clearInterval( t );
            if(data.success == true){
               t = setTimeout( function(){
               messages_longpolling( data.timestamp, data.lastId                         );
            }, 1000 );
            if( data.success == true ){
               
            }
         } else if( payload.status == 'error' ){
            alert('We got confused, Please refresh the page!');
         }
      },
      error: function(){
         clearInterval( t );
            t = setTimeout( function(){
            messages_longpolling( data.timestamp, data.lastId );
         }, 15000 );
      }
         }); 
  return false;
});*/

setTimeout(
  function(){
$.post('listOrders/' + cantOrders + '/'+cantItems, 
            function(data){
                if (data.success == true){
                    $('#mensaje').addClass( "alert alert-success" );
                    $('#mensaje').html(data.message);
                    $("#tableOrders").load('listOrders');
                }
                else{
                  $('.errors_form').removeClass( "alert alert-danger error" );
                  $('.errors_form').html('');
                  //$("#tableOrders").load('listOrders');
                }
            });  
  },
5000);
$("#check").click(function (){          

var id = $( "#check" ).val();
$.post("orders/view/"+id, 
            function(data){
                if (data.success != true){
                  alert('Error');
                }else{
                    // si la respuesta fue exitosa entonces eliminamos la fila de la tabla 
                    $("#tableOrders").load('listOrders');
                }
            });                         
});

$('.chk').click(function() {
var value = $( this ).val();
$.post("cocina/check/"+value, 
            function(data){
                if (data.success == true){
                  alert('Confirmado');
                }else{
                }
            });  
});

</script>