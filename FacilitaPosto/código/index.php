<?php

session_start();
require 'conexao.php';
if(!isset($_SESSION['id_taxista'])){
  header('Location: login.php');
}
$sql = "SELECT * FROM membro
JOIN posto ON posto.id_posto = posto_id_posto";
$resu = $conn->prepare($sql);
$resu->execute();
$taxistas = $resu->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
include('elementos/navbar.php');
?>

<div class="mt-5 p-3">
<table class="table ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Idade</th>
      <th>Placa do carro</th>
      <th>Email</th>
    </tr>
  </thead>
<?php 
if(count($taxistas) > 0){
  ?>
  <h1>Taxistas do Posto</h1>
<tbody>
<?php
  foreach($taxistas as $taxista){
    echo "<tr>"; 
    echo  "<td>" . $taxista['id_taxista'] . "</td>"; 
    echo  "<td>" . $taxista['nome'] . "</td>";
    echo  "<td>" . $taxista['idade'] . "</td>";
    echo  "<td>" . $taxista['placa_carro'] . "</td>";
    echo  "<td>" . $taxista['email'] . "</td>";
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>