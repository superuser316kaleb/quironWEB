<h1 class="title">Veterinarios</h1>
<div class="btn-group">
    <a type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="veterinarios.php?action=create" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Primer Apelldio</th>
            <th>Segundo Apelldio</th>
            <th>Número telefonico</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_veterinario']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['primer_apellido']; ?></td>
                <td><?php echo $dato['segundo_apellido']; ?></td>
                <td><?php echo $dato['numero_telefonico']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="veterinarios.php?action=update&id_veterinario=<?php echo $dato['id_veterinario']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="veterinarios.php?action=delete&id_veterinario=<?php echo $dato['id_veterinario']; ?>"
                         class="button is-danger is-inverted">
                         <span>Eliminar</span>
                         <span class="icon is-small">
                            <i class="fas fa-times"></i>
                         </span>
                         </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>  
<p>SE ENCONTRARON <?php echo $app->getCount();?> VETERINARIOS</p> 
    