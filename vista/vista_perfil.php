<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php foreach ($usuario as $valor) : echo $valor['nombre'];
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
        <div class="flex justify-content-center position-relative mh-[70vh]">
            <?php
            foreach ($usuario as $valor) :
                if ($admin == true) {
            ?>
                    <div>
                        <a class="text-decoration-none" href="./perfil.php?editar=<?php echo $valor['id']; ?>">
                            <div class="btn btn-light d-flex justify-content-center align-items-center p-3 w-max-content gap-[8px]">
                                <img class="d-block w-[32px] h-[32px]" src="./src/img/pencil.svg" alt="editar">
                                <p class="d-block m-0">Editar</span>
                            </div>
                        </a>
                    </div>
                    <?php
                } else {
                    if (!empty($_SESSION['id'])) {
                        if ($perfil == unserialize($_SESSION['id'])) {
                    ?>
                            <div>
                                <a class="text-decoration-none" href="./perfil.php?editar=<?php echo $valor['id']; ?>">
                                    <div class="btn btn-light d-flex justify-content-center align-items-center p-3 w-max-content gap-[8px]">
                                        <img class="d-block w-[32px] h-[32px]" src="./src/img/pencil.svg" alt="editar">
                                        <p class="d-block m-0">Editar</span>
                                    </div>
                                </a>
                            </div>
                <?php
                        }
                    }
                }

                $sexo = empty($valor['sexo']) ? 'text-white' : ($valor['sexo'] == 'hombre' ? 'text-primary' : ($valor['mujer'] == "mujer" ? 'text-danger' : ''));
                ?>
                <div class="shadow p-3 mb-5 rounded text-center <?php echo empty($valor['sexo']) ? 'bg-grey' : ($valor['sexo'] == 'hombre' ? 'bg-hombre' : ($valor == "mujer" ? 'bg-mujer' : '')); ?>">
                    <div class="d-flex flex-column align-items-center justify-content-center mt-[24px] mb-[24px]">
                        <h3>Niveles</h3>
                        <table class="table w-60">
                            <thead>
                                <tr>
                                    <th>Nivel actual</th>
                                    <th>Exp Inicio</th>
                                    <th>Exp Fin</th>
                                    <th>Exp actual</th>
                                    <th>Siguiente nivel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="<?php echo $sexo; ?>"><?php echo $valor['current_level']; ?></td>
                                    <td class="<?php echo $sexo; ?>"><?php echo $valor['exp_init']; ?></td>
                                    <td class="<?php echo $sexo; ?>"><?php echo $valor['exp_fin']; ?></td>
                                    <td class="<?php echo $sexo; ?>"><?php echo $valor['exp_usuario']; ?></td>
                                    <td class="<?php echo $sexo; ?>"><?php echo $valor['next_level'] == null ? "Actual" : $valor['next_level']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="d-flex text-center flex-column">
                        <span class="text-dark font-weight-bold text-[20px]">Nombre:</span>
                        <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]">
                            <?php echo $valor['nombre']; ?>
                        </span>
                    </p>
                    <p class="d-flex text-center flex-column">
                        <span class="text-dark font-weight-bold text-[20px]">Apellido:</span>
                        <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]">
                            <?php echo $valor['apellido']; ?>
                        </span>
                    </p>
                    <?php if ($admin == true) : ?>
                        <p class="d-flex text-center flex-column">
                            <span class="text-dark font-weight-bold text-[20px]">Email:</span>
                            <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]">
                                <?php echo $valor['email']; ?>
                            </span>
                        </p>
                    <?php endif; ?>
                    <p class="d-flex text-center flex-column">
                        <span class="text-dark font-weight-bold text-[20px]">Sexo:</span>
                        <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]">
                            <?php echo empty($valor['sexo']) ? 'No definido' : $valor['sexo']; ?>
                        </span>
                    </p>
                    <p class="d-flex text-center flex-column">
                        <span class="text-dark font-weight-bold text-[20px]">Estado:</span>
                        <span class="font-weight-bold <?php echo $valor['estado'] == "activo" ? "text-success" : "text-danger" ?> text-capitalize text-[16px]">
                            <?php echo $valor['estado']; ?>
                        </span>
                    </p>
                    <p class="d-flex text-center flex-column">
                        <span class="text-dark font-weight-bold text-[20px]">F. Registro:</span>
                        <span class="font-weight-bold <?php echo $sexo; ?> text-capitalize text-[16px]">
                            <?php echo $valor['reg_date']; ?>
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