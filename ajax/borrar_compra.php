<?php
	require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   
	if (isset($_GET['id'])  ){
		if(page_require_level(1)){
		$numero_factura=intval($_GET['id']);
		$del1="delete from compras where numero_compra='".$numero_factura."'";
		$del2="delete from detalle_compra where num_compra='".$numero_factura."'";
	   
		if ($delete1=$db->query($del1) and $delete2=$db->query($del2) ){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puedo eliminar los datos
			</div>
			<?php
			
		}
		}else{
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No tienes permiso para eliminar boletas
			</div>
			<?php
			
		}
	}

	?>