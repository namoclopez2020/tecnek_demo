<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin.php">TECKNEK BOX</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ODS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="mPrincipal.php">Nueva guia</a></li>
          <li><a href="status_equipo.php">Status equipo</a></li>
        </ul>
      </li>
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">VENTAS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nueva_venta.php">Nueva venta</a></li>
          <li><a href="facturas.php">Lista de ventas</a></li>
        </ul>
      </li>
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">COMPRAS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nueva_compra.php">Nueva compra</a></li>
          <li><a href="compras.php">Lista de compras</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">INVENTARIO
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="product.php">Lista de Productos</a></li>
          <li><a href="categorie.php">Categorias</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">REPORTES
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="reporte_diario.php">Reporte diario</a></li>
          <li><a href="reporte_por_fechas.php">Reporte por fechas</a></li>
        </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="configuracion.php"><span class="glyphicon glyphicon-user"></span> Configuración</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>