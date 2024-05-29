<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules\parsleyjs\src\parsley.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
    <style>
      html,body{
        height: 100%;
      }
        body{
          color:white;
    font-size:larger ;
    font-family:sans-serif ;
    background-color: #F1C059;
}
#taxiimg{
  width:500px;
  height:570px;
}
#login{
  width: 500px;
  background-color:#012533;
}
h1{
    text-align: center;
}

{
    border-radius:3
}
#taxilogo{
  border-radius:10px;
}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="d-flex align-items-center py-1">
    <main class="d-flex justify-content-center w-100 m-auto flex-wrap" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
    <img src="imagens/taxilogo3.png" alt="" id="taxiimg" class="bg-tert" srcset="">
        <form action="verify/logar.php" method="POST" class="p-4 mb-5" id="login" data-parsley-validate>
            <div class="d-flex justify-content-center align-items-center flex-wrap">
                <img src="imagens/taxilogo.jpg" alt="Logotipo" id="taxilogo" width="55px" height="55px">
                <h1 class=" form-label mt-3 mb-1">Facilita posto</h1>
            </div>
          <div class="form-group mb-3">
            <label for="login" class="form-label mt-2" required>Nome:</label>
            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" required>
          </div>
            <div class="form-group mb-3">
                <label for="numeroTel" class="form-label ">Número:</label>
                <input type="number" class="form-control" name="numerotel"  placeholder="Digite seu número" required>
            </div>
          <div class="form-group mb-3 ">
            <label for="Email">Email:</label>
            <input type="email" class="form-control" id="inputEmail"  name="email" placeholder="Digite seu email"  required>
          </div>
          <div class="form-group mb-3 ">
            <label for="Senha">Senha:</label>
            <input type="password" class="form-control" id="inputSenha"  minlength="8" name="senha" placeholder="Digite sua senha" required>
          </div>
          <div class="form-check mt-2 d-inline ">
            <input type="checkbox" class="form-check-input" id="mostrarSenha" onclick="mostrarsenha()">
            <label class="form-check-label mb-2" for="mostrarSenha">Mostrar senha</label>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-center">
        <input type="submit" class="btn btn-primary py-2  mb-1" name="botao" value="Fazer login">
        </div>
            </form>
        </main> 
        <!--bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!--parsley-->
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/parsleyjs/dist/parsley.min.js"></script>
        <script src="node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
  <script>
    function mostrarsenha() {
      var inputSenha = document.getElementById('inputSenha');
      var checkbox = document.getElementById('mostrarSenha');
      if (checkbox.checked) {
        inputSenha.type = 'text';
      } else {
        inputSenha.type = 'password';
      }
    }
  </script>
</body>
</html>