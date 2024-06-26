<?php
session_start();
require('../../conexao.php');

if (!isset($_SESSION['id_taxista'])) {
    header('Location: ../login.php');
    exit;
} else {

if (isset($_POST['botao']) && !empty($_POST['botao'])) {
    if (isset($_POST['nome'], $_POST['senha'], $_POST['numeroTel'], $_POST['email'], $_POST['placa_carro'], $_POST['cpf'], $_POST['idade']) && !empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['numeroTel']) && !empty($_POST['email']) && !empty($_POST['placa_carro']) && !empty($_POST['cpf']) && !empty($_POST['idade'])) {

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $numeroTel = $_POST['numeroTel'];
        $email = $_POST['email'];
        $placa_carro = $_POST['placa_carro'];
        $cpf = $_POST['cpf'];
        $idade = $_POST['idade'];

        $id_taxista = $_SESSION['id_taxista'];
        
        $sql_posto = "SELECT posto_id_posto FROM membro WHERE id_taxista = :id_taxista";
        $resupos = $conn->prepare($sql_posto);
        $resupos->bindValue(':id_taxista', $id_taxista);
        $resupos->execute();
        $resuposto = $resupos->fetch(PDO::FETCH_ASSOC);

        if ($resuposto) {
            $posto_id_posto = $resuposto['posto_id_posto'];

            $sql = "INSERT INTO membro (nome, senha, numeroTel, email, placa_carro, cpf, idade, posto_id_posto) 
                    VALUES (:nome, :senha, :numeroTel, :email, :placa_carro, :cpf, :idade, :posto_id_posto)";
            $resu = $conn->prepare($sql);

            $resu->bindValue(":nome", $nome);
            $resu->bindValue(":senha", $senha);
            $resu->bindValue(":numeroTel", $numeroTel);
            $resu->bindValue(":email", $email);
            $resu->bindValue(":placa_carro", $placa_carro);
            $resu->bindValue(":cpf", $cpf);
            $resu->bindValue(":idade", $idade);
            $resu->bindValue(":posto_id_posto", $posto_id_posto);
            $resu->execute();

            header('Location: ../posto.php');
            exit;
        } else {
            echo "algum erro aconteceu, tente novamente";
        }
    } else {
        header('Location: ../posto.php');
        exit;
    }
}
}
?>