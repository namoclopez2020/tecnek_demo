<?php

  $page_title = 'Ordenes de servicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<html>
	<head>
	<?php include ("./layouts/header.php");?>
		
	</head>
<body>
    
    <header>
  	<?php include ("./layouts/nav.php");?>
	</header>
    <div  class="container-fluid">
	 <?php echo display_msg($msg); ?>
	<div class="menu-inicial ">
    
    <div class="mnu-container" style="margin-left: 0px;">
        
        <div class="colbot">
            <a href="sucursal.php" class="taco taco-principal">
            
                <div class="taco-dato-principal">
                    <img alt="imglogon" class="imagen-tacoB" src="libs/images/modulo_principal.png">
                </div>

                <span class="taco-titulo-principal">
                    Config. de Sucursales
                </span>
               
            </a>
           
            <a href="group.php" class="taco tacoA">
             
                <div class="taco-dato-principal">
                    <img alt="imglogon" class="imagen-tacoB" src="libs/images/estatus.png">
                </div>

                <span class="taco-titulo-principal">
                   Grupos
                </span>
            </a>
            <a href="users.php" class="taco tacoA" style="background-color: #75797E">
             
                <div class="taco-dato-principal">
                    <img alt="imglogon" class="imagen-tacoB" src="libs/images/users_icono.png">
                </div>

                <span class="taco-titulo-principal">
                   Usuarios
                </span>
            </a>
            
        </div>
        
    <?php include ("./layouts/footer.php");?>



</body></html>