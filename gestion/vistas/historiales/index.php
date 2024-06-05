<a href="historiales.php?action=getAll&id_mascota=<?php echo $datos[0]['id_mascota'];   ?>">
<h1 class="title">Historiales de <?php echo (isset($datos[0]['nombre'])?$datos[0]['nombre']:''); ?></h1>
</a>
<div class="btn-group">
    <a type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="historiales.php?action=create&id_mascota=<?php echo (isset($datos[0]['id_mascota'])?$datos[0]['id_mascota']:$_GET['id_mascota']); ?>" 
    class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Mascota</th>
            <th>Tratamiento</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_historial']; ?></th>
                <th><?php echo $dato['nombre']; ?></th>
                <td><?php echo $dato['tratamiento']; ?></td>
                <?php endforeach; ?>
                <td>
                    <div class="btn-group">
                        <a type="button" href="historiales.php?action=update&id_historial=<?php echo $dato['id_historial']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                    </div>
                </td>
            </tr>
    </tbody>
</table>  
<p>SE ENCONTRARON <?php echo $app->getCount();?> HISTORIALES DE ESTE PRODUCTO</p> 
    