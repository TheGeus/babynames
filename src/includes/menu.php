<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php">BabyNames</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./blog">Blog</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./niveles.php">Niveles</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
          <?php
            if(!empty($_SESSION["usuario"])){
                ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $url; ?>/perfil.php">Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $url; ?>/logout.php">Salir</a></li>
                <?php
            }else{
                ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $url; ?>/registrarse.php">Registrarse</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $url; ?>/login.php">Login</a></li>
                <?php
            }
        ?>
    </div>
  </div>
</nav>