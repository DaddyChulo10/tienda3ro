<?php
session_start();

$mensaje="";

 if (isset($_POST['btnAccion'])) {
 	switch ($_POST['btnAccion']){

        case 'Agregar':

        if (is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) {
				$ID=openssl_decrypt($_POST['id'],COD,KEY);
				$mensaje.="OK ID CORRECTO".$ID;
		     	}else{
				     $mensaje.="Upss... ID INCORRECTO".$ID;	
				}

				if (is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
					$NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
					$mensaje.="OK precio".$NOMBRE;
				}else{$mensaje.="Upss... Algo pasa con el nombre"; break;}


				if (is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))) {
					$CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
					$mensaje.="OK precio".$CANTIDAD;
				}else{ $mensaje.="Upss... algo pasa con la cantidad"; break;}


				if (is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))) {
					$PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
					$mensaje.="OK precio".$PRECIO;
				}else{$mensaje.="Upss... algo pasa con el precio"."<br/>"; break;}

				if(!isset($_SESSION['CARRITO'])){
					$producto=array(
					'ID'=>$ID,
					'NOMBRE'=>$NOMBRE,
					'CANTIDAD'=>$CANTIDAD,
					'PRECIO'=>$PRECIO
					);
					$_SESSION['CARRITO'][0]=$producto;
					$mensaje="Juego agregado al carrito";
				}else{

                     $idProducto=array_column($_SESSION['CARRITO'],"ID");
					if (in_array($ID,$idProducto)){
						 echo "<script>alert('El juego ya fue agrego...');</script>";
						 $mensaje="";
						 }else{
					  $NumeroProductos=count($_SESSION['CARRITO']);
					  $producto=array(
					  'ID'=>$ID,
					  'NOMBRE'=>$NOMBRE,
					  'CANTIDAD'=>$CANTIDAD,
					  'PRECIO'=>$PRECIO
					  );

					  $_SESSION['CARRITO'][$NumeroProductos]=$producto;
					  $mensaje= "El juego se a agregado al carrito";
                    }              
				}
				#$mensaje= print_r( $_SESSION,true);
				
 		break;

 		case 'Eliminar':
 		if (is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) {
				$ID=openssl_decrypt($_POST['id'],COD,KEY);

				foreach ($_SESSION['CARRITO'] as $indice=>$producto) {
					if ($producto['ID']==$ID) {
						unset($_SESSION['CARRITO'][$indice]);
						echo "<script>alert('Elemento borrado...');</script>";
					}
				}
				

		     	}else{
				     $mensaje.="Upss... ID INCORRECTO".$ID;	
				}
 			break;

 	}
	
}
?>