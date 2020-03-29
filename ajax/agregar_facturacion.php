<?php
	
require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
 $products = find_all('products'); 
$categorias=find_all('categories');
$session_id=$_SESSION['user_id'];

if (isset($_POST['id'])){$id=$_POST['id'];}

if (isset($_POST['cantidad']))
{
$cantidad=$_POST['cantidad'];
	
		foreach($products as $pro)
		{
			if($pro['id']==$id){
			$precio=$pro['sale_price'];
			
			}
		}
			$precio=$_POST['precio_venta'];
			$precio_venta=$cantidad*$precio;
		
	}


if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
$insert_tmp=$db->query("INSERT INTO tmp (id_producto,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	
$delete=$db->query("DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
}

?>
<div class="table-responsive">
<table class="table" style="">
<tr>
	<th class='text-center'>CODIGO</th>
	<th class='text-center'>CANT.</th>
	<th>DESCRIPCION</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=$db->query("select * from products, tmp where products.id=tmp.id_producto and tmp.session_id='".$session_id."'");
	while ($row=$db->fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['name'];

	
	$precio_venta=$row['precio_tmp'];
	$sumador_total+=$precio_venta;
		?>
		<tr>
			<td class='text-center'><?php echo $codigo_producto;?></td>
			<td class='text-center'><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td class='text-right'><?php echo $precio_venta/$cantidad;?></td>
			<td class='text-right'><?php echo $precio_venta;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	
	$total_factura= number_format($sumador_total,2,'.','');
	$total_iva=($total_factura * 18 )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$subtotal=$total_factura-$total_iva;

?>
<tr>
	<td class='text-right' colspan=4>SUBTOTAL S/.</td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>	
	<td class='text-right' colspan=4>IGV (<?php echo "18"?>)% S/.</td>
	<td class='text-right'><?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>TOTAL S/.</td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>
</div>
</form>
