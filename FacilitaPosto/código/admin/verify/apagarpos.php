<?php
session_start();
require('../conexao.php');

if (!isset($_SESSION['id_admin'])) {
    header('Location: ../login.php');
    exit();
} 

if (isset($_POST['id_posto'])) {
    $estado = $_POST['estado'];
    $id_posto = $_POST['id_posto'];

    try {

        $sqlMembro = "DELETE FROM membro WHERE posto_id_posto = :id_posto";
        $stmtMembro = $conn->prepare($sqlMembro);
        $stmtMembro->bindValue(':id_posto', $id_posto, PDO::PARAM_INT);
        $stmtMembro->execute();

        $sqlPosto = "DELETE FROM posto WHERE id_posto = :id_posto";
        $stmtPosto = $conn->prepare($sqlPosto);
        $stmtPosto->bindValue(':id_posto', $id_posto, PDO::PARAM_INT);
        $stmtPosto->execute();

        $conn->commit();

        header("Location: ../posto.php?estado_posto=" . urlencode($estado) . "&delete=ok");
        exit();

    } catch (Exception $e) {
        $conn->rollBack();
        echo "Failed to delete the record: " . htmlspecialchars($e->getMessage());
    }
}
?>
