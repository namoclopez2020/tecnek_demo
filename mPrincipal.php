<?php

  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$consulta="SELECT * FROM registro as r INNER JOIN cliente as c ON r.id_cliente_registro=c.id_cliente where r.correlativo='$id'";
	$query=$db->query($consulta);
	while($data=$db->fetch_array($query)){
		$nombre=$data['nombre_cliente'];
		$id_cliente=$data['id_cliente'];
		$telefono=$data['telefono_cliente'];
		$dni=$data['dni_cliente'];
		$direccion=$data['direccion_cliente'];
		$email=$data['email_cliente'];
		$descripcion=$data['descrip'];
		$descripcion=str_replace("<br>","\n",$descripcion);
		$cargador=$data['deja_cargador'];
		$falla=$data['falla'];
		$informe=$data['informe_final'];
		$revision=$data['costo_por_revision'];
		$total=$data['costo_total_trabajo'];
		$repuesto=$data['costo_del_repuesto'];
		$adelanto=$data['abono_por_servicio'];
		$saldo=$data['pendiente'];
		$costo_servicio=$data['costo_total'];
		
	}
	
	
	
}else{
	$id_cliente="";
	$nombre="";
		$telefono="";
		$dni="";
		$direccion="";
		$email="";
		 $descripcion="*MARCA:\n*MODELO:\n*S/N:\n*MEMORIA RAM: \n*DISCO DURO: \n*PLACA: \n*OTROS: \n";
		$cargador="";
		$falla="";
		$informe="";
		$revision="";
		$total="";
		$repuesto="";
		$adelanto="";
		$saldo="";
		$costo_servicio="";
	$sql=$db->query("select LAST_INSERT_ID(correlativo) as last from registro order by correlativo desc limit 0,1 ");
$rw=$db->fetch_array($sql);
$id=$rw['last']+1;
	
}
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
		
	
	<div class="menu-inicial " >
 
		
	
			
    <div class="mnu-container" >
    	<?php echo display_msg($msg);?>
         <div><!--boton regresar-->
			 <a href="mPrincipal.php"><img src="libs/images/refresh.png" class="imagen-regresar"></a>
		</div> <!--fin boton regresar -->
        <div class="colbot"><!--inicio colbot-->
        	<?php 
			include("model/nuevo_cliente.php");
			?>
            
            <div class="taco-mPrincipal taco-blue" >
            <form id="datos" role="form" name="datos" method="post">
			    <div class="taco-contador1" >
                  <span class="taco-titulo1">
                    Datos del cliente
					
                </span>      
                </div>
               <div class="taco-dato1" >
					<table class="form-cliente"  style="color:black">
						<tr><td colspan="2" rowspan="6">
							<button type="button" class="button-guardar" data-toggle="modal" data-target="#myModal"><img src="libs/images/usuario.png" class="imagen-taco"></button>
							</td>
						</tr>
						<tr>
							<td class="celda">Nombre: </td>
							<td class="celda">
							<input type="text" name="correlativo" id="correlativo" class ="textbox1" value="<?php echo $id;?>" hidden>
							<input type="text" name="id_cliente" id="id_cliente" class ="textbox1" value="<?php echo $id_cliente?>" hidden >
							<input type="text" name="nombre_cliente" id="nombre_cliente" class ="textbox1" value="<?php echo $nombre;?>" required>
						   </td>
						</tr >
						
						<tr>
							<td class="celda">Telefono:</td>
							<td class="celda"><input type="text" name="telefono" id="telefono" value="<?php echo $telefono;?>" class ="textbox1" readonly></td>
						</tr>
						<tr>
							<td class="celda">DNI o RUC: </td>
							<td class="celda"><input type="text" name="dni" id="dni" value="<?php echo $dni;?>" class ="textbox1" readonly></td>
						</tr>
						<tr>
						<td class="celda">Direccion: </td>
						<td class="celda"><input type="text" name="direccion" id="direccion"  value="<?php echo $direccion;?>" class ="textbox1" readonly></td>
						</tr>
						<tr>
							<td class="celda">Email: </td>
							<td class="celda"><input type="text" name="email" id="email" value="<?php echo $email?>" class ="textbox1" readonly></td>
						</tr>
						
				</table>
			 </div>
		</div>
           
			<div class="taco-mPrincipal tacoB" >
            	<div class="taco-contador2" >
                  <span class="taco-titulo1">
                   Datos del equipo
				 </span>      
                </div>
                <div class="taco-dato1">
					<table class="form-equipo" border="0" style="color:black">
						<tr>
						<td class="celda1" >Descripción del equipo</td>
						<td colspan="2">
							<textarea name="info" id="info" class="textarea1" style=""><?php echo $descripcion?></textarea></td>
						</tr>
						<tr>
						<td class="celda2">Deja cargador:</td>
						<td>
							<input type="radio" value="1" name="cargador" id="cargador">Sí &nbsp;
							<input type="radio" name="cargador" id="cargador" value="2" required>NO</td>
						<td class="cargador"><?php echo $cargador?></td>
						</tr>
						<tr>
						<td class="celda2">Servicio a realizar o falla</td>
						<td colspan="2">
							<input type="text" name="vendedor" id="vendedor" value="<?php echo $user['id'] ?>" style="color:black" hidden>
							<textarea name="servicio" id="servicio" class="textarea2" required><?php echo $falla?></textarea>
						</td>
						</tr>
						
						
					</table>
				
					
                </div>

               
			</div>
            <div class="taco-mPrincipal1 tacoPlomo">
            
                <div class="taco-contador3">
                  <span class="taco-titulo1">
                    <table border="0" class="orden">
					<tr>
						<td class="nro-orden">Nro de Orden</td>
						<td>
							<table border="2" bordercolor="white" class="tabla10"><tr>
						<td class="correlativo"><?php echo $id?></td></tr>
							</table>
						</td>
						</tr>
					  </table>
					
                </span>      
                </div>
                <div class="taco-dato2">
					<table class="informe" >
						<tr>
							<td style="color:aqua">Informe Final</td>
						</tr>
						<tr>
							<td>
						<table bordercolor="white" border="1">
							<tr>
								<td class="celda3">
									<textarea name="informe" id="informe" class="textarea1"><?php echo $informe?></textarea>
								</td>
							</tr>
							
							
							</table>
							</td>
						</tr>
						<tr>
							<td class="celda4">
							<input type="button" class="btn-success" name="actualizar" id="actualizar" value="GUARDAR CAMBIOS" >
                   
							</td>
						</tr>
					</table>
				
					
                </div>

               
			</div>
		
            <div class="taco-mPrincipal3 tacoPlomo" style="background-color: #4F4F4F;color:white">
            
                <div class="taco-dato4">
					<table class="tabla4" border="0">
						<tr>
							<td align="center">
								<button type="submit" name="guardar" id="guardar" class="button-guardar">
									<img src="libs/images/crear.png" class="imagen-taco" ></button>
							</td>
						<td align="center">
							<a href="borrar_registro.php?id=<?php echo (int)$id?>" >
                      <img src="libs/images/borrar.png" class="imagen-taco">
							</a>
						</td>
						<td align="center">
							<button type="button" name="imprimir" id="imprimir" class="button-guardar"><img src="libs/images/imprimir.png" class="imagen-taco"></button>
						</td>
						</tr>
						<tr><td style="padding-right: 10px;">Crear Orden</td>
							<td style="padding-left: 8px;">Anular </td>
							<td style="padding-left: 20px">Imprimir </td>
						</tr>
						
					</table>
				
					
                </div>

               
			</div>
            <div class="taco-mPrincipal10 taco-aqua">
            
               
                <div class="taco-dato5" >
					<table class="tabla5" >
						
					<tr>
					<td class="celda">COSTO DE REVISIÓN</td>
					<td class="celda"><input type="text" name="revision" id="revision" class ="textbox1" value="<?php echo $revision?>" onChange="calcular()" required></td>
							
						
					</tr>
					<tr>
					<td class="celda">COSTO DEL SERVICIO </td>
					<td class="Celda"><input type="text" name="costo" id="costo" class ="textbox1" value="<?php echo $costo_servicio?>" onchange="calcular()" required></td>
						
					</tr>
				<tr>
					<td class="celda">COSTO DEL REPUESTO</td>
					<td class="celda"><input type="text" name="repuesto" id="repuesto" class ="textbox1" value="<?php echo $repuesto?>" onChange="calcular()" required></td>
						
					</tr>
					<tr>
					<td class="Celda">ADELANTO</td>
					<td class="celda"><input type="text" name="adelanto" id="adelanto" class ="textbox1" value="<?php echo $adelanto?>" onChange="calcular()" required></td>
						
					</tr>
						
					</table>
				
					
                </div>

               
        </div>
			<div class="taco-mPrincipal5" style="background-color: #4F4F4F;color:white">
            
               
                <div class="taco-dato10">
					<table class="tabla-cuenta" >
					<tr><td class="saldo">Saldo:</td>
						<td class="saldo1"><input type="label" name="saldo" id="saldo" value="<?php echo $saldo?>" readonly="readonly" class="saldo-caja">
						</td>
						</tr>
						<tr>
						<td class="total">Total:</td>
						<td class="total1"><input type="label" name="total" id="total" value="<?php echo $total?>" readonly="readonly" class="total-caja"></td></tr>
					</table>
				</form>
					
                </div>
        </div>
				<!--fin del formulario-->
			
			<div class="taco-mPrincipal4 taco-green" >
            
               
                
			<div class="container-fluid "> 
				<div class="table-responsive"   style="height: 100%;border: 0px">
			  <table class="table"  id="example" border="0" style="font-size: 12px;background-color:white;font-weight: bold">
			  	<thead>
				<tr style="background-color: #4F4F4F;color:white">
                
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
						$status_value="Anulado";
					}
					elseif($status==1){
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
				<td class="text-center"> <?php echo remove_junk($status_value); ?></td> 
				<td class="text-center"> <?php echo read_date($fecha); ?></td>  
		        <td class="text-center"> <?php echo $revision; ?></td>
				 <td class="text-center"> <?php echo $total; ?></td>
              
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

   


 
    

	
 
 
   
    <?php include ("./layouts/footer.php");?>
		

<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript" src="js/nueva_factura.js"></script>

		
		 
   
<script>
	$(document).ready(function() {

		$('#nombre_cliente').autocomplete({
			source: function(request, response){
				$.ajax({
					url:"./ajax/autocomplete/clientes.php",
					dataType:"json",
					data:{q:request.term},
					success: function(data){
						response(data);
					}

				});
			},
			minLength: 1,
			select: function(event,ui){
				event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#telefono').val(ui.item.telefono_cliente);
								$('#email').val(ui.item.email_cliente);
								$('#dni').val(ui.item.dni_cliente);
								$('#direccion').val(ui.item.direccion_cliente);
																
          
			}
		});
	

	});
	
					
	
	</script>		

</body></html>