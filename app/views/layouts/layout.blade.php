<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rest App</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style('css/styleWeb.css')}}
    {{HTML::style('css/bootstrap.css')}}   
    {{HTML::style('font-awesome/css/font-awesome.min.css')}}
        <!-- JavaScript -->
    {{HTML::script('js/jquery-1.11.0.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}

    @section ('head')
    @show
 
<script type="text/javascript">
// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '676733425743501',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      $('#estadoLogin').hide();
      mostrarReservas(response.name, response.id);
      document.getElementById('status').innerHTML =
        '<p>Gracias por ingresar a RestApp, ' + response.name + '!</p>'+
        '<p>Presione el boton que aparece a continuacion y realice su reserva</p>'+ 
        '<button value="'+ response.name +'" id="reserva" class="btn btn-default btn-lg" onclick="nuevaReserva();">Reservar!</button>';
    });
  }

function mostrarReservas(name, id){
  $('#name').val(name);
  $('#id_facebook').val(id);
  $('#reservasList').html("Buscando reservas a nombre de "+name+"...");
  
$.get("/restapp-api/public/index.php/reservas/"+ id+"/"+name, 
            function(data){
              $('#reservasList').html(data);
                                                
              
            })
  }

</script>    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#top">Rest App</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#historia">Historia</a></li>
            <li><a href="#productos">Productos</a></li>
            <li><a href="#services">Servicios</a></li>
            <li><a href="#about">Consultas</a></li>
            <li><a href="#contact">Contactos</a></li>
            <li><a href="#reservas">Reservas</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
  
    <!-- Full Page Image Header Area -->
    <div id="top" class="header">
      <div class="vert-text">
            <div class="row-traslucida">
            <h1>Start RestApp</h1>
            <h2><em>Conozca nuestro </em>software online para la gestión de restaurantes, bares y cafés.</h2>
            </div>
      </div>
    </div>
    <!-- /Full Page Image Header Area -->
  
    <!-- Intro -->
<div id="historia" class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 align="center" class="section-heading">HISTORIA
                        </h2>
                    <p class="lead">A special thanks to Death to the Stock Photo for providing the photographs that you see in this template. to become a member.
                      A special thanks to Death to the Stock Photo for providing the photographs that you see in this template. to become a member.
                      A special thanks to Death to the Stock Photo for providing the photographs that you see in this template. to become a member.
                    </p>
                    <div style="background-color:#FF8800; border-radius: 10px;">
                    <div class="row">
                      <br>
                <div class="col-md-6 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-cutlery"></i>
                        <h3>¿Qué es RestApp?</h3>
                        <p>Reemplazá al papel y lapiz. El mozo toma los pedidos en la mesa y envía el pedido a la cocina. Ofrece un mejor servicio</p>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-laptop"></i>
                        <h3>¿Qué necesito?</h3>
                        <p>Una computadora o dispositivo movil conectado a Internet y una cuenta de Facebook es suficiente para poder utilizar RestApp.</p>
                    </div>
                </div>                
              </div>
              <div class="col-md-12 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-thumbs-o-up"></i>
                        <h3>¿Por qué usarlo?</h3>
                        <p>Realiza tu reserva para la fecha y hora que desees. No pierdas tiempo haciendo colas ni llamando para tener una mesa.</p>
                    </div>
                </div>
                <br>
                </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                  {{ HTML::image('images/web/principal.png', "Imagen no encontrada", array('class'=> 'img-responsive')) }}
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div id="productos" class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">3D Device Mockups
                        <br>by PSDCovers</h2>
                    <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by PSDCovers! <a target="_blank" href="http://www.psdcovers.com/">Visit their website</a> to download some of their awesome, free photoshop actions!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">                    
                    {{ HTML::image('images/web/ipad.png', "Imagen no encontrada", array('class'=> 'img-responsive')) }}
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Google Web Fonts and
                        <br>Font Awesome Icons</h2>
                    <p class="lead">This template features the 'Lato' font, part of the <a target="_blank" href="http://www.google.com/fonts">Google Web Font library</a>, as well as <a target="_blank" href="http://fontawesome.io">icons from Font Awesome</a>.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    {{ HTML::image('images/web/menu.png', "Imagen no encontrada", array('class'=> 'img-responsive')) }}
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">3D Device Mockups
                        <br>by PSDCovers</h2>
                    <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by PSDCovers! <a target="_blank" href="http://www.psdcovers.com/">Visit their website</a> to download some of their awesome, free photoshop actions!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">                    
                    {{ HTML::image('images/web/ordenes.png', "Imagen no encontrada", array('class'=> 'img-responsive')) }}
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /Intro -->
  
    <!-- Callout -->
    <div class="callout">
      <div class="vert-text">
        <h1>A Dramatic Text Area</h1>
      </div>
    </div>
    <!-- /Callout -->
    <!-- Services -->
    <div id="services" class="services">
       <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <h1>Nuestros Servicios</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-cutlery"></i>
                        <h3>¿Qué es RestApp?</h3>
                        <p>Reemplazá al papel y lapiz. El mozo toma los pedidos en la mesa y envía el pedido a la cocina. Ofrece un mejor servicio</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-laptop"></i>
                        <h3>¿Qué necesito para usarlo?</h3>
                        <p>Una computadora o dispositivo movil conectado a Internet y una cuenta de Facebook es suficiente para poder utilizar RestApp.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-thumbs-o-up"></i>
                        <h3>¿Por qué usarlo?</h3>
                        <p>Realiza tu reserva para la fecha y hora que desees. No pierdas tiempo haciendo colas ni llamando para tener una mesa.</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /Services -->

            <div id="about" class="intro">
        <div class="container">
                <div class="jumbotron">
  <h1>Consultas</h1>
  <p>Puede realizar su consulta desde aqui le responderemos a su email</p>
  <br>
@yield('content')
</div>
        </div>
    </div>
    <div style="padding-top:50px; background-color:#FFBB33;" id="contact">
    <div class="map"> 
      <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a></small></iframe>
    </div> 
    </div>  

        <!-- Call to Action -->
    <div id="reservas"class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
    <div id="estadoLogin">
            <h3>Ingrese con Facebook y realice su reserva.</h3>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
</div>
<div id="status">

</div>

<div id="mensaje" style="display:none;" class="alert alert-success">
  <button type="button" class="close" onclick="cerrar()"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4>
    {{ HTML::image('images/ok.png') }}
    <div style="display:inline;" id="success_form"></div>
  </h4>
</div>
<div id="reservasList"></div>
 
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="color:black;" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">    
        <div class='errors_form_reservas'></div>
{{ Form::open(array('url' => 'reservasFace/create', 'id' => 'formReserva')) }}
<input type="hidden" name="id_facebook" id="id_facebook">
<input type="hidden" name="id_reserva" id="id_reserva" value="">
    <div class="form-group">
       <label style="color:black;" for="exampleInputPassword1">Fecha</label>
       <input class="form-control" placeholder="Fecha" autocomplete="of" name="fecha" type="date" value="{{$reserva->date}}" id="fecha">
    </div>
    <div class="form-group">
       <label style="color:black;">Nombre</label>
       {{ Form::text ('name', $reserva->name, array('class'=>'form-control','placeholder'=>'Nombre', 'id'=>'name')) }} 
     </div> 
       <div class="form-group">
       <label style="color:black;">Cantidad de Personas</label>
       {{ Form::text ('cantidad', $reserva->cantidad, array('class'=>'form-control','placeholder'=>'Cantidad de personas', 'id'=>'cantidad')) }} 
     </div>
      <br>
      <div class="modal-footer">
      <button type="button" onclick="guardarReserva()" class="btn btn-primary">Guardar Reserva</button>     
      </div>
{{ Form::close() }}    
      </div>
    </div>
  </div>
</div>
        </div>
      </div>
    </div>
    <!-- /Call to Action -->
    
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
            <ul class="list-inline">
              <li><i class="fa fa-facebook fa-3x"></i></li>
              <li><i class="fa fa-twitter fa-3x"></i></li>
              <li><i class="fa fa-dribbble fa-3x"></i></li>
            </ul>
            <div class="top-scroll">
              <a href="#top"><i class="fa fa-circle-arrow-up scroll fa-4x"></i></a>
            </div>
            <hr>
            <p>Copyright &copy; Company 2013</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- /Footer -->
    <!-- Custom JavaScript for the Side Menu and Smooth Scrolling -->
    <script>
        $("#menu-close").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
    </script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
    </script>
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });

function cerrar(){
  $('#mensaje').hide();
}

function guardarReserva(){

var form = $('#formReserva');
var idreserva = $('#id_reserva').val();

if(idreserva == ""){
  var direccion = "http://localhost/restapp-api/public/index.php/reservasFace/create";
}else{
  direccion = "http://localhost/restapp-api/public/index.php/reservasFace/update/"+idreserva;
}

  $.ajax({
           type: 'POST',
           dataType: "json",
           url: direccion,
           data: form.serialize(),
           success: function (data)
                  {
                  if(data.success == false){
                        var errores = '';
                        for(datos in data.errors){
                            errores += data.errors[datos] + '<br>';
                        }
                        $('.errors_form_reservas').addClass( "alert alert-danger error" );
                        $('.errors_form_reservas').html(errores);
                    }else{                        
                        //$('.errors_form_reservas').removeClass( "alert alert-danger error" );
                        $('#mensaje').show();
                        $('#success_form').html(data.message);                        
                        
                        nombre = $('#formReserva #name').val();
                        idFace = $('#formReserva #id_facebook').val();
                        $('#formReserva #id_reserva').val("");
                        //$('#myModalLabel').html('Nueva Reserva');
                        $('#myModal').modal('toggle');
                        

                        //$('#formReserva')[0].reset();//limpiamos el formulario
                        mostrarReservas(nombre, idFace);
                    }
                  }
         });
}

function confirmarDelete(id,name,idface){ 
confirmar=confirm("¿Estas seguro que quieres elimar la Reserva?"); 
if (confirmar){ 
// si pulsamos en aceptar
$.post("index.php/reservasFace/delete/"+ id, 
            function(data){
                if (data.success == true){
                  $('#mensaje').show();
                  $('#success_form').html(data.message);
                  mostrarReservas(name, idface);
                }

            });  
} 
}

function editarReserva(id,name,fecha,cantidad){
   $('#myModal').modal(); 
   $('.errors_form_reservas').html("");
   $('.errors_form_reservas').removeClass( "alert alert-success" );
   $('#myModalLabel').html('Editar Reserva');
   $('#formReserva #name').val(name);
   $('#formReserva #fecha').val(fecha);
   $('#formReserva #cantidad').val(cantidad);
   $('#formReserva #id_reserva').val(id);
}


function nuevaReserva(){
   $('#myModal').modal(); 
   $('.errors_form_reservas').html("");
   $('.errors_form_reservas').removeClass( "alert alert-success" );
   $('#formReserva')[0].reset();
   $('#formReserva #name').val($('#reserva').val());
   $('#formReserva #id_reserva').val("");
   $('#myModalLabel').html('Nueva Reserva');
}

  </script>

</body>

</html>