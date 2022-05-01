<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador | <?php echo $appname ?? 'BabyNames' ?></title>
    <?php
    include_once "src/includes/head.php";
    ?>
</head>
<body>
<body>
    <?php
    include_once "src/includes/menu.php";
    ?>
    <div class="container">
        <div class="flex justify-content-center" style="height: 70vh">
         <table class="table table-hover">
            <thead>
                <tr>
                     <th scope="col">Letra</th>
                     <th scope="col">Nombre</th>
                     <th scope="col">Origen</th>
                     <th scope="col">ver</th>
                     <?php if($admin == true):?>
                     <th scope="col">Editar</th>
                     <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                    <?php
                        $contador = 0;
                        $total = ceil(intval($totalCampos) / intval($cantidad));
                        if($total > 0):
                            foreach($bebes as $bebe):
                                ?>
                                <tr class="<?php if($bebe['sexo'] == "mujer"){ ?> table-danger <?php }else{ ?> table-primary <?php } ?>">
                                    <td class="text-capitalize" scope="row"><?php echo $bebe['letra'] ?></td>
                                    <td class="text-capitalize"><?php echo $bebe['nombre'] ?></td>
                                    <td class="text-capitalize"><?php echo $bebe['origen'] ?></td>
                                    <td><a class="text-capitalize" href="nombre.php<?php echo "?token=".$bebe['token']; ?>">ver</a></td>
                                    <?php if($admin == true): ?>
                                    <td><a class="text-capitalize" href="nombre.php<?php echo "?token=".$bebe['token']."&editar=true"; ?>">editar</a></td>
                                    <?php endif; ?>
                                </tr>
                                <?php
                                $contador++;
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td scope="row" colspan="4">Ouh! No tenemos ningún nombre para mostrar :(</td>
                            </tr>
                            <?php
                        endif;
                    ?>
            </tbody>
         </table>
         <div class="informacion">
            <span> Se están mostrando <?php echo ($contador+$num) ?> / <?php echo $totalCampos; ?>
            </span>
         </div>
         <p>
             <?php
             if($total > 0){
                 if(empty($_GET['pag'])){
                     if(($contador+$num) < $totalCampos){
                         ?>
                            <a class="btn btn-primary disabled" href="#" disabled>Atrás</a>
                            <a class="btn btn-primary" href="buscar.php?<?php echo "sexo=".$_GET['sexo']."&"."letra=".$_GET['letra']."&"."cantidad=".$_GET['cantidad']."&"."pag=1"; ?>" >Siguiente</a>
                         <?php

                     }else{
                         ?>
                        <span>Con los filtros que has puesto se están mostrando todos los nombres que hay.</span>
                        <?php
                     }
                 }else{
                     $value = is_numeric(intval(clearFormat($_GET['pag']))) ? intval(clearFormat($_GET['pag'])): 0;
                     if(($contador+$num) < $totalCampos){
                         ?>
                        <a class="btn btn-primary" href="buscar.php?<?php echo "sexo=".$_GET['sexo']."&"."letra=".$_GET['letra']."&"."cantidad=".$_GET['cantidad']."&"."pag=".($value - 1); ?>">Atrás</a>
                        <a class="btn btn-primary" href="buscar.php?<?php echo "sexo=".$_GET['sexo']."&"."letra=".$_GET['letra']."&"."cantidad=".$_GET['cantidad']."&"."pag=".($value + 1); ?>">Siguiente</a>
                        <?php
                     }else{
                         ?>
                        <a class="btn btn-primary" href="buscar.php?<?php echo "sexo=".$_GET['sexo']."&"."letra=".$_GET['letra']."&"."cantidad=".$_GET['cantidad']."&"."pag=".($value - 1); ?>">Atrás</a>
                        <a class="btn btn-primary disabled" href="#">Siguiente</a>
                        <?php
                     }

                 }
             }
             ?>
             <span></span>
         </p>
        </div>
        <form action="get">
            
        </form>
    </div>
    <?php
    include_once "src/includes/footer.php";
    ?>
</body>
</body>
</html>