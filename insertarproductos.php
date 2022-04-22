<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates2/cabecera.php';


 if (isset($_POST['boton'])) {
	$NOMBRE=$_POST['nombre'];
	$PRECIO=$_POST['precio'];
	$DESCRIPCION=$_POST['descripcion'];
	$IMAGEN=$_POST['imagen'];

	#echo "$NOMBRE $PRECIO $DESCRIPCION $IMAGEN";
	
	$servername="localhost";
	$database="tienda2";
	$username="root";
	$password="";
	
	$conn=mysqli_connect($servername,$username,$password,$database);
	
	if (!$conn) {
		die("Conexion Fallida:".mysqli_connect_error());
	}
	$sql="INSERT INTO tblproductos (Nombre,precio,descripcion,imagen) 
	values ('$NOMBRE','$PRECIO','$DESCRIPCION','$IMAGEN')";
	#echo $sql;
	$RESULTADO=mysqli_query($conn,$sql);		
	
	mysqli_close($conn);
	echo "<h3>Se a agregado exitosamente</h3>";
}else{
	echo "<h3>Error al agregar</h3>";
}
?> 
