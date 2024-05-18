<h1 class="title">Privilegios</h1>
<div class="btn-group">
    <a type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="privilegios.php?action=create" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre del Privilegio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_privilegio']; ?></th>
                <td><?php echo $dato['privilegio']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="privilegios.php?action=update&id_privilegio=<?php echo $dato['id_privilegio']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="privilegios.php?action=delete&id_privilegio=<?php echo $dato['id_privilegio']; ?>"
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
<p>SE ENCONTRARON <?php echo $app->getCount();?> PRIVILEGIOS</p> 
    