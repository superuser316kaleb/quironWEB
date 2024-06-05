<h1 class="title">Mascotas</h1>
<div class="btn-group">
    <a onclick="goBack()" type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="mascotas.php?action=create" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre de la Mascota</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Sexo</th>
            <th>Color</th>
            <th>No. Identificación</th>
            <th>Microchip</th>
            <th>Tatuaje</th>
            <th>Chip</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_mascota']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['especie']; ?></td>
                <td><?php echo $dato['raza']; ?></td>
                <td><?php echo $dato['sexo']; ?></td>
                <td><?php echo $dato['color']; ?></td>
                <td><?php echo $dato['no_identificacion']; ?></td>
                <td><?php echo $dato['microchip']; ?></td>
                <td><?php echo $dato['tatuaje']; ?></td>
                <td><?php echo $dato['microchip']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="mascotas.php?action=update&id_mascota=<?php echo $dato['id_mascota']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="mascotas.php?action=delete&id_mascota=<?php echo $dato['id_mascota']; ?>"
                         class="button is-danger is-inverted">
                         <span>Eliminar</span>
                         <span class="icon is-small">
                            <i class="fas fa-times"></i>
                         </span>
                         </a>
                         <a type="button" href="historiales.php?action=getAll&id_mascota=<?php echo $dato['id_mascota']; ?>"
                        class="button is-ghost">Historial</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>  
<p>SE ENCONTRARON <?php echo $app->getCount();?> MARCAS</p> 
    