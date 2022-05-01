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

<body class="relative">
    <?php
    include_once "src/includes/menu.php";
    ?>
    <div class="container">
        <div id="msgs">

        </div>
        <div class="flex justify-content-center" style="height: 70vh">
            <form action="buscar.php" method="get" class="flex flex-column justify-content-center align-items-center h-100" style="background-color:#95b8f6;display:flex; justify-content:center; align-content:center;">
                <div class="d-flex flex-column">
                    <label for="sexo">El sexo:</label>
                    <select class="form-control" name="sexo" id="sexo">

                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>

                    </select>
                </div>
                <div class="d-flex flex-column">
                    <label for="letra">La letra:</label>
                    <select class="form-control" name="letra" id="letra">

                        <?php

                        if ($valido == true) {

                            foreach ($listadoLetras as $linea) {

                        ?>

                                <option value="<?php echo $linea['letra']; ?>"><?php echo $linea['letra']; ?></option>
                            <?php

                            }
                        } else {

                            ?>

                            <option value="" disabled>---</option>
                        <?php

                        }

                        ?>
                    </select>
                </div>
                <div class="d-flex flex-column">
                    <label for="cantidad">Cuantos nombres por página</label>
                    <input class="form-control" type="number" name="cantidad" id="cantidad" min="<?php echo $min_pag ?? '10'; ?>" max="<?php echo $max_pag ?? '100' ?>">
                </div>
                <div class="d-flex flex-column p-2">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
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