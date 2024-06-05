<a href="inventarios.php?action=getAll&id_producto=<?php echo $datos[0]['id_producto']; ?>">
<h1 class="title">Inventario de <?php echo (isset($datos[0]['nombre'])?$datos[0]['nombre']:''); ?></h1>
</a>
<div class="btn-group">
    <a onclick="goBack()"  type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="inventarios.php?action=create&id_producto=<?php echo $datos[0]['id_producto']; ?>" 
    class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Producto</th>
            <th>Existencias</th>
            <th>Fecha de actualización</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_inventario']; ?></th>
                <th><?php echo $dato['nombre']; ?></th>
                <td><?php echo $dato['existencia']; ?></td>
                <td><?php echo $dato['fecha_actualizacion']; ?></td>
                <?php endforeach; ?>
                <td>
                    <div class="btn-group">
                        <a type="button" href="inventarios.php?action=update&id_inventario=<?php echo $dato['id_inventario']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                    </div>
                </td>
            </tr>
    </tbody>
</table>  
<p>SE ENCONTRARON <?php echo $app->getCount();?> INVENTARIOS DE ESTE PRODUCTO</p> 
    