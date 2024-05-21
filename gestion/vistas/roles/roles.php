<h1 class="title">Role(s) <?php echo $datos[0]['nombre']; ?> </h1>
<div class="btn-group">
    <a type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="usuarios.rol.php?action=create&id_usuario=<?php echo $datos[0]['id_usuario']; ?>" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre del Rol</th>
            <th>Nombre usuario</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_rol']; ?></th>
                <td><?php echo $dato['rol']; ?></td>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['correo']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="usuarios.rol.php?action=update&id_rol=<?php echo $dato['id_rol']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="usuarios.rol.php?action=delete&id_rol=<?php echo $dato['id_rol']; ?>"
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
<p>SE ENCONTRARON <?php echo $app->getCount();?> ROLES DE ESTE USUARIO</p> 
    