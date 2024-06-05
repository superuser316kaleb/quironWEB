<?php 
include (__DIR__.'/header.php');
?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black"> Carrito de Compras</h3>
          <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                  class="fas fa-angle-down mt-1"></i></a></p>
          </div>
        </div>
<?php
include (__DIR__.'/gestion/producto.class.php');
$carrito=array();
if(isset($_SESSION['cart'])){
    $carrito = $_SESSION['cart'];
}
$web = new Producto;
$total=0;
foreach($carrito as $id_producto=>$cantidad):
    echo "Cantidad: $cantidad";
    $dato = $web->getOne($id_producto);
    $subtotal=$cantidad*$dato['precio'];
    $total+=$subtotal;
?>



        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
              <figure class="image is-128x128">
                <img 
                  src="images/productos/<?php echo $dato['fotografia']; ?>" >
              </div>
                </figure>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?php echo $dato['nombre'];?></p>
                <p><span class="text-muted">Marca: </span> <?php echo $dato['nombre'];?> <span class="text-muted"> </span>Grey</p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                  <i class="fas fa-minus"></i>
                </button>

                <input id="form1" min="0" name="quantity" value="" type="number"
                  class="form-control form-control-sm" />

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?php echo $dato['precio']; ?></h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>





<?php 
endforeach; 
echo "<h3>". "Total: $total $" ."</h3>";
?>
<a href="checkout.php" class="btn btn-primary">Pagar</a>
      </div>
    </div>
  </div>
</section>