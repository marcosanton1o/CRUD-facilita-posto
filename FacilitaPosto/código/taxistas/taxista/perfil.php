<?php
include('elementos/comando.php');
?>
<?php
$posto_id_posto = $_SESSION['posto_id_posto'];
$sql = "SELECT membro.nome, membro.email, membro.idade, membro.id_taxista, membro.placa_carro 
        FROM membro
        JOIN posto ON membro.posto_id_posto = posto.id_posto
        WHERE membro.posto_id_posto = :posto_id_posto";
$resu = $conn->prepare($sql);
$resu->bindParam(':posto_id_posto', $posto_id_posto, PDO::PARAM_INT);
$resu->execute();
$taxistas = $resu->fetchAll();
?>
<?php
include('elementos/header.php');
?>

<?php
include('elementos/footer.php');
?>