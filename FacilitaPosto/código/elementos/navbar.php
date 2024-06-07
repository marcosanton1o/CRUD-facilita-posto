<nav class="navbar navbar-expand-lg fixed-top p-2 ">
  <div class="container-fluid">
  <div class="navbar-brand mt-1 d-flex align-items-center" href="#">
    <img id="logo" src="../imagens/taxilogo.jpg" alt="" width="50px" heigth="50px">
    <h4>Facilita Posto</h4>
  </div>
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
      <div class="offcanvas-header">
      <div class="navbar-brand mt-1 d-flex align-items-center" href="#">
    <img id="logo" src="../imagens/taxilogo.jpg" alt="" width="50px" heigth="50px">
    <h4>Facilita Posto</h4>
  </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body align-items-center h4">
        <ul class="navbar-nav justify-content-start  mt-2 flex-grow-1 pe-3">
          <li class="nav-item px-2 py-2">
            <a class="" aria-current="page" href="index.php">Página Inicial</a>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="" aria-current="page" href="posto.php">Posto</a>
          </li>
          <li class="nav-item dropdown">
            
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img class="mx-1" src="../imagens/perfil.png" width="30px" height="30px" alt=""><?php echo $_SESSION['nome']?></a>
    
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="perfil.php">Ver perfil</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="login.php">Trocar usuário</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item btn btn-danger" href="../verify/logout.php">Sair</a></li>
    </ul>
  </li>
        </ul>
      </div>
    </div>
  </div>
</nav>