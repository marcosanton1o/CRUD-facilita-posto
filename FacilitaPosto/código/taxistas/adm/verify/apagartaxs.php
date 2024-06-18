<?php
session_start();
require('../../conexao.php');

if (!isset($_SESSION['id_taxista'])) {
    header('Location: ../login.php');
}
if (isset($_POST['botao']) && !empty($_POST['botao'])) {
    $sqlta = "SELECT * FROM membro
              JOIN posto ON membro.posto_id_posto = posto.id_posto
              WHERE membro.posto_id_posto = :posto_id_posto";
    $resuta = $conn->prepare($sqlta);
    $resuta->bindParam(':posto_id_posto', $posto_id_posto, PDO::PARAM_INT);
    $resuta->execute();
    $taxistas = $resuta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($taxistas as $taxista) {
        
    }
    if (isset($taxista['id_taxista']) && !empty($taxista['id_taxista'])) {
        $id_taxista = $taxista['id_taxista'];

        $sql = "DELETE FROM membro WHERE id_taxista = :id_taxista";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_taxista', $id_taxista);

        if ($stmt->execute()) {
            header("Location: ../posto.php");
        }
        
    }
}
?>