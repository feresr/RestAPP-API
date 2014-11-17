<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

    {{HTML::style('http://fonts.googleapis.com/css?family=Oswald:300,400,700|Open+Sans:400,700,300')}}  
    {{HTML::style('css/bootstrap.css')}}
    {{HTML::style('css/style.css')}}
    {{HTML::style('font-awesome/css/font-awesome.min.css')}}
    {{HTML::script('js/jquery-1.11.0.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
  <link href="assets/favicon.ico" rel="shortcut icon" />
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon" />
<script type="text/javascript">
$(document).ready(function ()
{
var form = $('#form');
form.on('submit', function () {
  $.ajax({
           type: form.attr('method'),
           dataType: "json",
           url: form.attr('action'),
           data: form.serialize(),
           success: function (data)
                  {
                  if(data.success == false){
                        var errores = 'usuario o contraseña incorrectos';
                        $('.errors_form').addClass( "alert alert-danger error" );
                        $('.errors_form').html(errores);
                    }else{
                        $(form)[0].reset();//limpiamos el formulario
                                location.href = "http://localhost/restapp-api/public/index.php/admin";
                              }                      
                  }
         }); 
  return false;
});
});
</script>

  <title>Login</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
@yield('content')
</body>

</html>