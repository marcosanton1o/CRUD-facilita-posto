<?php
include('elementos/comando.php')
?>

<?php
include('elementos/header.php');
?>
<main>
<?php
$id_posto_usuario = ":posto_id_posto"

$sqlcon = "SELECT COUNT(*) AS total_taxistas FROM posto WHERE membro.posto_id_posto = :id_posto";
$resu = $conn->prepare($sqlcon);
$resu->bindParam(':id_posto', $posto_id_usuario, PDO::PARAM_INT);
$resu->execute();
$taxistas = $resu->fetch(PDO::FETCH_ASSOC);
?>
</main>
<?php
include('elementos/footer.php');
?>




    