<?php
include('elementos/comando.php');
?>
<?php
$posto_id_posto = $_SESSION['posto_id_posto'];
$sql = "SELECT * FROM membro
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
if(count($taxistas) > 0){
  ?>
  <div class="mt-5 p-3">
<table class="table ">
  <thead>
    <tr>
      <th>Cargo</th>
      <th>ID</th>
      <th>Nome</th>
      <th>Idade</th>
      <th>Placa do carro</th>
      <th>Email</th>
    </tr>
  </thead>
  <h1>Taxistas do Posto</h1>
<tbody>
<?php
foreach($taxistas as $taxista){
if($taxista['admin_posto'] == 0){
  
    echo "<tr>"; 
    echo  "<td> Taxista</td>";
    echo  "<td>" . $taxista['id_taxista'] . "</td>"; 
    echo  "<td>" . $taxista['nome'] . "</td>";
    echo  "<td>" . $taxista['idade'] . "</td>";
    echo  "<td>" . $taxista['placa_carro'] . "</td>";
    echo  "<td>" . $taxista['email'] . "</td>";
    echo  "</tr>";
  }
  else {
    echo "<tr>"; 
    echo  "<td>Administrador</td>";
    echo  "<td>" . $taxista['id_taxista'] . "</td>"; 
    echo  "<td>" . $taxista['nome'] . "</td>";
    echo  "<td>" . $taxista['idade'] . "</td>";
    echo  "<td>" . $taxista['placa_carro'] . "</td>";
    echo  "<td>" . $taxista['email'] . "</td>";
    echo  "</tr>";
  }
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