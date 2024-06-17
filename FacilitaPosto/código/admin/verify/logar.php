<?php
session_start();
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require ('../conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM admin_postos WHERE email = :email AND senha = :senha;";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":email", $email);
    $resultado->bindValue(":senha", $senha);
    $resultado->execute();

    if ($resultado->rowCount() > 0) {
        $dados = $resultado->fetch();
        
            $_SESSION['id_admin'] = $dados['id_admin'];
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['email'] = $dados['email'];
            $_SESSION['local_cidade'] = $dados['local_cidade'];
            $_SESSION['local_estado'] = $dados['local_estado'];
            $_SESSION['cpf'] = $dados['cpf'];
            $_SESSION['numeroTel'] = $dados['numeroTel'];
            $_SESSION['idade'] = $dados['idade'];
            header('Location: ../index.php');
        }
        else{
            header('Location: ../login.php');
        }
    }
    else {
        echo 'Verifique se está tudo preenchido';
    }

    ?>