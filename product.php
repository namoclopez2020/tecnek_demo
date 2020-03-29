<?php

$page_title = 'PROUCTOS VIGENTES';
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
   page_require_level(1);


  $products = join_product_table();
$all_sucursales=find_all('sucursales');


//capturar datos de la sucursal
$id_sucursal=$_SESSION['id_sucursal'];

  
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
	
		
		<div id="myModal" tabindex="-1"  aria-labelledby="myModalLabel">
			  <div  role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<a href="add_product.php" class="btn btn-primary">Agregar producto</a>
					
				  </div>
				  <div class="modal-body">
					<div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead >
                            <tr class="warning">
                     <th class="text-center" style="width: 50px;">#</th>
                <th> Imagen</th>
                <th> Descripción </th>
                <th class="text-center" style="width: 10%;"> Categoría </th>
                <th class="text-center" style="width: 10%;"> Stock </th>
                <th class="text-center" style="width: 10%;"> Precio de compra </th>
                <th class="text-center" style="width: 10%;"> Precio de venta </th>
				  
				   <th class="text-center" style="width: 10%;"> Sucursal </th>
                <th class="text-center" style="width: 10%;"> Agregado </th>
				  
                <th class="text-center" style="width: 100px;"> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                        	$sql="select p.quantity,p.id,p.date,p.codigo_producto,p.name as nombre_prod,p.buy_price,p.sale_price,p.media_id,p.categorie_id,p.id_sucursal,c.name as nombre_suc,s.nombre_sucursal from products as p inner join categories as c ON p.categorie_id=c.id inner join sucursales as s ON p.id_sucursal=s.id where p.id_sucursal=$id_sucursal ORDER BY p.id";

                           if ($query=$db->query($sql) ){
				while ($row=$db->fetch_array($query)){
					$id_producto=$row['id'];
					$fecha_agregado=$row['date'];
					$codigo_producto=$row['codigo_producto'];
					$nombre_producto=$row['nombre_prod'];
					$costo=$row['buy_price'];
					$precio_venta=$row["sale_price"];
					
					$imagen=$row['media_id'];
          $icono="SELECT file_name from media where id=$imagen";
          $jpg=$db->query($icono);
          foreach ($jpg as $img) {
            $imagen=$img['file_name'];
          }
					$id_categoria=$row['categorie_id'];
					$id_sucursal=$row['id_sucursal'];
					$categoria=$row['nombre_suc'];
					$sucursal=$row['nombre_sucursal'];
					
					$precio_venta=number_format($precio_venta,2);
					
					$stock=$row["quantity"];
					
					
					?>
					<tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td>
                  <?php if($imagen === '0'): ?>
                    <img class="img-thumbnail img-circle" style="height: 60px;width: 60px" src="uploads/products/no_image.jpg" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" style="height: 60px;width: 60px" src="uploads/products/<?php echo $imagen; ?>" alt="">
                <?php endif; ?>
                </td>
                <td> <?php echo remove_junk($nombre_producto); ?></td>
                <td class="text-center"> <?php echo remove_junk($categoria); ?></td>
                <td class="text-center"> <?php echo remove_junk($stock); ?></td>
                <td class="text-center"> <?php echo remove_junk($costo); ?></td>
                <td class="text-center"> <?php echo remove_junk($precio_venta); ?></td>
				
				  
				  
				<td bgcolor="<?php if($id_sucursal==4){echo "#95A5A6";}else{echo "blue";}?>"><font color="white"> <?php echo remove_junk($sucursal); ?></td>
				 
                <td class="text-center"> <?php echo read_date($fecha_agregado); ?></td>
				
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo (int)$id_producto;?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_product.php?id=<?php echo (int)$id_producto;?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
					  <a href="movimientos.php?id=<?php echo (int)$id_producto;?>" class="btn btn-warning btn-xs"  title="Historial" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-info-sign"></span>
                    </a>
                  </div>
                </td>
            </tr><?php }
        }?>
                          
                        </tbody>        
                       </table>                  
                    </div>
			  </div>
			</div>	
		</div>
	<hr>
	
	<?php include_once('layouts/footer.php'); ?>

  </body>
</html>