<?php

$page_title = 'Status de equipo';
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
   page_require_level(3);
	?>
<!DOCTYPE html>
<html lang="en">
 <head>
	<?php include ("./layouts/header.php");?>
		
	</head>
<body>
    
    <header>
  	<?php include ("./layouts/nav.php");?>
	</header>
  <body> 
  	<div  class="container-fluid" style="padding-top: 60px">
    <div class="col-md-15">
	
		
		<div  id="myModal" tabindex="-1"  aria-labelledby="myModalLabel">
			  <div  role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<div class="container-fluid" >
						<?php echo display_msg($msg);?>
					</div>
					<h4 class="modal-title" id="myModalLabel">Buscar equipos</h4>
				  </div>
				  <div class="modal-body">
					<div class="form-horizontal">
					  <div class="form-group">
					  	<div class="container-fluid">
						<div class="table-responsive" >
						 <table class="table"  id="example" border="0" style="">
			  	<thead>
				<tr class="warning">
                
                <th> Correlativo</th>
                <th> DNI</th>
                <th class="text-center" style="width: 10%;">Nombre </th>
                <th class="text-center" style="width: 5%;"> Telefono </th>
                <th class="text-center" style="width: 5%;"> Direccion </th>
                <th class="text-center" style="width: 50%;"> Equipo </th>
				  <th class="text-center" style="width: 5%;"> Falla </th>
				   <th class="text-center" style="width: 5%;"> Status </th>
                <th class="text-center" style="width: 5%;"> Fecha </th>
				<th class="text-center" style="width: 10%;"> Costo por revision</th>
					<th class="text-center" style="width: 10%;"> Total</th>
					<th class="text-center" style="width: 10%;">Acciones </th>
                
              </tr>
          </thead>
      </tbody>
				<?php
				$sql="select * from registro as r inner join cliente as c on r.id_cliente_registro=c.id_cliente  ORDER BY r.correlativo DESC ";

		if ($query=$db->query($sql) ){
			$fecha_hoy=date('Y-m-d');
			
			
				while ($row=$db->fetch_array($query)){
					$correlativo=$row['correlativo'];
					$dni=$row['dni_cliente'];
					$nombre=$row['nombre_cliente'];
					$telefono=$row['telefono_cliente'];
					$descripcion=$row['descrip'];
					$revision=$row['costo_por_revision'];
					
					$falla=$row['falla'];
					$status=$row['status'];
					if($status==0){
						$status_value="ANULADO";
					}
					if($status==1){
						$status_value="REPARACION O MANTENIMIENTO";
					}
					elseif($status==2){
						$status_value="LISTO PARA ENTREGAR";
					}
					elseif($status==3){
						$status_value="ENTREGADO";
					}
					$direccion=$row['direccion_cliente'];
					$fecha=$row['fecha'];
					$total=$row['costo_total_trabajo'];
					?>
					<tr>
                <td class="text-center"><a href="mPrincipal.php?id=<?php echo (int)$correlativo;?>"><?php echo $correlativo;?></a></td>
               
                <td><?php echo remove_junk($dni); ?></td>
                <td class="text-center"> <?php echo remove_junk($nombre); ?></td>
                <td class="text-center"> <?php echo remove_junk($telefono); ?></td>
                <td class="text-center"> <?php echo remove_junk($direccion); ?></td>
                <td class="text-center" style="width: 50%;"> <?php echo remove_junk($descripcion); ?></td>
				<td class="text-center"> <?php echo remove_junk($falla); ?></td>
				<td class="text-center"
				bgcolor="<?php 
				
switch ($status) {
    case 1:
        echo "red";
        break;
    case 2:
        echo "yellow";
        break;
    case 3:
        echo "#9af688";
        break;
}

				?>" 


				> <?php echo remove_junk($status_value); ?></td> 
				<td class="text-center"> <?php echo read_date($fecha); ?></td>  
		        <td class="text-center"> <?php echo $revision; ?></td>
				 <td class="text-center"> <?php echo $total; ?></td>
				 <td class="text-center"><?php if($status!=='0'){?><a href="cambiar_status.php?id=<?php echo $correlativo?>">Cambiar status <?php }?></td>
              
              </tr>
					<?php
				}
				}
				?>
			</tbody>
			</table>
						</div>
					</div>
					  </div>
						
					
					
				  </div>
				  
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
	
	<?php include_once('layouts/footer.php'); ?>
	
	
	<!--<script type="text/javascript" src="js/buscar_equipos.js"></script>-->
	  
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  </body>
</html>