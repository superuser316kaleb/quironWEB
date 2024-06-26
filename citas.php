<?php include __DIR__."/header.php"; 
include __DIR__."/gestion/fechas.v.class.php"; 
include __DIR__."/gestion/fechas.p.class.php"; 
$sistema = new Fechasv();
$sistema2 = new Fechasp();
$veterinarios = $sistema->getAllFront();
$peluqueros = $sistema2->getAllFront();
?>
<script>
  function mostrarMensaje() {
    alert("Por favor, inicie sesión primero.");
  }
</script>
<div class="column is-12">
	<div class="title-bordered mb-5 is-flex is-align-items-center">
		<h1 class="h4">Bienvenido a la agenda de citas</h1>
	</div>
	<h2>Veterinarios</h2>
	<table class="table is-fullwidth">
		<thead>
		<tr>
			<td>Fecha Disponible</td>
			<td>Hora</td>
			<td>Veterinario</td>
			<td>Acción</td>
		</thead>
		<tbody>
		<?php foreach($veterinarios as $veterinario): ?>
		<tr>
			<td><?php echo $veterinario['fecha'] ?></td>
			<td><?php echo $veterinario['hora'] ?></td>
			<td><?php echo $veterinario['nombre'] ?></td>	
			<td><?php if(isset($_SESSION['id_usuario'])): ?>
              <a href="citas.form.php?fecha=<?php echo $veterinario['fecha'],'&hora='.$veterinario['hora']; ?>" class="button is-info">Agendar</a>
            <?php else: ?>
              <button class="button is-warning" onclick="mostrarMensaje()">Agendar</button>
            <?php endif; ?></td>
			<?php endforeach; ?>
		</tbody>
	</table>	
	<h2>Peluquería</h2>
	<table class="table is-fullwidth">
		<thead>
		<tr>
			<td>Fecha Disponible</td>
			<td>Hora</td>
			<td>Peluquero</td>
			<td>Acción</td>
		</thead>
		<tbody>
		<?php foreach($peluqueros as $peluquero): ?>
		<tr>
			<td><?php echo $peluquero['fecha']; ?></td>
			<td><?php echo $peluquero['hora']; ?></td>
			<td><?php echo $peluquero['nombre']; ?></td>
			<td><?php if(isset($_SESSION['id_usuario'])): ?>
              <a href="citas.form.php?fecha=<?php echo $peluquero['fecha'],'&hora='.$peluquero['hora']; ?>" class="button is-info">Agendar</a>
            <?php else: ?>
              <button class="button is-warning" onclick="mostrarMensaje()">Agendar</button>
            <?php endif; ?></td>
			<?php endforeach; ?>
		</tbody>
	</table>	
</div>
<?php include __DIR__."/footer.php"; ?>
