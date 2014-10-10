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
<script type="text/javascript">
  /*/ This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);

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
    version    : 'v2.0' // use version 2.0
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
      $('#status').html('Gracias por haber ingresado al sistema, ' + response.name + '!'+'<a href= "#" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#myModal">Realizar Reserva!</a>');
      $('input #name').val('response.name');
      //location.href = "http://localhost/restappadmin/public/index.php/reservas";
    });
  }
////////*/
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
          <a class="navbar-brand" href="#">Rest App</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#productos">Productos</a></li>
            <li><a href="#services">Servicios</a></li>
            <li><a href="#about">Consultas</a></li>
            <li><a href="#contact">Contactos</a></li>
            <li><a href="#reservas">Reservas</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
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
<div id="productos" class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Death to the Stock Photo:
                        <br>Special Thanks</h2>
                    <p class="lead">A special thanks to Death to the Stock Photo for providing the photographs that you see in this template. <a target="_blank" href="http://join.deathtothestockphoto.com/">Visit their website</a> to become a member.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                  {{ HTML::image('images/web/ipad.png', "Imagen no encontrada", array('class'=> 'img-responsive')) }}
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
                    {{ HTML::image('images/web/doge.png', "Imagen no encontrada", array('class'=> 'img-responsive')) }}
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
                    {{ HTML::image('images/web/phones.png', "Imagen no encontrada", array('class'=> 'img-responsive')) }}
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
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
    <div id="contact" class="map">
      <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a></small></iframe>
    </div>

        <!-- Call to Action -->
    <div id="reservas"class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
            <h3>The buttons below are impossible to resist.</h3>

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
    </script>

  </body>

</html>