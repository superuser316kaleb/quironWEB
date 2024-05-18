<form action="inventarios.php?action=<?php echo ($action=='update')?'change&id_inventario='.$datos['id_inventario']:'save'; ?>"
     method="post" enctype="multipart/form-data">
<h2 class="title" ><?php echo ($action=='update')?  'Editar': 'Nuevo' ?> Inventario</h2>     
    <div class="field">
        <label class="label">Existencias</label>
        <div class="control">
            <input class="input" type="number" name="existencia"  required="required" 
            value="<?php echo (isset($datos['existencia']))? $datos['existencia']:''; ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">ID del Producto </label>
        <div class="control">
            <input class="input" type="number" name="id_producto"  required="required" readonly="readonly" 
            value="<?php echo (isset($datos['id_producto']))? $datos['id_producto']: $_GET['id_producto']; ?>">
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