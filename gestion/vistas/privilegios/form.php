<form action="privilegios.php?action=<?php echo ($action=='update')?'change&id_privilegio='.$datos['id_privilegio']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Privilegio</h2>     
    <div class="field">
        <label class="label">Nombre del privilegio</label>
        <div class="control">
            <input class="input" type="text" name="privilegio"  required="required" 
            value="<?php echo (isset($datos['privilegio']))? $datos['privilegio']:''; ?>">
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