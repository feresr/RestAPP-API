function eliminar(id){          

var href = $( "#button" ).val();
$.post(href+id, 
            function(data){
                if (data.success != true){
                  alert('Error');
                }else{
                    // si la respuesta fue exitosa entonces eliminamos la fila de la tabla 
                    var mensaje = 'El item se elimino correctamente';
                    $('.errors_form').addClass( "alert alert-danger error" );
                    $('.errors_form').html(mensaje);
                    $('#fila_'+id).remove();
                }
            });                         
}