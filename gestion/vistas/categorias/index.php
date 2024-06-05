<h1 class="title">Categorías</h1>
<div class="btn-group">
    <a onclick="goBack()" type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="categorias.php?action=create" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre de la Categoría</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_categoria']; ?></th>
                <td><?php echo $dato['categoria']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="categorias.php?action=update&id_categoria=<?php echo $dato['id_categoria']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="categorias.php?action=delete&id_categoria=<?php echo $dato['id_categoria']; ?>"
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
<p>SE ENCONTRARON <?php echo $app->getCount();?> CATEGORÍAS</p> 
    