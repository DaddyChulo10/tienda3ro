<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates2/cabecera.php';
?>

<?php
if ($_POST) {
	$total=0;
	$SID=session_id();
	$Correo=$_POST['email'];

	foreach ($_SESSION['CARRITO'] as $indice=>$producto){

		$total=$total+($producto['PRECIO']*$producto["CANTIDAD"]);
	}
	$sentencia=$pdo->prepare("INSERT INTO 'tblventas'
		('ID','ClaveTransaccion','DatosP','Fecha','Correo','Total','status') values
	    (NULL,:ClaveTransaccion, '',NOW(),:Correo,:Total, 'pendiente');"); 

	$sentencia->bindParam(":ClaveTransaccion",$SID);
	$sentencia->bindParam(":Correo",$Correo);
	$sentencia->bindParam(":Total",$total);
	$sentencia->execute();
	$idVenta=$pdo->lastInsertId();


	echo "<h3>Total a pagar ".$total."</h3>";
}
 ?>
<?php
 include 'templates2/pie.php';
 ?>