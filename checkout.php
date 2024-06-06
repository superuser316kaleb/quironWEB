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
<section class="section" style="background-color: #eee;">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-8">
        <h1 class="title">Checkout</h1>
        <h3 class="subtitle">Total: <?php echo "$" . number_format($total, 2); ?></h3>
        <form action="transaccion.php" method="post">
          <div class="field">
            <label class="label">Número de tarjeta</label>
            <div class="control">
              <input name="tarjeta" type="text" class="input" size="17" minlength="19" maxlength="19" placeholder="1234 5678 9012 3456" required>
            </div>
          </div>
          <div class="field">
            <label class="label">Nombre en la tarjeta</label>
            <div class="control">
              <input name="nombre" type="text" class="input" size="17" placeholder="Nombre del titular" required>
            </div>
          </div>
          <div class="field">
            <label class="label">Fecha de Expiración</label>
            <div class="control">
              <input name="fecha" type="text" class="input" size="10" minlength="5" maxlength="5" placeholder="MM/AA" required>
            </div>
          </div>
          <div class="field">
            <label class="label">CVV</label>
            <div class="control">
              <input name="cvv" type="number" class="input" size="5" minlength="3" maxlength="3" placeholder="123" required>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button type="submit" class="button is-success" name="transaccion">Confirmar Pago</button>
            </div>
            <div class="control">
              <a href="productos.php" class="button is-danger">Cancelar y seguir comprando</a>
            </div>
          </div>
        </form>
      </div>
    </div>
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