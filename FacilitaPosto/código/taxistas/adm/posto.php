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
    
    $sqlpo = "SELECT * FROM posto WHERE id_posto = :posto_id_posto";
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
<a href="cadastro.php" type="button" class="btn btn-primary">
  Adicionar
</a>


<?php
foreach($taxistas as $taxista){
if($taxista['admin_posto'] == 0){
  
    echo "<tr>"; 
    echo  "<td> Taxista</td>";
    echo  "<td>" . $taxista['id_taxista'] . "</td>"; 
    echo  "<td>" . $taxista['nome'] . "</td>";
    echo  "<td>" . $taxista['idade'] . "</td>";
    echo  "<td>" . $taxista['email'] . "</td>";
    echo  "<td> <a href='editartax.php' type='button' id='' class='btn mx-3 btn-warning' data-bs-toggle='modal' data-bs-target='#modal1 style='padding:5px; border-radius:5px'>
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
</svg>
</a> <a href='apagar.php' type='button' id='' class='btn mx-3 btn-danger' data-bs-toggle='modal' data-bs-target='#modal2' style='padding:5px; border-radius:5px'>
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
</svg>
</a>
<div class='modal fade' id='modal2' tabindex='-1' aria-labelledby='modal4Label' aria-hidden='true'  data-bs-keyboard='false' tabindex='-1'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='staticBackdropLabel'>Editar</h1>
      </div>
      <div class='modal-body'>
      <form action='verify/apagartaxs.php' method='post'>
      <button type='button' id='' class='btn-close' data-bs-dismiss='modal' aria-label='Sair'></button>
          <div class='d-flex justify-content-center mt-4'>
          <input type='hidden' name='id' value='". $taxista['id_taxista'] ."'>
          <input type='hidden' name='nome' value='". $taxista['nome'] ."'>
          <div class'd-flex justify-content-around'>
            <label for='apagar'>Tem certeza que quer apagar?</label>
            <input class='btn btn-danger mx-1 px-5' type='submit' name='botao' id='botao' value='Apagar'>
            </div>
          </div>
      </form>
      </div>
      </div>
    </div>
  </div>";
?>
      </div>
      </div>
    </div>
  </div>
</div>
</td>
<?php
echo  "</td>";
    echo  "</tr>";
  }
  else {
    echo "<tr>"; 
    echo  "<td>Administrador</td>";
    echo  "<td>" . $taxista['id_taxista'] . "</td>"; 
    echo  "<td>" . $taxista['nome'] . "</td>";
    echo  "<td>" . $taxista['idade'] . "</td>";
    echo  "<td>" . $taxista['email'] . "</td>";
    echo  "<td> <a href='editartax.php' type='button' id='' class='btn mx-3 btn-warning' data-bs-toggle='modal' data-bs-target='#modal1 style='padding:5px; border-radius:5px'>
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
</svg>
</a> <a href='apagar.php' type='button' id='' class='btn mx-3 btn-danger' data-bs-toggle='modal' data-bs-target='#modal2' style=' padding:5px; border-radius:5px'>
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
</svg>
</a>
<div class='modal fade' id='modal2' tabindex='-1' aria-labelledby='modal4Label' aria-hidden='true'  data-bs-keyboard='false' tabindex='-1'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='staticBackdropLabel'>Editar</h1>
      </div>
      <div class='modal-body'>
      <form action='verify/apagartaxs.php' method='post'>
      <button type='button' id='' class='btn-close' data-bs-dismiss='modal' aria-label='Sair'></button>
          <div class='d-flex justify-content-center mt-4'>
          <input type='hidden' name='id' value='". $taxista['id_taxista'] ."'>
          <input type='hidden' name='nome' value='". $taxista['nome'] ."'>
          <div class'd-flex justify-content-around'>
            <label for='apagar'>Tem certeza que quer apagar?</label>
            <input class='btn btn-danger mx-1 px-5' type='submit' name='botao' id='botao' value='Apagar'>
            </div>
          </div>
      </form>
      </div>
      </div>
    </div>
  </div>
</td>";
echo "</tr>";  
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
