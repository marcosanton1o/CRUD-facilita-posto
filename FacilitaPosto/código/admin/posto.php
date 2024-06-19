<?php
include('elementos/comando.php');
?>
<?php

$admin_postos_id_admin = $_SESSION['id_admin'];
$sqlpo = "SELECT * FROM posto
          JOIN admin_postos ON posto.admin_postos_id_admin = admin_postos.id_admin
          WHERE posto.admin_postos_id_admin = :admin_postos_id_admin;";
$resupo = $conn->prepare($sqlpo);
$resupo->bindParam(':admin_postos_id_admin', $admin_postos_id_admin);
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
      <th>ID:</th>
      <th>Telefone:</th>
      <th>Estado:</th>
      <th>Data de criação:</th>
      <th>CEP:</th>
      <th>Cidade:</th>
    </tr>
  </thead>
  <h2>Posto:</h2>
<tbody>
<a href="cadastro.php" type="button" class="btn btn-primary">
  Adicionar
</a>
<?php
        foreach($postos as $posto) {
            echo "<tr>"; 
            echo "<td>" . $posto['id_posto'] . "</td>"; 
            echo "<td>" . $posto['numero_Tel_Posto'] . "</td>";
            echo "<td>" . $posto['local_estado'] . "</td>";
            echo "<td>" . $posto['data_criacao'] . "</td>";
            echo "<td>" . $posto['CEP'] . "</td>";
            echo "<td>" . $posto['local_cidade'] . "</td>";
            echo  "<td> <a href='verify/editarpos.php' type='button' id='' class='btn mx-3 btn-warning' data-bs-toggle='modal' data-bs-target='#modal1 style='padding:5px; border-radius:5px'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
          </svg>
          </a> <a type='button' id='' class='btn mx-3 btn-danger' data-bs-toggle='modal' data-bs-target='#modal2' style=' padding:5px; border-radius:5px'>
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
                <form action='verify/apagarpos.php' method='POST'>
                <button type='button' id='' class='btn-close' data-bs-dismiss='modal' aria-label='Sair'></button>
                    <input type='hidden' name='id_posto' value='". $posto['id_posto'] ."'>
                    <input type='hidden' name='estado' value='". $posto['local_estado'] ."'>
                    <div class'd-flex justify-content-around'>
                      <label for='apagar' class='mx-3' >Tem certeza que quer apagar?</label>
                      <input class='btn btn-danger mx-5 ' type='submit' name='botao' id='botao' value='Apagar'>
                      </div>
                </form>
                </div>
                </div>
              </div>
            </div>
          </td>";
            echo "</tr>";
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
