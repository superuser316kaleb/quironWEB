<?php 
include __DIR__.'/header.php';
include (__DIR__.'/gestion/producto.class.php');

//print_r($_SESSION);
if(isset($_SESSION['validado'])){
    if($_SESSION['validado']){
        $carrito=array();
        if(isset($_SESSION['cart'])){
            $carrito = $_SESSION['cart'];
        }
$web = new Producto;
$total=0;
foreach($carrito as $id_producto=>$cantidad):
    $dato = $web->getOne($id_producto);
    $subtotal=$cantidad*$dato['precio'];
    $total+=$subtotal;
    echo $dato['nombre']." cantidad: $cantidad" ."<br>";
    endforeach;
?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">
      <h1>Checkout</h1>
        <h3>Total: <?php echo "$".$total;  ?> </h3>
        <form action="transaccion.php" method="post">
        <div data-mdb-input-init class="form-outline mb-5">
            <label class="form-label">Número de tarjeta</label>
            <input name="tarjeta" type="text" class="form-control form-control-lg" size="17"
             minlength="19" maxlength="19" />
        </div>
        <div data-mdb-input-init class="form-outline mb-5">
            <label class="form-label">Nombre de la tarjeta</label>
            <input name="nombre" type="text" class="form-control form-control-lg" size="17"
              />
        </div>
        <div data-mdb-input-init class="form-outline mb-5">
            <label class="form-label">Fecha de Expiración </label>
            <input name="fecha" placeholder="MM/AA" type="text" class="form-control form-control-lg" size="10"
             minlength="5" maxlength="5" />
        </div>
        <div data-mdb-input-init class="form-outline mb-5">
            <label class="form-label">CVV</label>
            <input name="cvv" placeholder="xxx" type="number" class="form-control form-control-lg" size="5"
             minlength="3" maxlength="3" />
        </div>
    </div>
    </div>
 
    <a href="productos.php" class="btn btn-danger">Cancelar y seguir comprando</a>
    <br>
    <input type="submit" class="btn btn-success" name="transaccion" value="Confirmar Pago"/>
  </form>

  </div>
</section>              

<?php
    }else{
        header("Location: login.php");
    }
}else{
    header("Location: login.php");
}
?>