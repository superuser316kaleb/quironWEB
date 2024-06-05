<h1 class="title">Productos</h1>
<div class="btn-group">
    <a onclick="goBack()" type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="productos.php?action=create" class="button is-primary">Nuevo</a>
    <a type="button" href="reportes.php?action=productos" class="button is-warning">Reporte</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Costo</th>
            <th>Categoria</th>
            <th>Fotografia</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_producto']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['marca']; ?></td>
                <td><?php echo $dato['descripcion']; ?></td>
                <td><?php echo $dato['precio']; ?></td>
                <td><?php echo $dato['costo']; ?></td>
                <td><?php echo $dato['categoria'];?></td>
                <td><?php echo $dato['fotografia'];?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="productos.php?action=update&id_producto=<?php echo $dato['id_producto']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="productos.php?action=delete&id_producto=<?php echo $dato['id_producto']; ?>"
                         class="button is-danger is-inverted">
                         <span>Eliminar</span>
                         <span class="icon is-small">
                            <i class="fas fa-times"></i>
                         </span>
                         </a>
                         <a type="button" href="inventarios.php?action=getAll&id_producto=<?php echo $dato['id_producto']; ?>"
                        class="button is-ghost">Inventario</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>  
<p>SE ENCONTRARON <?php echo $app->getCount();?> PRODUCTOS</p> 
    