<?php
  ob_start();
$page_title="Inicio de sesion";
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('admin.php', false);}
?>
 <?php include_once('layouts/header.php'); ?>

<div class="container-fluid" >
<div class="login-page">
	<div class="login-page1" align="center">
		
	</div>
	<div class="login-page2">
    <div class="text-center" >
       <h1>Bienvenido</h1>
       <p>Iniciar sesión </p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label" style="color:white">Usuario</label>
              <input type="name" class="form-control" name="username" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label" style="color:white">Contraseña</label>
            <input type="password" name= "password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Entrar</button>
        </div>
		  </div>
    </form>

</div>

	</div>
<?php include_once('layouts/footer.php'); ?>
