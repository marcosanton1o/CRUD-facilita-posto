<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    nav{
    background-color:#FFD700;
  }
  nav img{
      border-radius: 30px;
    }
    nav a{
      text-decoration:none;
      color:black;
    }
    #coprit{
    width: 100vh;
    color: gray;
    font-weight: 500;
}

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top p-2 ">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
  <button class="navbar-toggler mx-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-brand mt-1 d-flex align-items-center" href="#">
    <img id="logo" src="imagens/taxilogo.jpg" alt="" width="50px" heigth="50px">
    <h4>Facilita Posto</h4>
  </div>
  </div>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
      <div class="offcanvas-header">
      <div class="navbar-brand mt-1 d-flex align-items-center" href="#">
    <img id="logo" src="imagens/taxilogo.jpg" alt="" width="50px" heigth="50px">
    <h4>Facilita Posto</h4>
  </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body align-items-center h4">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item px-4 py-2">
            <a aria-current="page" href="index.php">Página Inicial</a>
          </li>
          <li class="nav-item px-4 py-2">
            <a aria-current="page" href="posto.php">Posto</a>
          </li>
          <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="mx-1" src="imagens/perfil.png" width="30" height="30" alt=""><?php echo $_SESSION['nome']?>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="perfil.php">Ver perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="../trocar.php">Trocar usuário</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item btn btn-danger" href="verify/logout.php">Sair</a></li>
    </ul>
  </li>
        </ul>
      </div>
    </div>
  </div>
</nav>