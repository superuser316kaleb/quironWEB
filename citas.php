<?php include __DIR__."/header.php"; ?>
<div class="column is-12">
	<div class="title-bordered mb-5 is-flex is-align-items-center">
		<h1 class="h4">Bienvenido al control de citas</h1>
	</div>
	<h2>Veterinarias</h2>
	<table class="table is-fullwidth">
		<thead>
		<tr>
			<td>Fecha Disponible</td>
			<td>Hora</td>
			<td>Veterinario</td>
			<td>Acción</td>
		</thead>
		<tbody>
		<tr>
			<td>2021-10-10</td>
			<td>10:00</td>
			<td>Dr. Juan Perez</td>
			<td><a href="citas.php?action=create" class="button is-info">Agendar</a></td>
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
			<td>2021-10-10</td>
			<td>10:00</td>
			<td>Juan Perez</td>
			<td><a href="citas.php?action=create" class="button is-info">Agendar</a></td>
		</tbody>
	</table>	
</div>
<?php include __DIR__."/footer.php"; ?>
