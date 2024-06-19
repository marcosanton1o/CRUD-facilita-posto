<?php
session_start();
require('../../conexao.php');

if (!isset($_SESSION['id_taxista'])) {
    header('Location: ../login.php');
}
else{
if (isset($_POST['id'])) {
    $nome = $_POST['nome'];
    $id_taxista = $_POST['id'];
    $sqlta = "DELETE FROM membro
              WHERE id_taxista = :id_taxista";
    $resuta = $conn->prepare($sqlta);
    $resuta->bindValue(':id_taxista', $id_taxista);
    $resuta->execute();

    header("Location: ../posto.php?nome_membro=$nome&delete=ok");
}
}
?>