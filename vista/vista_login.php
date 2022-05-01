<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?php echo $appname ?? 'BabyNames' ?></title>
    <?php
    include_once "src/includes/head.php";
    ?>
</head>

<body>
    <?php
    include_once "src/includes/menu.php";
    ?>
    <div class="container">
        <div class="flex justify-content-center" style="height: 70vh">
            <form name="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="flex flex-column justify-content-center align-items-center h-100" style="background-color:#95b8f6;display:flex; justify-content:center; align-content:center;">
                <?php if(!empty($error)): ?>
                    <div class="d-flex flex-column">
                        <p><?php var_dump($error); ?></p>
                    </div>
                <?php endif; ?>
                <div class="d-flex flex-column">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario o Email" required>
                </div>
                <div class="d-flex flex-column">
                    <label for="cantidad">Contraseña</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="d-flex flex-column p-2">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include_once "src/includes/footer.php";
    ?>
</body>
<script type="text/javascript">
    $(function(){
        const usuario = $('#usuario');
        usuario.on('change', function(){
            if($(this).val().includes('@')){
                $(this).attr('type', 'email');
            }else{
                if($(this).attr('type') == 'email'){
                    $(this).attr('type', 'text');
                }
            }
        });
    });
</script>

</html>