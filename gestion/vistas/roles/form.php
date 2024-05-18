<form action="roles.php?action=<?php echo ($action=='update')?'change&id_rol='.$datos['id_rol']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Rol</h2>     
    <div class="field">
        <label class="label">Nombre del Rol</label>
        <div class="control">
            <input class="input" type="text" name="rol"  required="required" 
            value="<?php echo (isset($datos['rol']))? $datos['rol']:''; ?>">
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