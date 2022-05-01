<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse | <?php echo $appname ?? 'BabyNames' ?></title>
    <?php
    include_once "src/includes/head.php";
    ?>
    <link rel="stylesheet" href="./src/css/styles.css">
</head>

<body>
    <?php
    include_once "src/includes/menu.php";
    ?>
    <main class="d-flex justify-content-center mt-4">
        <form  class="form-registro text-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1>Formulario de registro</h1>
            <div>
                <label class="label-registro" for="nombre">
                    <?php
                        if(!empty($_POST['nombre'])){
                            $nombre = clearFormat($_POST['nombre']);
                        }
                    ?>
                    <input class="input-registro" type="text" name="nombre" id="nombre" placeholder=" " <?php if(!empty($nombre)){ echo "value='$nombre'"; } ?>>
                    <span class="span-registro">Nombre</span>
                </label>
            </div>
            <?php if(!empty($errores['nombre'])): ?>
                    <div class="mb-20">
                        <?php foreach($errores['nombre'] as $indice => $valor): ?>
                        <p class="text-danger"><?php echo $valor; ?></p>
                        <?php endforeach; ?>
                    </div>
            <?php endif; ?>
            <div>
                <label class="label-registro" for="apellido">
                    <?php
                        if(!empty($_POST['apellido'])){
                            $apellido = clearFormat($_POST['apellido']);
                        }
                    ?>
                    <input class="input-registro" type="text" name="apellido" id="apellido" placeholder=" " <?php if(!empty($apellido)){ echo "value='$apellido'"; } ?>>
                    <span class="span-registro">Primer Apellido</span>
                </label>
            </div>
            <?php if(!empty($errores['apellido'])): ?>
                    <div class="mb-20">
                        <?php foreach($errores['apellido'] as $indice => $valor): ?>
                        <p class="text-danger"><?php echo $valor; ?></p>
                        <?php endforeach; ?>
                    </div>
            <?php endif; ?>
            <div>
                <div class="input-group ml-20-center">
                    <label class="label-registro" for="usuario">
                        <?php
                            if(!empty($_POST['usuario'])){
                                $usuario = clearFormat($_POST['usuario']);
                            }
                        ?>
                        <input name="usuario" type="text" class="form-control input-registro" placeholder=" " <?php if(!empty($usuario)){ echo "value='$usuario'"; } ?> aria-label="Username" aria-describedby="basic-addon1">
                        <span class="span-registro event-none">Nombre de Usuario</span>
                    </label>
                    <div class="input-group-prepend input-arroba">
                        <span class="input-group-text input-text" id="basic-addon1">@</span>
                    </div>
                </div>
            </div>
            <?php if(!empty($errores['usuario'])): ?>
                    <div class="mb-20">
                        <?php if(is_array($errores['usuario'])): ?>
                        <?php foreach($errores['usuario'] as $indice => $valor): ?>
                        <p class="text-danger"><?php echo $valor; ?></span>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p class="text-danger"><?php echo $errores['usuario']; ?></span>
                        <?php endif; ?>
                    </div>
            <?php endif; ?>
            <div>
                <label class="label-registro" for="email">
                        <?php
                            if(!empty($_POST['email'])){
                                $email = clearFormat($_POST['email']);
                            }
                        ?>
                    <input class="input-registro" type="email" name="email" id="email" placeholder=" " <?php if(!empty($email)){ echo "value='$email'"; } ?> autocomplete="off">
                    <span class="span-registro">Email</span>
                </label>
            </div>
            <?php if(!empty($errores['email'])): ?>
                    <div class="mb-20">
                        <?php if(is_array($errores['email'])): ?>
                        <?php foreach($errores['email'] as $indice => $valor): ?>
                        <p class="text-danger"><?php echo $valor; ?></p>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p class="text-danger"><?php echo $errores['email']; ?></span>
                        <?php endif; ?>
                    </div>
            <?php endif; ?>
            <div>
                <label class="label-registro" for="password">
                    <input class="input-registro" type="password" name="password" id="password" placeholder=" " autocomplete="new-password">
                    <span class="span-registro">Contraseña</span>
                </label>
            </div>
            <?php if(!empty($errores['password'])): ?>
                <div class="mb-20">
                    <?php foreach($errores['password'] as $indice => $valor): ?>
                        <p class="text-danger"><?php echo $valor; ?></p>
                        <?php endforeach; ?>
                    </div>
            <?php endif; ?>
            <div>
                <label class="label-registro" for="password2">
                    <input class="input-registro" type="password" name="password2" id="password2" placeholder=" " autocomplete="new-password">
                    <span class="span-registro">Repetir Contraseña</span>
                </label>
            </div>
            <?php if(!empty($errores['password2'])): ?>
                    <div class="mb-20">
                        <?php foreach($errores['password2'] as $indice => $valor): ?>
                        <p class="text-danger"><?php echo $valor; ?></p>
                        <?php endforeach; ?>
                     </div>
             <?php endif; ?>
             <div class="d-flex justify-content-center mb-20">
                <select class="form-control mt-20 w-fit" name="sexo" id="sexo">
                    <option value="" <?php if(!empty($_POST['sexo'])): if($_POST['sexo'] == ""): echo "selected"; endif; endif;?>>Sin sexo</option>
                    <option value="mujer" <?php if(!empty($_POST['sexo'])): if($_POST['sexo'] == "mujer"): echo "selected"; endif; endif; ?>>Mujer</option>
                    <option value="hombre" <?php if(!empty($_POST['sexo'])): if($_POST['sexo'] == "hombre"): echo "selected"; endif; endif; ?>>Hombre</option>
                </select>
            </div>
            <?php if(!empty($errores['sexo'])): ?>
                    <div class="mb-20">
                        <?php foreach($errores['sexo'] as $indice => $valor): ?>
                        <p class="text-danger"><?php echo $valor; ?></p>
                        <?php endforeach; ?>
                    </div>
            <?php endif; ?>
            <div>
                <input class="btn btn-primary mt-20" type="submit" value="Registrarse">
            </div>
        </form>
    </main>

    <?php
    include_once "src/includes/footer.php";
    ?>
</body>

</html>