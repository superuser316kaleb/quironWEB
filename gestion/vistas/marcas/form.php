<form action="marcas.php?action=<?php echo ($action=='update')?'change&id_marca='.$datos['id_marca']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Marca</h2>     
    <div class="field">
        <label class="label">Nombre de la marca</label>
        <div class="control">
            <input class="input" type="text" name="marca"  required="required" 
            value="<?php echo (isset($datos['marca']))? $datos['marca']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Logo de la Marca</label>
        <?php if($action=='update'): ?>
            </div>
            <label class="form-label">Logo actual</label>
            <figure class="image is-128x128">
            <img src="..<?php echo "/images/marcas/".$datos['fotografia']; ?>" height="500px" width="500px">
            </figure>
        <?php endif; ?>
        <br>
        <div class="file is-info has-name">
        <label class="file-label">
            <input class="file-input" type="file" name="fotografia"
            value="<?php echo (isset($datos['fotografia'])) ? $datos['fotografia']:''; ?>" />
            <span class="file-cta">
            <span class="file-icon">
                <i class="fas fa-upload"></i>
            </span>
            <span class="file-label"> Archivo… </span>
            </span>
            <span class="file-name"> </span>
        </label>
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