<?php
include('elementos/comando.php');
?>
<?php
$admin_postos_id_admin = $_SESSION['id_admin']
$sqlpo = "SELECT * FROM posto
              JOIN admin_postos ON posto.admin_postos_id_admin = admin_postos.id_admin
              WHERE posto.admin_postos_id_admin = :admin_postos_id_admin;";
    $resupo = $conn->prepare($sqlpo);
    $resuta->bindParam(':admin_postos_id_admin', $admin_postos_id_admin, PDO::PARAM_INT)
    $resupo->execute();
    $postos = $resupo->fetchAll(PDO::FETCH_ASSOC);

    /*$sqlpo = "SELECT * FROM posto
JOIN membro ON membro.posto_id_posto = posto.id_posto
WHERE membro.posto_id_posto = :posto_id_posto";
$resupo = $conn->prepare($sqlpo);
$resupo->bindParam(':posto_id_posto', $posto_id_posto, PDO::PARAM_INT);
$resupo->execute();
$postoinf = $resupo->fetchAll(PDO::FETCH_ASSOC);
*/
?>
<?php
include('elementos/header.php');
?>
<?php 
if(count($postos) > 0){
  ?>
  <div class="col-lg-8 mt-5 p-3 py-4">
<table class="table mt-2">
  <thead>
    <tr>
      <th>ID</th>
      <th>Estado</th>
      <th class="d-flex flex-wrap">Data de criação</th>
      <th>CEP</th>
      <th>Cidade</th>
    </tr>
  </thead>
  <h2>Posto:</h2>
<tbody>
<?php


foreach($postos as $posto){
  
    echo "<tr>"; 
    echo  "<td>" . $posto['id_posto'] . "</td>"; 
    echo  "<td>" . $posto['local_estado'] . "</td>";
    echo  "<td>" . $posto['data_criacao'] . "</td>";
    echo  "<td>" . $posto['CEP'] . "</td>";
    echo  "<td>" . $posto['local_cidade'] . "</td>";
    echo  "</tr>";
  }
?>
</tbody>
<?php 
}else{
  echo "<h1>Algo está errado</h1>";
}
?>
</table>
</div>
<?php
include('elementos/footer.php');
?>
