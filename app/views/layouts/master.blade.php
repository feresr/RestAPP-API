<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RestApp Admin</title>
    {{HTML::style('http://fonts.googleapis.com/css?family=Oswald:300,400,700|Open+Sans:400,700,300')}}    
    {{HTML::style('css/style.css')}}
    <!--{{HTML::style('css/bootstrap.css')}} -->
    {{HTML::style('font-awesome/css/font-awesome.min.css')}}
        <!-- JavaScript -->    
    {{HTML::script('js/jquery-1.11.0.min.js')}}
    <!-- {{HTML::script('js/jquery.lazyload.js')}} -->
    @section ('head')
    @show
  </head>

  <body>

<div class="all-wrapper">
  <div class="row">
    <div class="col-md-3">

<div class="side-bar-wrapper collapse navbar-collapse navbar-ex1-collapse">
  <a href="/admin" class="logo hidden-sm hidden-xs">
    {{ HTML::image('images/iconos/raster2.png', "Imagen", array('class' => 'img-circle')) }}
    <span>RestApp</span>
  </a>
  <div class="relative-w">
    <ul class="side-menu">
      <li id ='user'>
        <a href="/users">
          <span class="badge pull-right"></span>
          <i class="icon-group"></i> Usuarios
        </a>
      </li>
      <li id='order'>
        <a href="/orders">
          <span class="badge pull-right">12</span>
          <i class="icon-pencil"></i> Ordenes
        </a>
      </li>
      <li id='item'>
        <a href="http://localhost/restapp-api/public/index.php/items">
          <span class="badge pull-right"></span>
          <i class="icon-code-fork"></i> Items
        </a>
      </li>
      <li id='cat'>
        <a href="/categorias">
          <span class="badge pull-right">24</span>
          <i class="icon-th"></i> Categorias
        </a>
      </li>
      <li id='table'>      
        <a href="/tables">
          <span class="badge pull-right"></span>
          <i class="icon-table"></i> Mesas
        </a>
      </li>
      <li id='res'><a href="/reservas">
          <span class="badge pull-right">11</span>
          <i class="icon-calendar"></i> Reservas
        </a>
      </li>
      <li>
        <a href="/login">
          <span class="badge pull-right"></span>
          <i class="icon-signin"></i> Login Page
        </a>
      </li>
    </ul>
  </div>
</div>
</div>
<div class="col-md-9">

<div class="content-wrapper wood-wrapper">
<div class="content-inner">
          <div class="page-header">
  <div class="header-links hidden-xs">
    <a href="/cocina"><i class="icon-comments"></i> Cocina</a>
    <a href="/cocina2"><i class="icon-cog"></i> Settings</a>
    {{ link_to('/logout', 'Cerrar sesión') }}
  </div>
  <h1><i class="icon-bar-chart"></i> RestApp - Admin</h1>
</div>

          <div class="main-content">
@yield('content')
          </div>
        </div>
      </div>      
    </div>
  </div>
</div><!-- /#wrapper -->
{{HTML::script('js/bootstrap.min.js')}}
@section ('script')
    @show
  </body>
</html>
