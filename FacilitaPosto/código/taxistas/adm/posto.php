<?php
include('elementos/comando.php');
?>
<?php
$posto_id_posto = $_SESSION['posto_id_posto'];

$sqlta = "SELECT * FROM membro
              JOIN posto ON membro.posto_id_posto = posto.id_posto
              WHERE membro.posto_id_posto = :posto_id_posto";
    $resuta = $conn->prepare($sqlta);
    $resuta->bindParam(':posto_id_posto', $posto_id_posto, PDO::PARAM_INT);
    $resuta->execute();
    $taxistas = $resuta->fetchAll(PDO::FETCH_ASSOC);

    $sqlpo = "SELECT * FROM posto
JOIN membro ON membro.posto_id_posto = posto.id_posto
WHERE membro.posto_id_posto = :posto_id_posto";
$resupo = $conn->prepare($sqlpo);
$resupo->bindParam(':posto_id_posto', $posto_id_posto, PDO::PARAM_INT);
$resupo->execute();
$postoinf = $resupo->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
include('elementos/header.php');
?>
<?php 
if(count($taxistas) > 0){
  ?>
  <div class="col-lg-8 mt-5 p-3 py-4">
<table class="table mb-4">
  <thead>
    <tr>
      <th>Cargo</th>
      <th>ID</th>
      <th>Nome</th>
      <th>Idade</th>
      <th>Email</th>
    </tr>
  </thead>
  <h2>Taxistas do Posto:</h2>
<tbody>
<?php
foreach($taxistas as $taxista){
if($taxista['admin_posto'] == 0){
  
    echo "<tr>"; 
    echo  "<td> Taxista</td>";
    echo  "<td>" . $taxista['id_taxista'] . "</td>"; 
    echo  "<td>" . $taxista['nome'] . "</td>";
    echo  "<td>" . $taxista['idade'] . "</td>";
    echo  "<td>" . $taxista['email'] . "</td>";
    echo  "</tr>";
  }
  else {
    echo "<tr>"; 
    echo  "<td>Administrador</td>";
    echo  "<td>" . $taxista['id_taxista'] . "</td>"; 
    echo  "<td>" . $taxista['nome'] . "</td>";
    echo  "<td>" . $taxista['idade'] . "</td>";
    echo  "<td>" . $taxista['email'] . "</td>";
    echo  "</tr>";
  }
}
?>
</tbody>
</table>
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


foreach($postoinf as $posto){
  
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
