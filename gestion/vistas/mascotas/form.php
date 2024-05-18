<form action="mascotas.php?action=<?php echo ($action=='update')?'change&id_mascota='.$datos['id_mascota']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Mascotas</h2>     
    <div class="field">
        <label class="label">Nombre de la mascota</label>
        <div class="control">
            <input class="input" type="text" name="nombre"  required="required" 
            value="<?php echo (isset($datos['nombre']))? $datos['nombre']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Especie</label>
        <div class="control">
            <input class="input" type="text" name="especie"  required="required" 
            value="<?php echo (isset($datos['especie']))? $datos['especie']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Raza</label>
        <div class="control">
            <input class="input" type="text" name="raza"  required="required" 
            value="<?php echo (isset($datos['raza']))? $datos['raza']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Sexo</label>
        <div class="control">
            <input class="input" type="text" name="sexo"  required="required" 
            value="<?php echo (isset($datos['sexo']))? $datos['sexo']:''; ?>" placeholder="F/M" pattern="^[MF]$">
        </div>
    </div>
    <div class="field">
        <label class="label">Color</label>
        <div class="control">
            <input class="input" type="text" name="color"  required="required" 
            value="<?php echo (isset($datos['color']))? $datos['color']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Número de Identificación</label>
        <div class="control">
            <input class="input" type="text" name="no_identificacion"   
            value="<?php echo (isset($datos['no_identificacion']))? $datos['no_identificacion']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Microchip</label>
        <div class="control">
            <input class="input" type="text" name="microchip"   
            value="<?php echo (isset($datos['microchip']))? $datos['microchip']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Tatuaje</label>
        <div class="control">
            <input class="input" type="text" name="tatuaje"   
            value="<?php echo (isset($datos['tatuaje']))? $datos['tatuaje']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Peso</label>
        <div class="control">
            <input class="input" type="numeric" name="peso"  required="required" 
            value="<?php echo (isset($datos['peso']))? $datos['peso']:''; ?>">
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