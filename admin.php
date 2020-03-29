<?php

  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);

   
//capturar datos de la sucursal
$nombre_sucursal=$_SESSION['nombre_sucursal'];
$id_sucursal=$_SESSION['id_sucursal'];
$direccion_sucursal=$_SESSION['direccion_sucursal'];
$telefono_sucursal = $_SESSION['telefono_sucursal'];
$ruc_sucursal= $_SESSION['ruc_sucursal'];
$ruta_logo=$_SESSION['ruta_imagen'];
$email_sucursal=$_SESSION['email_sucursal'];
$wsp_sucursal=$_SESSION['wsp_sucursal'];
?>
<html>
	<head>
	<?php include ("./layouts/header.php");?>
		
	</head>
     
<body>
   <!-- <div class="container-fluid">-->
    <header >
  <?php include ("./layouts/nav.php");?>
   </header>
    
     <div  class="container-fluid" >
           
	
	<div class="menu-inicial ">
    
    <div class="mnu-container">
        
        <div class="colbot" >
            <div style="width: 92%">
                <?php echo display_msg($msg);?>
            </div>
             
            <a href="ods.php" class="taco tacoA" >
            
                <div class="taco-contador" >
                  <span class="taco-titulo">
                    ORDENES DE SERVICIO
					
                </span>      
                </div>
                <div class="taco-dato"><br>
					MODULO PRINCIPAL<br>
					IMPRIMIR ORDEN DE SERVICIO<br>
					ESTADO Y UBICACION DEL EQUIPO
                 
                </div>

               
            </a>
            <a href="egresos.php" class="taco tacoB" style="background-color: #A7A7A7">
              
                <div class="taco-contadorB" style="background-color:  #82877E">
                  <span class="taco-titulo" >
                    EGRESOS
					
                </span>      
                </div>
                <div class="taco-dato"><br>
					LISTA DE EGRESOS<br>
					AGREGAR EGRESO<br>
					
                    <!--<img alt="imglogon" class="imagen-taco" src="./libs/2.png">-->
                </div>
            </a>
            <a href="cliente.php" class="taco tacoB">
              
                <div class="taco-contadorB"  >
                  <span class="taco-titulo">
                    CLIENTES
                    
                </span>      
                </div>
                <div class="taco-dato"><br>
                    AGREGAR CLIENTES<br>
                    LISTA DE CLIENTES<br>
                   
              </div>
            </a>
            <a href="proveedores.php" class="taco tacoB" >
              
                <div class="taco-contadorB" >
                  <span class="taco-titulo">
                    PROVEEDORES
                    
                </span>      
                </div>
                <div class="taco-dato"><br>
                    AGREGAR PROVEEDORES<br>
                    LISTA DE PROVEEDORES<br>
                </div>
            </a>
            <a href="inventario.php" class="taco tacoA" >
              <div class="taco-contador" >
                  <span class="taco-titulo">
                   INVENTARIO
					
                </span>      
                </div>
                <div class="taco-dato"><br>
					LISTA DE PRODUCTOS<br>
					COMPRAS<br>
					VENTAS
           
                </div>
            </a>
			
            <a href="panel.php" class="taco taco-imagenB">
               
                <div class="taco-contador-blue">
                  <span class="taco-titulo">
                    VISTA GENERAL
					
                </span>      
                </div>
                <div class="taco-dato"><br>
					
                    <img alt="imglogon" class="imagen-taco" src="uploads/empresa/<?php echo $ruta_logo;?>">
                </div>
            </a>
        </div>
       
		<!--<div class="pie-menu-inicial">
    <div class="pie-logo-saint">
        <img src="./libs/images/mr robot logo1.png" alt="imglogon" width="484" height="65" style="width:130px">
        <span class="version-saint">Tecnek Web</span>
    </div>
        </div>-->
    </div>


    <?php include ("./layouts/footer.php");?>



</body></html>