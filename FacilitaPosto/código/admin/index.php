<?php
include('elementos/comando.php')
?>
<?php
include('elementos/header.php');
?>
<main class="">
<?php
$admin_postos_id_admin = $_SESSION['id_admin'];
$sqlpo = "SELECT * FROM posto
          JOIN admin_postos ON posto.admin_postos_id_admin = admin_postos.id_admin
          WHERE posto.admin_postos_id_admin = :admin_postos_id_admin;";
$resupo = $conn->prepare($sqlpo);
$resupo->bindParam(':admin_postos_id_admin', $admin_postos_id_admin);
$resupo->execute();
$postos = $resupo->fetchAll(PDO::FETCH_ASSOC);
$contPos = count($postos);
?>
<div class="d-flex justify-content-center" style="margin-top:55px;">
<a href="posto.php" class="card w-25" style="text-decoration: none;">
  <div class="card-body d-flex bg-primary">
    <h4 class="px-3">Quantidade de Postos: <?php echo $contPos?></h4><img src="imagens/setap2.png" width="30px" height="30px" alt="" srcset="">
  </div>
</a>
</div>
</main>
<?php
include('elementos/footer.php');
?>

<!--$posto_id_posto = $_SESSION['posto_id_posto'];
$sql = "SELECT *
        FROM posto
        JOIN admin_postos ON posto.posto_id_posto = posto.id_posto
        WHERE membro.posto_id_posto = :posto_id_posto";
$resu = $conn->prepare($sql);
$resu->bindParam(':posto_id_posto', $posto_id_posto, PDO::PARAM_INT);
$resu->execute();
$taxistas = $resu->fetchAll();-->


    