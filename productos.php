<?php
include __DIR__."/header.php"; 
include __DIR__."/gestion/producto.class.php"; 
$sistema = new Producto();
$productos = $sistema->getAll();
?>
<section class="section">
	<div class="container">
		<div class="columns is-multiline">
			<div class="column is-12">
			<?php foreach($productos as $producto):?>
				<article class="columns is-multiline is-justify-content-center mb-6">
					<div class="column is-4-tablet">
						<div class="post-slider slider-sm">
							<img loading="lazy" src="images/productos/<?php echo $producto['fotografia'];?> " class="" alt="post-thumb" style="height:200px; object-fit: cover;">
						</div>
					</div>
					<div class="column is-8-tablet">
						<h3 class="h5"><a class="post-title" href="post-elements.html"> <?php echo $producto['nombre'];?> </a></h3>
						<ul class="list-inline post-meta mb-2">
							<li class="list-inline-item">Existencias:</li>
							<li class="list-inline-item">Categoría: <a href="#!" class="ml-1"><?php echo $producto['categoria'];?>  </a>
							</li>
						</ul>
						<p><?php echo $producto['descripcion'];?> </p> 
						<a href="post-elements.html" class="btn btn-outline-primary">Comprar</a>
					</div>
					<?php endforeach; ?>
				</article>
			</div>
		</div>
	</div>
</section>
<?php include __DIR__."/footer.php"; ?>
