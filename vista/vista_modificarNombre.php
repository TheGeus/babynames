<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando <?php foreach($bebe as $valor): echo $valor['nombre']; endforeach; ?> | <?php echo $appname ?? 'BabyNames' ?></title>
    <?php
    include_once "src/includes/head.php";
    ?>
    <link rel="stylesheet" href="./src/css/bebe.css">
</head>

<body>
    <?php
    include_once "src/includes/menu.php";
    ?>
    <div class="container mt-4">
        <div class="flex justify-content-center position-relative mh-[70vh]">
            <?php foreach($bebe as $valor): ?>
                <div>
                    <a class="text-decoration-none" href="<?php echo $_SERVER['PHP_SELF']."?token=".$valor['token']; ?>">
                            <div class="btn btn-light d-flex justify-content-center align-items-center p-3 w-max-content gap-[8px]">
                                <img class="d-block w-[32px] h-[32px]" src="./src/img/view.svg" alt="ver">
                                <p class="d-block m-0">ver</span>
                            </div>
                    </a>
                </div>
                <div>
                    <a class="text-decoration-none" href="<?php echo $_SERVER['PHP_SELF']."?crear=true"; ?>">
                            <div class="btn btn-light d-flex justify-content-center align-items-center p-3 w-max-content gap-[8px]">
                                <img class="d-block w-[32px] h-[32px]" src="./src/img/pencil.svg" alt="editar">
                                <p class="d-block m-0">Crear Nuevo Bebe</span>
                            </div>
                    </a>
                </div>
            <?php $sexo = empty($valor['sexo']) ? 'text-white' : ($valor['sexo'] == 'hombre' ? 'text-primary' : ($sexo == "mujer" ? 'text-danger': '')); ?>
                    <div class="d-flex flex-column align-items-center shadow p-3 mb-5 rounded text-center <?php echo empty($valor['sexo']) ? 'bg-grey' : ($valor['sexo'] == 'hombre' ? 'bg-hombre' : ($valor == "mujer" ? 'bg-mujer' : '')); ?>">
                        <p class="d-flex text-center flex-column w-[400px]">
                        <label class="text-dark font-weight-bold text-[20px]">Letra:</label>
                            <select class="<?php echo $sexo; ?> text-[16px] font-weight-bold text-capitalize" name="letra">
                                <?php foreach($letras as $letra):?>
                                <option class="text-[16px] text-primary font-weight-bold text-capitalize" value="<?php echo $letra['letra']; ?>" <?php if($valor['letra'] == $letra['letra']){ echo "selected";} ?>><?php echo $letra['letra']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <span class="text-dark font-weight-bold text-[20px]">Nombre:</span>
                            <?php
                                if(!empty($_POST['nombre'])){
                                    $nombre = clearFormat($_POST['nombre']);
                                }
                            ?>
                            <input class="input-bebe" type="text" name="nombre" id="nombre" placeholder=" " value='<?php echo !empty($nombre) ? $nombre : $valor['nombre']; ?>'>
                        </p>
                        <?php if(!empty($errores['nombre'])): ?>
                            <div class="mb-20">
                                <span class="text-danger"><?php echo $errores['nombre']; ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <label class="text-dark font-weight-bold text-[20px]">Sexo:</label>
                            <select class="<?php echo $sexo; ?> text-[16px] font-weight-bold" name="sexo">
                                <option class="text-[16px] text-primary font-weight-bold" value="hombre" <?php if($valor['sexo'] == "hombre"){ echo "selected";} ?>>Hombre</option>
                                <option class="text-[16px] text-danger font-weight-bold" value="mujer" <?php if($valor['sexo'] == "mujer"){ echo "selected";} ?>>Mujer</option>
                            </select>
                        </p>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <span class="text-dark font-weight-bold text-[20px]">Origen:</span>
                            <?php
                                if(!empty($_POST['origen'])){
                                    $origen = clearFormat($_POST['origen']);
                                }
                            ?>
                            <input class="input-bebe" type="text" name="origen" id="origen" placeholder=" " value='<?php echo !empty($origen) ? $origen : $valor['origen']; ?>'>
                        </p>
                        <?php if(!empty($errores['origen'])): ?>
                            <div class="mb-20">
                                <span class="text-danger"><?php echo $errores['origen']; ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <span class="text-dark font-weight-bold text-[20px]">descripcion:</span>
                            <?php
                                if(!empty($_POST['descripcion'])){
                                    $descripcion = clearFormat($_POST['descripcion']);
                                }
                            ?>
                            <textarea class="input-bebe h-[145px]" type="text" name="descripcion" id="descripcion" placeholder=" "><?php echo !empty($descripcion) ? $descripcion : $valor['descripcion']; ?></textarea>
                        </p>
                        <p class="d-flex text-center flex-column w-[400px]">
                            <label class="text-dark font-weight-bold text-[20px]">Estado:</label>
                            <select class="<?php echo $sexo; ?> text-[16px] font-weight-bold" name="publicado">
                                <option class="text-[16px] text-primary font-weight-bold" value="si" <?php if($valor['estado'] == "si"){ echo "selected";} ?>>Publicado</option>
                                <option class="text-[16px] text-danger font-weight-bold" value="no" <?php if($valor['estado'] == "no"){ echo "selected";} ?>>No publicado</option>
                            </select>
                        </p>
                        <p class="d-flex text-center flex-column">
                            <span class="text-dark font-weight-bold text-[20px]">F. Últ. Actualización:</span>
                            <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]">
                                <?php echo $valor['edit_date']; ?>
                            </span>
                        </p>
                        <p class="d-flex text-center flex-column">
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
        </div>
    </div>
    <?php
    include_once "src/includes/footer.php";
    ?>
</body>
</html>