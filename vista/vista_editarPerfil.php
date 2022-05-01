<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Perfil de <?php foreach ($usuario as $valor) : echo $valor['nombre'];
                                endforeach; ?> | <?php echo $appname ?? 'BabyNames' ?></title>
    <?php
    include_once "src/includes/head.php";
    ?>
    <link rel="stylesheet" href="./src/css/perfil.css">
</head>

<body>
    <?php
    include_once "src/includes/menu.php";
    ?>
    <div class="container mt-4">
        <div id="msgs"></div>
        <div class="flex justify-content-center position-relative mh-[70vh]">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?editar=<?php echo $perfil; ?>" method="post"> 
            <?php foreach ($usuario as $valor) :?>
                    <?php if (!empty($_SESSION['id'])) : ?>
                        <?php if ($perfil == unserialize($_SESSION['id'])) :?>
                            <div>
                                <a class="text-decoration-none" href="./perfil.php">
                                    <div class="btn btn-light d-flex justify-content-center align-items-center p-3 w-max-content gap-[8px]">
                                        <img class="d-block w-[32px] h-[32px]" src="./src/img/pencil.svg" alt="editar">
                                        <p class="d-block m-0">Volver</span>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php $sexo = empty($valor['sexo']) ? '' : ($valor['sexo'] == 'hombre' ? 'text-primary' : ($valor['sexo'] == "mujer" ? 'text-danger' : '')); ?>
                    <div class="shadow p-3 mb-5 rounded text-center d-flex flex-column align-items-center <?php echo empty($valor['sexo']) ? 'bg-grey' : ($valor['sexo'] == 'hombre' ? 'bg-hombre' : ($valor == "mujer" ? 'bg-mujer' : '')); ?>">
                        <input type="hidden" name="id" value="<?php echo $perfil; ?>">
                        <p class="d-flex text-center flex-column w-[400px]">
                            <label class="text-dark font-weight-bold text-[20px]">Nombre:</label>
                            <input name="nombre" class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]" value="<?php echo !empty($nombre) ? $nombre : $valor['nombre'];  ?>">
                        </p>
                        <?php if (!empty($errores['nombre'])) : ?>
                            <div class="mb-20">
                                <span class="text-danger"><?php echo $errores['nombre']; ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <label class="text-dark font-weight-bold text-[20px]">Apellido:</label>
                            <input name="apellido" class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]" value="<?php echo !empty($apellido) ? $apellido : $valor['apellido'];  ?>">
                            </span>
                        </p>
                        <?php if (!empty($errores['apellido'])) : ?>
                            <div class="mb-20">
                                <span class="text-danger"><?php echo $errores['apellido']; ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <label class="text-dark font-weight-bold text-[20px]">Sexo:</label>
                            <select name="sexo" class="<?php echo $sexo; ?> text-[16px] font-weight-bold">
                                <option class="text-[16px] text-dark font-weight-bold" 
                                value="" <?php if ($valor['sexo'] == null) : echo "selected"; endif; ?>>Sin Sexo</option>
                                <option class="text-[16px] text-primary font-weight-bold" 
                                value="hombre" <?php if ($valor['sexo'] == "hombre") : echo "selected"; endif; ?>>Hombre</option>
                                <option class="text-[16px] text-danger font-weight-bold" 
                                value="mujer" <?php if ($valor['sexo'] == "mujer") : echo "selected"; endif; ?>>Mujer</option>
                            </select>
                        </p>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <label class="text-dark font-weight-bold text-[20px]">Usuario:</label>
                            <input name="usu" class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]" value="<?php echo !empty($usu) ? $usu : $valor['nom_usu'];  ?>">
                            </span>
                        </p>
                        <?php if (!empty($errores['usu'])) : ?>
                            <div class="mb-20">
                                <span class="text-danger"><?php echo $errores['usu'] ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($admin == true) : ?>
                            <div class="d-flex text-center flex-column w-[400px]">
                                <label class="text-dark font-weight-bold text-[20px]">Email:</label>
                                <input name="email" class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]" value="<?php echo !empty($email) ? $email : $valor['email'];  ?>">
                            </div>
                            <?php if (!empty($errores['email'])) : ?>
                                <div class="mb-20">
                                    <span class="text-danger"><?php echo $errores['email']; ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if(unserialize($_SESSION['id']) != $valor['id'] or $admin == true): ?>
                                <p class="d-flex text-center flex-column w-[400px]">
                                    <label class="text-dark font-weight-bold text-[20px]">Estado:</label>
                                    <select name="estado" class="<?php echo $sexo; ?> text-[16px] font-weight-bold" name="estado">
                                        <option class="text-[16px] text-primary font-weight-bold" value="activo" 
                                        <?php if ($valor['sexo'] == "activo"): echo "selected"; endif; ?>>Activo</option>
                                        <option class="text-[16px] text-danger font-weight-bold" value="inactivo" 
                                        <?php if ($valor['sexo'] == "inactivo"): echo "selected"; endif; ?>>Inactivo</option>
                                    </select>
                                </p>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="d-flex text-center flex-column w-[400px]">
                                <label class="text-dark font-weight-bold text-[20px]">Email:</label>
                                <input class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]" value="<?php echo $valor['email'];  ?>" disabled>
                            </div>
                            <p class="d-flex text-center flex-column w-[400px]">
                                <span class="text-dark font-weight-bold text-[20px]">Estado:</span>
                                <span class="font-weight-bold <?php echo $valor['estado'] == "activo" ? "text-success" : "text-danger"; ?> text-capitalize text-[16px]">
                                    <?php echo $valor['estado']; ?>
                                </span>
                            </p>
                        <?php endif; ?>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <span class="text-dark font-weight-bold text-[20px]">F. Últ. Actualización:</span>
                            <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]">
                                <?php echo $valor['edit_date']; ?>
                            </span>
                        </p>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <span class="text-dark font-weight-bold text-[20px]">F. Registro:</span>
                            <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]">
                                <?php echo $valor['reg_date']; ?>
                            </span>
                        </p>
                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                <?php
                endforeach;
                ?>
            </form>
        </div>
    </div>
    <?php
    include_once "src/includes/footer.php";
    ?>
    <script type="text/javascript">
        $(function(){
            const msgs = $('#msgs');
            <?php if(!empty($_SESSION['msg_confirmacion'])): ?>
                msgs.append("<div class=\"alert alert-success alert-dismissible\">"+
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>"+
                            "<strong>Correcto!</strong> <?php echo $_SESSION['msg_confirmacion']; ?> "+
                            "</div>");
                            <?php unset($_SESSION['msg_confirmacion']); ?>
            <?php endif; ?>
            <?php if(!empty($_SESSION['msg_correcto'])): ?>
                msgs.append("<div class=\"alert alert-success alert-dismissible\">"+
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>"+
                            "<strong>Correcto!</strong> <?php echo $_SESSION['msg_correcto']; ?> "+
                            "</div>");
                            <?php unset($_SESSION['msg_correcto']); ?>
            <?php endif; ?>
            <?php if(!empty($_SESSION['msg_error'])): ?>
                msgs.append("<div class=\"alert alert-danger alert-dismissible\">"+
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>"+
                            "<strong>Error!</strong> <?php echo $_SESSION['msg_error']; ?>" +
                            "</div>");
                            <?php unset($_SESSION['msg_error']); ?>
            <?php endif; ?>
        });
    </script>
</body>

</html>