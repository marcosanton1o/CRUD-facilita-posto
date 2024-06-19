<?php
session_start();
require('../conexao.php');

if (!isset($_SESSION['id_admin'])) {
    header('Location: ../login.php');
}

if (isset($_POST['botao']) && !empty($_POST['botao'])) {
    if (isset($_POST['tel'], $_POST['data'], $_POST['capacidade'], $_POST['cidade'], $_POST['cep'], $_POST['estado']) && !empty($_POST['tel']) && !empty($_POST['data']) && !empty($_POST['capacidade']) && !empty($_POST['cidade']) && !empty($_POST['cep']) && !empty($_POST['estado'])) {

        $tel = $_POST['tel'];
        $data = $_POST['data'];
        $capacidade = $_POST['capacidade'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        $estado = $_POST['estado'];

        $id_admin = $_SESSION['id_admin'];
        $sql_posto = "SELECT posto.admin_postos_id_admin FROM posto WHERE admin_postos_id_admin = :id_admin";
        $resupos = $conn->prepare($sql_posto);
        $resupos->bindValue(':id_admin', $id_admin);
        $resupos->execute();
        $resuposto = $resupos->fetch(PDO::FETCH_ASSOC);
        if ($resuposto) {
            
            $sql = "INSERT INTO posto (numero_Tel_Posto, data_criacao, capacidade, local_cidade, cep, local_estado, admin_postos_id_admin) 
                    VALUES (:numero_Tel_Posto, :data_criacao, :capacidade, :local_cidade, :cep, :local_estado, :admin_postos_id_admin)";
            $resu = $conn->prepare($sql);

            $resu->bindValue(":numero_Tel_Posto", $tel);
            $resu->bindValue(":data_criacao", $data);
            $resu->bindValue(":capacidade", $capacidade);
            $resu->bindValue(":local_cidade", $cidade);
            $resu->bindValue(":cep", $cep);
            $resu->bindValue(":local_estado", $estado);
            $resu->bindValue(":admin_postos_id_admin", $id_admin);
            $resu->execute();

            if ($resu->rowCount() > 0) {
                header("Location: ../posto.php");
                exit();
            } else {
                header('Location: ../posto.php');
            }
        }
        } else {
            echo "algo está errado com o formulário";
        }
    } else {
        header('Location: ../posto.php');
        exit();
    }

?>