<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | <?php echo $appname ?? 'BabyNames' ?></title>
    <?php
    include_once "src/includes/head.php";
    ?>
</head>

<body>
    <?php
    include_once "src/includes/menu.php";
    ?>
    <div class="container mt-4">
        <div class="flex justify-content-center" style="min-height: 70vh">
            <?php

                foreach($bebe as $valor):
                    $sexo = $valor['sexo'] == 'hombre' ? 'text-primary' : 'text-danger';
                    ?>
                    <div class="shadow p-3 mb-5 rounded text-center" style="<?php echo $valor['sexo'] == 'hombre' ? 'background-color: aliceblue' : 'background-color: lavenderblush'; ?>">
                        <p class="d-flex text-center flex-column">
                            <span class="text-dark font-weight-bold" style="font-size: 20px">Letra:</span>
                            <span class="font-weight-bold <?php echo $sexo; ?> text-uppercase display-1">
                                <?php echo $valor['letra']; ?>
                            </span>
                        </p>
                        <p class="d-flex text-center flex-column">
                            <span class="text-dark font-weight-bold" style="font-size: 20px;">Nombre:</span>
                        <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize" style="font-size: 16px">
                            <?php echo $valor['nombre']; ?>
                        </span>
                        </p>
                        <p class="d-flex text-center flex-column">
                            <span class="text-dark font-weight-bold" style="font-size: 20px;">Origen:</span>
                            <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize" style="font-size: 16px">
                                <?php echo $valor['origen']; ?>
                            </span>
                        </p>
                        <p class="d-flex text-center flex-column">
                            <span class="text-dark font-weight-bold" style="font-size: 20px;">Descripción:</span>
                            <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize" style="font-size: 16px">
                                <?php echo $valor['descripcion']; ?>
                            </span>
                        </p>
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