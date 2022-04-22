<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
<br>

<form action="validar.php" method="post" enctype="application/x-www-form-urlencoded">
	<label for="caja1"> <p>Nombre del Usuario</p>
	<p><input type="text" id="caja1" name="usuario" placeholder="usuario!" required></p>
	</label>
	<label for="caja2">
		<p>Contraseña</p> <p> <input type="password" id="caja2" name="password" placeholder="Contraseña!" required></p>
	</label>
	<input type="submit" value="Iniciar sesion">
</form>

  <p>O mas Bien:</p>
    <button onclick="registrar()">Registrarse</button>
    <script type="text/javascript">
    function registrar(){
        window.location="registrar.php";
    }
    </script>

 <?php
 include 'templates/pie.php';
 ?>