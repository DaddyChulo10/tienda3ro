<?php
include 'global/config.php';
include 'global/conexion.php';
include 'templates2/cabecera.php';
?>
<br>
<h3>Insertar juegos chidos</h3>

<form action="insertarproductos.php" method="post">

	<table class="table table-light table-bordered">
      <tbody>
      	<tr>
      		<td>
      		<label>Nombre del juego</label>	
      		</td>
      		<td>
      		<input type="texto" name="nombre" required>	
      		</td>
      	</tr>
      	    
      	<tr>
      		<td>
      		    <label>Precio del Juego</label>	
      		</td>
      		<td>
      		    <input type="texto" name="precio" required>	
      		</td>
      	</tr>
      	<tr>
      		<td>
      		    <label>Descripcion del Juego</label>	
      	    </td>
      	    <td>	
      	    	<input type="texto" name="descripcion"required>
      		</td>
      	</tr>
      	<tr>
      		<td>
      			<label>Imagen del juego("./img/''Nombre''.jpg")</label>	
      	    </td>
      	    <td>
      	    	<input type="texto" name="imagen"  placeholder="./img/''Nombre''.jpg" required>
      		</td>
      	</tr>
      	<tr>
      		<td>
      			
      			<button  
					    name="boton"  
					    type="submit">
						Añadir juego
					      </button>
      		</td>
      	</tr>
      </tbody>
	</table>					     
</form>
<?php
 include 'templates/pie.php';
 ?>