<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules\parsleyjs\src\parsley.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
    <!--bootstrap-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
        <style>
        body {
          background-color: #FFD700;
          color: black;
          height: 100%;
        }
        img{
          border-radius: 30px;
        }
        .form-container {
          padding: 2rem;
          max-width: 500px;
          width: 100%;
          font-size:20px;
          font-family: 'Roboto', sans-serif;
        }
        #form {
          background-color: white;
          width: 100%;
        }
        #mostrarSenha{
          font-size:10px;
        }
        #botao{
            font-size: 20px;
            padding: 10px;
        }
      </style>
</head>
<body class="d-flex align-items-center justify-content-center flex-col">
    <main class="form-container">
      <form action="verify/logar.php" method="POST" class=" p-5 rounded shadow" id="form">
          <div class="mb-3 mt-3 d-flex justify-content-center align-items-center flex-wrap">
            <img src="../imagens/taxilogo.jpg" alt="" width="60px" heigth="60px">
            <h2>FacilitaPosto</h2>
          </div>
          <div class="mb-3 mt-3 py-2">
            <label for="inputEmail" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>        
          </div>
          <div class="mb-3 mt-3 py-2">
            <label for="inputSenha" class="form-label">Senha:</label>
            <input type="password" id="inputSenha" minlength="8" name="senha" class="form-control" required>
          </div>
          
            <div class="form-check mt-3 mb-3">
              <input type="checkbox" class="form-check-input" id="mostrarSenha" onclick="mostrarsenha()">
              <label class="form-check-label " for="mostrarSenha">Mostrar senha</label>
            </div>
            <a href="login2.php" class="mt-3 mb-3 d-flex justify-content-center">Entrar como Adm</a>
          <div class="d-flex justify-content-center mt-4">
            <input class="btn btn-primary mx-1 px-5" type="submit" name="botao" id="botao" value="Login">
          </div>
      </form>
    </main>
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