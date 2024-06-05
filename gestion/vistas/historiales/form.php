<form action="historiales.php?action=<?php echo ($action=='update')?'change&id_historial='.$datos['id_historial']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Historial</h2>     
    <div class="field">
        <label class="label">Tratamiento</label>
        <div class="control">
            <input class="input" type="text" name="tratamiento"  required="required" 
            value="<?php echo (isset($datos['tratamiento']))? $datos['tratamiento']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">ID de la mascota </label>
        <div class="control">
            <input class="input" type="number" name="id_mascota"  required="required" readonly="readonly" 
            value="<?php echo (isset($datos['id_mascota']))? $datos['id_mascota']: $_GET['id_mascota']; ?>">
        </div>
    </div>
    <div class="control">
        <button type="submit" class="button is-primary is-outlined">
        <span>Guardar</span>
        <span class="icon is-small">
           <i class="fas fa-check"></i>
        </span>
        </button>
    </div>
    <br>
</form>