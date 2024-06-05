
<form action="fechas.peluquero.php?action=<?php echo ($action=='update') ? 'change&id_fecha=' . $datos['id_fecha'] : 'save'; ?>" method="post" enctype="multipart/form-data">
    <h2 class="title"><?php echo ($action == 'update') ? 'Editar' : 'Nueva'; ?> Fecha</h2>     
    <div class="field">
        <label class="label">Fecha</label>
        <div class="control">
            <input class="input" type="date" name="fecha" required="required" 
            value="<?php echo (isset($datos['fecha'])) ? $datos['fecha'] : ''; ?>" min="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
    <div class="field">
        <label class="label">Hora</label>
        <div class="control">
            <input class="input" type="time" name="hora" required="required" 
            value="<?php echo (isset($datos['hora'])) ? $datos['hora'] : ''; ?>">
        </div>
    </div>
   <div class="field">
        <label class="label">Disponibilidad</label>
        <div class="control">
            <div class="select">
                <select name="disponible" required="required">
                    <option value="1" <?php echo (isset($datos['disponible']) && $datos['disponible'] == 1) ? 'selected' : ''; ?>>Disponible</option>
                    <option value="0" <?php echo (isset($datos['disponible']) && $datos['disponible'] == 0) ? 'selected' : ''; ?>>No disponible</option>
                </select>
            </div>
        </div>
    </div>
    <div class="field">
        <label class="label">ID Peluquero</label>
        <div class="control">
            <input class="input" type="number" name="id_peluquero" required="required" readonly="readonly" 
            value="<?php echo (isset($datos['id_peluquero'])) ? $datos['id_peluquero'] : $_GET['id_peluquero']; ?>">
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
