$(document).ready(function ()
{
var form = $('#form');
var tipo = $('#link').val();
form.on('submit', function () {
  $.ajax({
           type: form.attr('method'),
           dataType: "json",
           url: form.attr('action'),
           data: form.serialize(),
           success: function (data)
                  {
                  if(data.success == false){
                        var errores = '';
                        for(datos in data.errors){
                            errores += data.errors[datos] + '<br>';
                        }
                        $('.errors_form').addClass( "alert alert-danger error" );
                        $('.errors_form').html(errores);
                    }else{
                        $(form)[0].reset();//limpiamos el formulario
                        $('.errors_form').removeClass( "alert alert-danger error" );
                        $('.errors_form').addClass( "alert alert-success" );
                          if(data.types == 'edit'){
                            $('.errors_form').html("El registro se modifico correctamente");
                            location.href = "http://localhost/restapp-rest/public/index.php/"+tipo;                        
                          }
                          else{
                            $('.errors_form').html("El registro se agrego correctamente");
                              if(tipo == 'orders'){
                                location.href = "http://localhost/restapp-rest/public/index.php/orders/edit/"+ data.idorder;
                              }
                              }
                        
                    }
                  }
         }); 
  return false;
});
});