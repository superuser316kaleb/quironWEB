<form action="productos.php?action=<?php echo ($action=='update')?'change&id_producto='.$datos['id_producto']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Producto</h2>     
    <div class="field">
        <label class="label">Nombre</label>
        <div class="control">
            <input class="input" type="text" name="nombre"  required="required" 
            value="<?php echo (isset($datos['nombre']))? $datos['nombre']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Descripción</label>
        <div class="control">
            <textarea  class="textarea" type="text" name="descripcion" 
             required="required"><?php echo (isset($datos['descripcion']))? $datos['descripcion']:''; ?></textarea>
        </div>
    </div>
    <div class="field">
        <label class="label">Precio</label>
        <div class="control">
            <input class="input" type="numeric" name="precio"  required="required" 
            value="<?php echo (isset($datos['precio']))? $datos['precio']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Costo</label>
        <div class="control">
            <input class="input" type="numeric" name="costo"  required="required"
            value="<?php echo (isset($datos['costo']))? $datos['costo']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Marca</label>
        <div class="select">
            <select class="input" name="id_marca">
            <?php foreach($marcas as $marca):
                    $selected='';
                    if($marca['id_marca']==$datos['id_marca']):
                    $selected='selected';
                    endif;?>
                <option value="<?php echo $marca['id_marca']; ?>" <?php echo $selected?>> <?php echo $marca['marca']?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="field">
        <label class="label">Categoría</label>
        <div class="select">
            <select class="input" name="id_categoria"  >
            <?php foreach($categorias as $categoria):
                    $selected='';
                    if($categoria['id_categoria']==$datos['id_categoria']):
                    $selected='selected';
                    endif;?>
                <option value="<?php echo $categoria['id_categoria']; ?>" <?php echo $selected ?> > <?php echo $categoria['categoria']?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="field">
        <label class="label">Fotografia del producto</label>
        <?php if($action=='update'): ?>
            </div>
            <label for="Fotografia" class="form-label">Fotografia actual</label>
            <figure class="image is-128x128">
            <img src="..<?php echo "/images/productos/".$datos['fotografia']; ?>" height="500px" width="500px">
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