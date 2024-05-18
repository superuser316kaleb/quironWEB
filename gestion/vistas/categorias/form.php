<form action="categorias.php?action=<?php echo ($action=='update')?'change&id_categoria='.$datos['id_categoria']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Categoría</h2>     
    <div class="field">
        <label class="label">Nombre de la categoría</label>
        <div class="control">
            <input class="input" type="text" name="categoria"  required="required" 
            value="<?php echo (isset($datos['categoria']))? $datos['categoria']:''; ?>">
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