<h1 class="title">Citas</h1>
<div class="btn-group">
    <a onclick="goBack()" type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="citas.php?action=create" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Detalle</th>
            <th>Estado</th>
            <th>Id Usuario</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_cita']; ?></th>
                <td><?php echo $dato['fecha']; ?></td>
                <td><?php echo $dato['detalle']; ?></td>
                <td><?php echo $dato['estado']; ?></td>
                <td><?php echo $dato['id_usuario']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="citas.php?action=update&id_cita=<?php echo $dato['id_cita']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="citas.php?action=delete&id_cita=<?php echo $dato['id_cita']; ?>"
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
<p>SE ENCONTRARON <?php echo $app->getCount();?> CITAS</p> 
    