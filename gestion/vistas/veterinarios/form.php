<form action="veterinarios.php?action=<?php echo ($action=='update')?'change&id_veterinario='.$datos['id_veterinario']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Veterinario</h2>     
    <div class="field">
        <label class="label">Nombre del Veterinario</label>
        <div class="control">
            <input class="input" type="text" name="nombre"  required="required" 
            value="<?php echo (isset($datos['veterinario']))? $datos['veterinario']:''; ?>">
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
        <label class="label">Número telefonico</label>
        <div class="control">
            <input class="input" type="numeric" name="numero_telefonico"  required="required" 
            value="<?php echo (isset($datos['numero_telefonico']))? $datos['numero_telefonico']:''; ?>" placeholder="10 dígitos">
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