<?php   
   $_SESSION["user"]=Auth::user()->id;
   $perfil = Auth::user()->rol_id;
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta name="description" content="Nezco">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Nezco">
    <meta property="og:url" content="http://nezco.com.ve">
    <meta property="og:image" content="http://nezco.com.ve/hero-social.png">
    <meta property="og:description" content="Nezco">
    <title>Nezco - SAC</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet"  type="text/css" href="http://nezco.com.ve/public/css/main.css" type="text/css">
    <link rel="stylesheet"  type="text/css" href="http://nezco.com.ve/public/css/imagen.css" type="text/css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('home') }}">Nezco</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
        </li>
                <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
</form> 
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" style="width: 60px; height: 60px" src="{{ asset('public/images/gif.gif') }}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
          
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{ route('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Configurar</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('categoriaproducto.index') }}"><i class="icon fa fa-circle-o"></i>Productos</a></li>
            <li><a class="treeview-item" href="{{ route('categoriaservicio.index') }}"><i class="icon fa fa-circle-o"></i>Servicios</a></li>
            <li><a class="treeview-item" href="{{ route('tipoproducto.index') }}"><i class="icon fa fa-circle-o"></i>Tipo Productos</a></li>
            <li><a class="treeview-item" href="{{ route('categoriadocumento.index') }}"><i class="icon fa fa-circle-o"></i>Documentos</a></li>
           @if ($perfil==1) 
            <?php 
              $categoria=5;
              $url = 'imagenes/principal/'.$categoria;?>
 <li><a class="treeview-item" href="{{ url($url) }}"><i class="icon fa fa-circle-o"></i>Banner Principal</a></li>
            <?php 
              $categoria=1;
              $url = 'videosb/principal/'.$categoria;?>
 <li><a class="treeview-item" href="{{ url($url) }}"><i class="icon fa fa-circle-o"></i>Video Principal</a></li>

            
            <li><a class="treeview-item" href="{{ route('usuarios.index') }}"><i class="icon fa fa-circle-o"></i>Usuarios</a></li>
            @endif

          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Registro</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('producto.index') }}"><i class="icon fa fa-circle-o"></i> Productos</a></li>
            <li><a class="treeview-item" href="{{ route('servicio.index') }}"><i class="icon fa fa-circle-o"></i>Servicios</a></li>
            <li><a class="treeview-item" href="{{ route('documento.index') }}"><i class="icon fa fa-circle-o"></i>Documentos</a></li>
            <li><a class="treeview-item" href="{{ route('empresa.index') }}"><i class="icon fa fa-circle-o"></i>Empresas</a></li>
            <li><a class="treeview-item" href="{{ route('galeriab.index') }}"><i class="icon fa fa-circle-o"></i>Galeria</a></li>

          </ul>
        </li>

      </ul>
    </aside>
    <main class="app-content">
      @yield('content')
    </main>
    <!-- Essential javascripts for application to work-->



    <script src="http://nezco.com.ve/public/js/jquery-3.2.1.min.js"></script>
    <script src="http://nezco.com.ve/public/js/popper.min.js"></script>
    <script src="http://nezco.com.ve/public/js/bootstrap.min.js"></script>
    <script src="http://nezco.com.ve/public/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="http://nezco.com.ve/public/js/plugins/pace.min.js"></script>
    <script src="http://nezco.com.ve/public/tinymce/tinymce.min.js"></script>

    <!-- Page specific javascripts-->
    <script type="text/javascript" src="http://nezco.com.ve/public/js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["Enero", "Febrero", "Marzo", "Abril", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
@stack('scripts')

  </body>
</html>