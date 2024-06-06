<form action="citas.php?action=<?php echo ($action == 'update') ? 'change&id_cita=' . $datos['id_cita'] : 'save'; ?>" method="post" enctype="multipart/form-data">
    <h2 class="title"><?php echo ($action == 'update') ? 'Editar' : 'Nueva'; ?> Cita</h2>     
    <div class="field">
        <label class="label">Fecha</label>
        <div class="control">
            <input class="input" type="date" name="fecha" required="required" min="<?php echo date('Y-m-d'); ?>" 
            value="<?php echo (isset($datos['fecha'])) ? $datos['fecha'] : ''; ?>">
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
        <label class="label">Detalle</label>
        <div class="control">
            <input class="input" type="text" name="detalle" required="required" 
            value="<?php echo (isset($datos['detalle'])) ? $datos['detalle'] : ''; ?>">
        </div>
    </div>
    <?php if ($action == 'update'):?>
    <div class="field">
        <label class="label">Estado</label>
        <div class="control">
            <div class="select">
                <select name="estado" required="required">
                    <option value="Activa" <?php echo (isset($datos['estado']) && $datos['estado'] == 'Activa') ? 'selected' : ''; ?>>Activa</option>
                    <option value="Inactiva" <?php echo (isset($datos['estado']) && $datos['estado'] == 'Inactiva') ? 'selected' : ''; ?>>Inactiva</option>
                </select>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="field">
        <label class="label">ID Usuario</label>
        <div class="control">
            <input class="input" type="text" name="id_usuario" required="required" 
            value="<?php echo (isset($datos['id_usuario'])) ? $datos['id_usuario'] : ''; ?>">
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
