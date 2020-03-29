﻿<?php
  $page_title = 'Agregar producto';
  require_once('includes/load.php');
  // Checkear nivel de permiso para esta pagina
  page_require_level(1);
  $all_categories = find_all('categories');
  $all_sucursales=find_all('sucursales');
  $all_providers= find_all('proveedor');
  $all_photo = find_all('media');
 $products = join_product_table();

?>
<head>
  <?php include ("./layouts/header.php");?>
    
  </head>
<body>
    
    <header>
    <?php include ("./layouts/nav.php");?>
  </header>
  <div class ="container-fluid" style="padding-top: 60px;">
<div class="row">
  <div  id="resu" class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar producto</span>
         </strong>
        </div>
		  <!-- formulario general -->
		  
        <div class="panel-body" id="padre">
         <div class="col-md-12">
          <form method="post" id="agregar_productos" name="agregar_productos" method="POST"  class="clearfix" >
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" id="product-title" placeholder="Descripcion" required>
               </div>
              </div>
			  
			  
              <div class="form-group">
                <div class="row">
					<div class="col-md-6">
                    <select class="form-control" name="product-provider" required>
                      <option value="">Selecciona un proveedor</option>
                    <?php  foreach ($all_providers as $pro): ?>
                      <option value="<?php echo $pro['idproveedor'] ?>">
                        <?php echo $pro['nombre'] ?></option>
                    <?php endforeach; ?>
                    </select>
					</div>
                  
                  <div class="col-md-6">
                    <select class="form-control" name="product-photo" >
                      <option value="">Selecciona una imagen</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
			  <div class="form-group">
                <div class="row">
					
                  
					<div class="col-md-6">
                    <select class="form-control" name="product-sucursal" required>
                      <option value="">Selecciona una sucursal</option>
                    <?php  foreach ($all_sucursales as $suc): ?>
                      <option value="<?php echo $suc['id'] ?>">
                        <?php echo $suc['nombre_sucursal'] ?></option>
                    <?php endforeach; ?>
                    </select>
					</div>
					
					<div class="col-md-6">
                    <select class="form-control" name="categoria" id="categoria" onchange="load()" required>
                      <option value="">Selecciona una categoria</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo $cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
					</div>
                </div>
				  
              </div>

			  <div class="resultados" id="resultados"> <!--cambio de formulario segun tipo-->
			 
			  </div>
			  
			  
              <button type="submit" name="add_product" class="btn btn-danger">Agregar producto</button>
          </form>
         </div>
        </div>
		  <!-- formulario de formulario -->
		
		  
		  
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); 


?>

<script type="text/javascript" src="js/formulario_ingreso.js"></script>