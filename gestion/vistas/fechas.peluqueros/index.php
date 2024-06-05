<a href="fechas.peluquero.php?action=getAll&id_peluquero=<?php echo $datos[0]['id_peluquero']; ?>">
<h1 class="title">Fechas disponibles de <?php echo (isset($datos[0]['nombre'])?$datos[0]['nombre']:''); ?></h1>
</a>
<br>
<div class="btn-group">
    <a onclick="goBack()"  type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="fechas.peluquero.php?action=create&id_peluquero=<?php echo (isset($datos[0]['id_peluquero'])?$datos[0]['id_peluquero']:$_GET['id_peluquero']); ?>" 
    class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>peluquero</th>
            <th>Hora</th>
            <th>Fecha</th>
            <th>Disponibilidad</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_fecha']; ?></th>
                <th><?php echo $dato['nombre']; ?></th>
                <td><?php echo $dato['hora']; ?></td>
                <td><?php echo $dato['fecha']; ?></td>
                <td><?php echo ($dato['disponible'] == 1) ? 'Disponible' : 'No disponible'; ?></td>
                
                <td>
                    <div class="btn-group">
                        <a type="button" href="fechas.peluquero.php?action=update&id_fecha=<?php echo $dato['id_fecha']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="fechas.peluquero.php?action=delete&id_fecha=<?php echo $dato['id_fecha']
                        .'&id_peluquero='.$dato['id_peluquero'];; ?>"
                         class="button is-danger is-inverted">
                         <span>Eliminar</span>
                         <span class="icon is-small">
                            <i class="fas fa-times"></i>
                         </span>
                         </a>
                    </div>
                </td>
                <?php endforeach; ?>
            </tr>
    </tbody>
</table>  
<p>SE ENCONTRARON <?php echo $app->getCount();?> FECHAS DE <?php echo (isset($datos[0]['nombre'])?$datos[0]['nombre']:''); ?>  </p> 
    