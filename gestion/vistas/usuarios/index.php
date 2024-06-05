<h1 class="title">Usuarios</h1>
<div class="btn-group">
    <a onclick="goBack()" type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="usuarios.php?action=create" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Correo</th>
            <th>Número Telefónico</th>
            <th>Dirección</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_usuario']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['primer_apellido']; ?></td>
                <td><?php echo $dato['segundo_apellido']; ?></td>
                <td><?php echo $dato['correo']; ?></td>
                <td><?php echo $dato['numero_telefonico']; ?></td>
                <td><?php echo $dato['direccion']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="usuarios.php?action=update&id_usuario=<?php echo $dato['id_usuario']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="usuarios.php?action=delete&id_usuario=<?php echo $dato['id_usuario']; ?>"
                         class="button is-danger is-inverted">
                         <span>Eliminar</span>
                         <span class="icon is-small">
                            <i class="fas fa-times"></i>
                         </span>
                         </a>
                         <a type="button" href="usuarios.rol.php?action=getAll&id_usuario=<?php echo $dato['id_usuario']; ?>"
                        class="button is-ghost">Rol</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>  
<p>SE ENCONTRARON <?php echo $app->getCount();?> USUARIOS</p> 
    