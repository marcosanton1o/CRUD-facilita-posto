<?php
include('elementos/comando.php')
?>
<?php
include('elementos/header.php');
?>
<main class="">
<?php
$posto_id_posto = $_SESSION['posto_id_posto'];
$sql = "SELECT membro.nome, membro.email, membro.idade, membro.id_taxista, membro.placa_carro 
        FROM posto
        JOIN membro ON membro.posto_id_posto = posto.id_posto
        WHERE membro.posto_id_posto = :posto_id_posto";
$resu = $conn->prepare($sql);
$resu->bindParam(':posto_id_posto', $posto_id_posto, PDO::PARAM_INT);
$resu->execute();
$taxistas = $resu->fetchAll();
?>
        <img src="" class="container-fluid mt-5" height="700px" alt="">
</main>
<?php
include('elementos/footer.php');
?>




    