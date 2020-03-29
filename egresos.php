<?php

  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);

if(isset($_GET['id'])){
  if(find_by_id_egreso('egreso',(int)$_GET['id'])){

  $id=$_GET['id'];
  $consulta="SELECT * FROM  egreso where id_egreso='$id'";
  $query=$db->query($consulta);
  while($data=$db->fetch_array($query)){
    $id_egreso=$data['id_egreso'];
    $concepto=$data['concepto'];
    $fecha_egreso=$data['fecha'];
    $monto=$data['monto'];
  }
  
    
  }
  else{
    $id="";
    $id_egreso="";
    $concepto="";
    $fecha_egreso="";
    $monto="";
  }
  
  
  
  
}else{
  $id="";
  $id_egreso="";
    $concepto="";
    $fecha_egreso="";
    $monto="";
}
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
            <div id="resu" style="width: 92%">
                <?php echo display_msg($msg);?>
            </div>
             
          
            <div class="taco tacoB" style="height: 210px">
              <form name="datos" id="datos" method="POST" action="crear_egreso.php">
                <div class="taco-contadorB" >
                  <span class="taco-titulo">
                    NUEVO EGRESO
                    
                </span>      
                </div>
                <div class="taco-dato">
                  <span>CONCEPTO:</span>
                  <div >
                    <input type="text" name="id" value="<?php echo $id_egreso?>" hidden>
                  <textarea class="textarea1" name="concepto_egreso"><?php echo $concepto?></textarea> 
                  </div> 

                  

                   </div>
                    <div style="text-align: center; ">
                     <span>Monto: </span><input type="text" style="color:black" name="monto_egreso" value="<?php echo $monto?>">
                   </div>  
                  
            </div>
        
    
             <div class="taco-mPrincipal3 tacoPlomo" style="height: 210px">
            
                <div class="taco-dato4">
          <table class="tabla4" border="0">
            <tr>
              <td align="center">
                <button type="submit" name="guardar" id="guardar" class="button-guardar">
                  <img src="libs/images/crear.png" class="imagen-taco" ></button>
              </td>
            <td align="center">
              <a href="borrar_egreso.php?id=<?php echo (int)$id?>" >
                      <img src="libs/images/borrar.png" class="imagen-taco">
              </a>
            </td>
            <td align="center">
             <button type="button" name="actualizar" id="actualizar" class="button-guardar">
                  <img src="libs/images/refresh.png" class="imagen-taco" ></button>
            </td>
           
            </tr>
            <tr><td style="padding-right: 10px;">Registrar egreso</td>
              <td style="padding-left: 8px;">ELiminar Egreso </td>
              <td style="padding-left: 20px">Actualizar </td>
            </tr>
            
          </table>
        
          
                </div>

</form>
               
      </div>

      <div class="taco-egreso"  style="background-color:#AED6F1 ">
            <div class="container-fluid ">
            <div class="table-responsive" style="height: 90%" >

              <table class="table table-striped table-bordered" id="example" >
                <thead>
                  <tr class="warning">
                
                <th style="width: 20%"> Nro egreso</th>
                <th class="text-center" style="width: 30%;">Fecha</th>
                <th class="text-center" style="width: 30%"> Concepto</th>
                <th class="text-center" style="width: 20%;">Monto </th>
                
              </tr>
                </thead>
                <tbody>
                  <?php
                  $sql="select * from egreso";

    if ($query=$db->query($sql) ){
      
        while ($row=$db->fetch_array($query)){
          $correlativo=$row['id_egreso'];
          $fecha=$row['fecha'];
          $concepto=$row['concepto'];
          $monto=$row['monto'];
          
          ?>
          <tr>
                            
                <td><a href="egresos.php?id=<?php echo (int)$correlativo;?>"><?php echo remove_junk($correlativo); ?> </a></td>
                <td class="text-center"> <?php echo read_date($fecha); ?></td>
                <td class="text-center"> <?php echo remove_junk($concepto); ?></td>
                <td class="text-center"> <?php echo remove_junk($monto); ?></td>
              </tr>
          <?php
        }
        }?>
                </tbody>
              </table>
            </div>
      </div>
      <!--fin de div buscador-->
			
           
        </div>
   
    </div>


    <?php include ("./layouts/footer.php");?>


<script type="text/javascript" src="js/buscar_egresos.js"></script>
</body></html>