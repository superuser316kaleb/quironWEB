<?php 
include (__DIR__.'/header.php');
?>
<section class="section" style="background-color: #eee;">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-10">
        
        <div class="columns is-vcentered mb-4">
          <div class="column">
            <h3 class="title is-4">Carrito de Compras</h3>
          </div>
          <div class="column has-text-right">
            <p class="mb-0"><span class="has-text-grey">Ordenar por:</span> <a href="#!" class="has-text-black">precio <i class="fas fa-angle-down"></i></a></p>
          </div>
        </div>

        <?php
        include (__DIR__.'/gestion/producto.class.php');
        $carrito = array();
        if (isset($_SESSION['cart'])) {
          $carrito = $_SESSION['cart'];
        }
        $web = new Producto;
        $total = 0;
        foreach ($carrito as $id_producto => $cantidad):
          $dato = $web->getOne($id_producto);
          $subtotal = $cantidad * $dato['precio'];
          $total += $subtotal;
        ?>

        <div class="card mb-4">
          <div class="card-content">
            <div class="columns is-vcentered">
              <div class="column is-2">
                <figure class="image is-128x128">
                  <img src="images/productos/<?php echo $dato['fotografia']; ?>" alt="<?php echo $dato['nombre']; ?>">
                </figure>
              </div>
              <div class="column is-3">
                <p class="title is-6"><?php echo $dato['nombre']; ?></p>
                <p><span class="has-text-grey">Descripción:</span> <?php echo $dato['descripcion']; ?></p>
              </div>
              <div class="column is-3">
                <div class="field has-addons">
                  <p class="control">
                    <button class="button is-link is-light" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fas fa-minus"></i>
                    </button>
                  </p>
                  <p class="control">
                    <input class="input" type="number" name="quantity" value="<?php echo $cantidad; ?>" min="0">
                  </p>
                  <p class="control">
                    <button class="button is-link is-light" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fas fa-plus"></i>
                    </button>
                  </p>
                </div>
              </div>
              <div class="column is-2">
                <h5 class="title is-5"><?php echo '$' . number_format($dato['precio'], 2); ?></h5>
              </div>
              <div class="column is-1 has-text-right">
                <a href="#!" class="has-text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>

        <?php endforeach; ?>
        
        <div class="columns">
          <div class="column has-text-right">
            <h3 class="title is-4">Total: $<?php echo number_format($total, 2); ?></h3>
            <a href="checkout.php" class="button is-link">Pagar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
