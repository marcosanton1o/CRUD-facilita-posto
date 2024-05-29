<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
if(isset($_POST['nome']) && isset($_POST['numerotel']) && isset($_POST['email']) && isset($_POST['senha'])){
    require '../conexao.php';
    $nome = $_POST['nome'];
    $numero = $_POST['numerotel'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM membro WHERE nome = :nome AND senha = :senha AND email = :email AND numerotel = :numerotel;";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":nome", $nome);
    $resultado->bindValue(":numerotel", $numerotel);
    $resultado->bindValue(":email", $email);
    $resultado->bindValue(":senha", $senha);
    $resultado->execute();

    if ($stmt->rowCount() > 0) {
        $dados = $stmt->fetch();
        
            $_SESSION['id'] = $dados['id_taxista'];

            header('Location: ../home.php');
        } else {
            header('Location: ../login.php?erro=ok');
        }
    }
}
    ?>