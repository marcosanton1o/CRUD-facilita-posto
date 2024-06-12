<?php
session_start();
if (isset($_POST['botao'])) {
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require ('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM membro WHERE email = :email AND senha = :senha;";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":email", $email);
    $resultado->bindValue(":senha", $senha);
    $resultado->execute();

    if ($resultado->rowCount() > 0) {
        $dados = $resultado->fetch();
        
            $_SESSION['id_taxista'] = $dados['id_taxista'];
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['email'] = $dados['email'];
            $_SESSION['posto_id_posto'] = $dados['posto_id_posto'];
            $_SESSION['admin_posto'] = $dados['admin_posto'];

            if($_SESSION['admin_posto'] == 0){
            
            header('Location: taxista/index.php');
        }
        else{
            header('Location: adm/index.php');
        }
    }
    else {
        header('Location: login.php');
    }
}
}
    ?>