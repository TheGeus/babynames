<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de los logros | <?php echo $appname ?? 'BabyNames' ?></title>
    <?php
    include_once "src/includes/head.php";
    ?>
    <link rel="stylesheet" href="./src/css/styles.css">
</head>

<body class="h-min-vh">
    <?php
    include_once "src/includes/menu.php";
    ?>
    <div class="container mt-4">
        <div class="flex justify-content-center position-relative mh-[70vh]">
            <div class="shadow p-3 mb-5 rounded text-center bg-lightcyan">
                <div class="d-flex flex-column align-items-center justify-content-center mt-[24px] mb-[24px]">
                    <h3>Niveles</h3>
                    <table class="table w-60">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Exp</th>
                                <?php if (isset($listadoLogros[0]['estado'])) : ?>
                                    <th>Estado</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listadoLogros as $valor) : ?>
                                <tr>
                                    <td><?php echo $valor['nombre']; ?></td>
                                    <td><?php echo $valor['descripcion']; ?></td>
                                    <td><?php echo '+' . $valor['give_exp'] . ' Puntos'; ?></td>
                                    <?php if (isset($valor['estado'])) : ?>
                                        <td><?php echo $valor['estado'] == 1 ? "<span class=\"text-success\"> COMPLETADO</span>" : "<span class=\"text-danger\">SIN COMPLETAR</span>" ?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        include_once "src/includes/footer.php";
        ?>
</body>

</html>