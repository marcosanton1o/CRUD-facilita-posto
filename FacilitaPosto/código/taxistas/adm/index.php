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
$contTax = count($taxistas);
?>
<div class="d-flex justify-content-center" style="margin-top:55px;">
<a href="posto.php" class="card w-25" style="text-decoration: none;">
  <div class="card-body d-flex bg-primary">
    <h4 class="px-3">Quantidade de taxistas: <?php echo $contTax?></h4><img src="imagens/setap2.png" width="30px" height="30px" alt="" srcset="">
  </div>
</a>
</div>
</main>
<?php
include('elementos/footer.php');
?>




    