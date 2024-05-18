<h1 class="title">Marcas</h1>
<div class="btn-group">
    <a type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="marcas.php?action=create" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre de la Marca</th>
            <th>Logo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_marca']; ?></th>
                <td><?php echo $dato['marca']; ?></td>
                <td><?php echo $dato['fotografia']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="marcas.php?action=update&id_marca=<?php echo $dato['id_marca']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="marcas.php?action=delete&id_marca=<?php echo $dato['id_marca']; ?>"
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
<p>SE ENCONTRARON <?php echo $app->getCount();?> MARCAS</p> 
    