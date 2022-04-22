<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates2/cabecera.php';
?>
<br>
<?php if($mensaje!="") { ?>

		<div class="alert alert-success">
			<?php echo $mensaje; ?>

			<a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>

		</div>
<?php } ?>

		<div class="row">
            <?php
            	$setencia=$pdo->prepare("select * from tblproductos");
				$setencia->execute();
				$listaproductos=$setencia->fetchAll(PDO::FETCH_ASSOC);		
			?>
			<?php foreach ($listaproductos as $producto) { ?>

				<div class="col-3">
			     <div class="card">
				<img 
				title="<?php echo $producto ['Nombre'];?>" 
				alt="<?php echo $producto ['Nombre'];?>" 
				class="card-img-top" 
				src="<?php echo $producto ['imagen'];?>"
				data-toggle="popover"
				data-trigger="hover"
				data-content="<?php echo $producto ['descripcion'];?>"
				height="317px"
				>
				      <div class="card-body">
					    <span><?php echo $producto ['Nombre'];?></span>
					    <h5 class="card-title">$<?php echo $producto ['precio'];?></h5>
					    <p class="card-text">Descripcion</p>

					    <form action="" method="post">

	<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto ['Id'],COD,KEY);?>">
	<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto ['Nombre'],COD,KEY);?>">
	<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto ['precio'],COD,KEY);?>">
	<input type="hidden" name="cantidad" name="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">

					    	<button class="btn btn-primary" 
					    name="btnAccion" 
					    value="Agregar" 
					    type="submit">
						Agregar al carrito
					      </button>
					    </form>
					    
				     </div>
			     </div>				
			</div>
		    <?php } ?>
			
		</div>
	</div>
	<script>
		$(function () {
        $('[data-toggle="popover"]').popover()
         });
	</script>
 <?php
 include 'templates2/pie.php';
 ?>