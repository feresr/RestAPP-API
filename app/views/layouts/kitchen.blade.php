<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - RestApp Admin</title>
    {{HTML::style('http://fonts.googleapis.com/css?family=Oswald:300,400,700|Open+Sans:400,700,300')}}    
    {{HTML::style('css/style.css')}}
    {{HTML::style('css/bootstrap.css')}} 
    {{HTML::style('font-awesome/css/font-awesome.min.css')}}
        <!-- JavaScript -->    
    {{HTML::script('js/jquery-1.11.0.min.js')}}

    @section ('head')
    @show
  </head>

  <body>

<div class="all-wrapper">
  <div class="row">
    <div class="col-md-3">
      <div class="text-center">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>
</div>

<div class="content-wrapper wood-wrapper">
<div class="content-inner">
          <div class="page-header">
  <div class="header-links hidden-xs">
    <a href="notifications.html"><i class="icon-comments"></i> User Alerts</a>
    <a href="#"><i class="icon-cog"></i> Settings</a>
    {{ link_to('/logout', 'Cerrar sesión') }}
  </div>
  <h1><i class="icon-bar-chart"></i> RestApp - Admin</h1>
</div>
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Bread</a></li>
  <li><a href="#">Crumbs</a></li>
</ol>
          <div class="main-content">
@yield('content')
          </div>
        </div>
      </div>      
  </div>
</div><!-- /#wrapper -->
    {{HTML::script('js/jquery.lazyload.js')}}
    {{HTML::script('js/bootstrap.min.js')}}

<script type="text/javascript">
$(function() {
    $("img").lazyload({
      event : "sporty",
      effect: "fadeIn"
    });
});

$(window).bind("load", function() {
    var timeout = setTimeout(function() {
        $("img").trigger("sporty")
    }, 5000);
});
</script>
  </body>
</html>