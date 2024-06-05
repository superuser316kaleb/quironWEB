<form action="usuarios.rol.php?action=<?php echo ($action=='update')?'change&id_rol='.$id_rol.'&id_usuario='.$id_usuario:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Rol de usuario</h2>     
    <div class="field">
        <label class="label">Rol</label>
        <div class="select">
            <select class="input" name="id_rol">
            <?php foreach($roles as $rol):
                    $selected='';
                    if($rol['id_rol']==$datos['id_rol']):
                    $selected='selected';
                    endif;?>
                <option value="<?php echo $rol['id_rol']; ?>" <?php echo $selected?>> <?php echo $rol['rol']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="field">
        <label class="label">ID del Usuario </label>
        <div class="control">
            <input class="input" type="number" name="id_usuario"  required="required" readonly="readonly" 
            value="<?php echo (isset($datos['id_usuario']))? $datos['id_usuario']: $_GET['id_usuario']; ?>">
        </div>
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