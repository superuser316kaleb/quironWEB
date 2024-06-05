<?php include __DIR__."/header.php"; 
include __DIR__."/gestion/usuario.class.php"; 
$app = new Usuario();
$usuario = $app->getOne($_SESSION['id_usuario']);

?>

<div class="column is-16">
    <div class="title-bordered mb-5 is-flex is-align-items-center">
        <h1 class="h4">Perfil de Usuario</h1>  
    </div>
    <div class="columns is-multiline">
        <div class="column is-4">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-square">
                        <img src="images/author.png" alt="Imagen de perfil">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <p class="title is-4"><?php echo $usuario['nombre']; ?></p>
                            <p class="subtitle is-6"><?php echo $usuario['correo']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-8">
            <div class="box">
                <h2 class="title is-5">Información del Usuario</h2>
                <div class="content">
                    <p><strong>Nombre:</strong> <?php echo $usuario['nombre']; ?></p>
                    <p><strong>Apellidos:</strong> <?php echo $usuario['primer_apellido'].$usuario['segundo_apellido']; ?></p>
                    <p><strong>Correo Electrónico:</strong> <?php echo $usuario['correo']; ?></p>
                    <p><strong>Número Telefonico:</strong><?php echo $usuario['numero_telefonico']; ?></p>
                    <p><strong>Dirección:</strong> <?php echo $usuario['direccion']; ?></p>
                </div>
                <div class="buttons">
                    <button class="button is-link-light">Editar Perfil</button>
                    <button class="button is-light">Configuraciones</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__."/footer.php"; ?>
