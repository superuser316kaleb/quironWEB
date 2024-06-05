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
                            <img loading="lazy" src="images/productos/<?php echo $producto['fotografia'];?>" class="image" alt="post-thumb" style="height:200px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="column is-8-tablet">
                        <h3 class="h5"><a class="post-title" href="post-elements.html"><?php echo $producto['nombre'];?></a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item">Existencias: <?php echo $producto['existencias'];?></li>
                            <li class="list-inline-item">Categoría: <a href="#!" class="ml-1"><?php echo $producto['categoria'];?></a></li>
                        </ul>
                        <p><?php echo $producto['descripcion'];?></p> 
                        <p class="has-text-weight-bold is-size-4">Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                        <button class="button is-link is-outlined" onclick="openModal(<?php echo $producto['id_producto']; ?>)">Comprar</button>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="productModal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Seleccione la cantidad</p>
      <button class="delete" aria-label="close" onclick="closeModal()"></button>
    </header>
    <section class="modal-card-body">
      <form id="purchaseForm" action="cart.add.php" method="get">
        <input type="hidden" id="productId" name="id_producto">
        <div class="field">
          <label class="label">Cantidad</label>
          <div class="control">
            <input class="input" type="number" name="cantidad" min="1" required>
          </div>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" onclick="submitForm()">Confirmar</button>
      <button class="button" onclick="closeModal()">Cancelar</button>
    </footer>
  </div>
</div>


<script>
function openModal(productId) {
  document.getElementById('productId').value = productId;
  document.getElementById('productModal').classList.add('is-active');
}

function closeModal() {
  document.getElementById('productModal').classList.remove('is-active');
}

function submitForm() {
  document.getElementById('purchaseForm').submit();
}
</script>


<?php include __DIR__."/footer.php"; ?>
