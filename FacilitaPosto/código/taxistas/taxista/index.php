<?php
include('elementos/comando.php')
?>
<?php
include('elementos/header.php');
?>
<main class="container-fluid">
<?php
$sql = "SELECT * FROM membro
JOIN posto ON membro.posto_id_posto = posto.id_posto";
$resuta = $conn->prepare($sqlta);
$resuta->execute();
$taxistas = $resuta->fetchAll(PDO::FETCH_ASSOC);
$contTax = count($taxistas);
?>
<div class="card" style="margin-top:55px; text-align: center;">>
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h4>Quantidade de taxistas: <?php echo $contTax?></h4>
  </div>
</div>
</main>
<?php
include('elementos/footer.php');
?>




    