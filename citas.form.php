<?php include __DIR__."/header.php"; 
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
$id_usuario = $_SESSION['id_usuario'];
$fecha = $_GET['fecha'];
$hora = $_GET['hora'];
?>
<div class="column is-12">
	<div class="title-bordered mb-5 is-flex is-align-items-center">
		<h1 class="h4">Ingresa la siguiente información</h1>
	</div>
</div>
<section class="section">
        <div class="container">
            <h1 class="title">Agendar Cita</h1>
            <form action="guardar.cita.php" method="post">
                <div class="field">
                    <label class="label">Fecha</label>
                    <div class="control">
                        <input class="input" type="date" name="fecha" value="<?php echo $fecha; ?>" readonly>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Hora</label>
                    <div class="control">
                        <input class="input" type="time" name="hora" value="<?php echo $hora; ?>" readonly>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Detalle</label>
                    <div class="control">
                        <textarea class="textarea" name="detalle" placeholder="Detalle de la cita"></textarea>
                    </div>
                </div>
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-primary">Agendar Cita</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php include __DIR__."/footer.php"; ?>
