<h1 class="title">Peluqueros</h1>
<div class="btn-group">
    <a onclick="goBack()" type="button" class="button is-danger is-light">Regresar</a>
    <a type="button" href="peluqueros.php?action=create" class="button is-primary">Nuevo</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Primer Apelldio</th>
            <th>Segundo Apelldio</th>
            <th>Número telefonico</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th><?php echo $dato['id_peluquero']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['primer_apellido']; ?></td>
                <td><?php echo $dato['segundo_apellido']; ?></td>
                <td><?php echo $dato['numero_telefonico']; ?></td>
                <td>
                    <div class="btn-group">
                        <a type="button" href="peluqueros.php?action=update&id_peluquero=<?php echo $dato['id_peluquero']; ?>"
                        class="button is-primary is-inverted">Editar</a>
                        <a type="button" href="peluqueros.php?action=delete&id_peluquero=<?php echo $dato['id_peluquero']; ?>"
                         class="button is-danger is-inverted">
                         <span>Eliminar</span>
                         <span class="icon is-small">
                            <i class="fas fa-times"></i>
                         </span>
                         </a>
                         <a type="button" href="fechas.peluquero.php?action=getAll&id_peluquero=<?php echo $dato['id_peluquero']; ?>"
                        class="button is-info is-inverted">Fechas</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>  
<p>SE ENCONTRARON <?php echo $app->getCount();?> PELUQUEROS</p> 
    