<?php
  ob_start();
$page_title="Inicio de sesion";
  require_once('includes/load.php');
  page_require_level(3);
  $all_sucursales=find_all('sucursales');
 // if($session->isUserLoggedIn(true)) { redirect('admin.php', false);}
?>
 <?php include_once('layouts/header.php'); ?>

<div class="container-fluid" >
<div class="login-page">
	
	<div class="login-page2">
    <div class="text-center" >
       <h1>Elegir sucursal de trabajo</h1>
       <p>Seleccione una opción </p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth2.php" class="clearfix">
        <div class="form-group">
                    <select class="form-control" name="sucursal" required>
                      <option value="">Selecciona una sucursal</option>
                    <?php  foreach ($all_sucursales as $suc): ?>
                      <option value="<?php echo $suc['id'] ?>">
                        <?php echo $suc['nombre_sucursal'] ?></option>
                    <?php endforeach; ?>
                    </select>
          </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Aceptar</button>
        </div>
		  </div>
    </form>

</div>

	</div>
<?php include_once('layouts/footer.php'); ?>
