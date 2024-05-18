<form action="usuarios.php?action=<?php echo ($action=='update')?'change&id_usuario='.$datos['id_usuario']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Usuario</h2>     
    <div class="field">
        <label class="label">Nombre</label>
        <div class="control">
            <input class="input" type="text" name="nombre"  required="required" 
            value="<?php echo (isset($datos['nombre']))? $datos['nombre']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Primer Apellido</label>
        <div class="control">
            <input class="input" type="text" name="primer_apellido"  
            value="<?php echo (isset($datos['primer_apellido']))? $datos['primer_apellido']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Segundo Apellido</label>
        <div class="control">
            <input class="input" type="text" name="segundo_apellido"  
            value="<?php echo (isset($datos['segundo_apellido']))? $datos['segundo_apellido']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Correo</label>
        <div class="control">
            <input class="input" type="text" name="correo"  required="required" 
            value="<?php echo (isset($datos['correo']))? $datos['correo']:''; ?>">
        </div>
    </div>
    <?php if($action=='create'): ?>
    <div class="field">
        <label class="label">Contraseña</label>
        <div class="control">
        <p class="control has-icons-left">
            <input class="input" type="password" name="contrasena"  required="required" 
            value="<?php echo (isset($datos['contrasena']))? $datos['contrasena']:''; ?>" />
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
        </p>
        </div>
    </div>
    <?php endif; ?>
    <div class="field">
        <label class="label">Número Telefónico</label>
        <div class="control">
            <input class="input" type="text" name="numero_telefonico"  required="required" 
            value="<?php echo (isset($datos['numero_telefonico']))? $datos['numero_telefonico']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Dirección</label>
        <div class="control">
            <input class="input" type="text" name="direccion"  
            value="<?php echo (isset($datos['direccion']))? $datos['direccion']:''; ?>">
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