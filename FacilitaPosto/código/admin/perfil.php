<?php
include('elementos/comando.php');
$posto_id_posto = $_SESSION['posto_id_posto'];
$sql = "SELECT *
        FROM posto
        JOIN membro ON membro.posto_id_posto = posto.id_posto
        WHERE membro.posto_id_posto = :posto_id_posto";
$resu = $conn->prepare($sql);
$resu->bindParam(':posto_id_posto', $posto_id_posto, PDO::PARAM_INT);
$resu->execute();
$postoinf = $resu->fetch();

include('elementos/header.php');
?>
<div class="container-fluid col pb-3 bg-dark" style="margin-top:30px">
      <div class="col-sm-4">
        <img src="imagens/perfil.png" class="mx-4 mt-4" style="border-radius:60px;" width="90px" height="90px" alt=""></div>
      <div class="h4 mt-2 mx-4 text-white">Nome: <?php echo $_SESSION['nome'];?></div>
      <div class="h6 mt-2 mx-4 text-white">Email: <?php echo $_SESSION['email'];?></div>
    </div>
      <div class="col-lg-6  p-2">
        <table class="table">
          <h3>Informações Pessoais:</h3>
          <tbody>
</tr>
<tr>
  <th scope='row'>ID:</th>
  <td class='d-flex justify-content-between'><?php echo $_SESSION['id_admin'] ?>
</td>
</tr>

<tr>
  <th scope='row'>Nome:</th>
  <td class='d-flex justify-content-between'><?php echo $_SESSION['nome']?> 
  <button type='button' id="" class='btn btn-warning' data-bs-toggle="modal" data-bs-target="#modal1">
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
</svg>
</button> 
</td>
</tr>
<tr>
  <th scope='row'>Cidade:</th>
  <td class='d-flex justify-content-between'><?php echo $_SESSION['local_cidade']?> 
  <button type='button' id="" class='btn btn-warning' data-bs-toggle="modal" data-bs-target="#modal1">
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
</svg>
</button> 
</td>
</tr>
<tr>
  <th scope='row'>CPF:</th>
  <td class='d-flex justify-content-between'><?php echo $_SESSION['cpf']?> 
<button type='button' id="" class='btn btn-warning' data-bs-toggle="modal" data-bs-target="#modal2">
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
</svg>
</button>
</td>
</tr>

<tr>
  <th scope='row'>Número de Telefone:</th>
  <td class='d-flex justify-content-between'><?php echo $_SESSION['numeroTel']?> 
  <button type='button' id="" class='btn btn-warning' data-bs-toggle="modal" data-bs-target="#modal3">
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
</svg>
</button>
</td>
</tr>

<tr>
  <th scope='row'>Data de nascimento:</th>
  <td class='d-flex justify-content-between'><?php echo $_SESSION['idade']?> 
  <button type='button' id="" class='btn btn-warning' data-bs-toggle="modal" data-bs-target="#modal4">
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
</svg>
</button>
</td>
</tr>

<div  class='modal fade' id="modal1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true"  data-bs-keyboard='false' tabindex='-1'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
        <button type="button" class="btn btn-primary">Alterar</button>
      </div>
    </div>
  </div>
  </div>

  <div  class='modal fade' id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true"  data-bs-keyboard='false' tabindex='-1'>
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
        <button type="button" class="btn btn-primary">Alterar</button>
      </div>
    </div>
  </div>

  </div>

  <div class='modal fade' id="modal3" tabindex="-1" aria-labelledby="modal3Label" aria-hidden="true"  data-bs-keyboard='false' tabindex='-1'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='staticBackdropLabel'>Modal title</h1>
        <button type='button' id="" class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
          <label for="inputPassword5" class="form-label">Número de telefone novo:</label>
          <button type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
          <div id="passwordHelpBlock" class="form-text">
          <div class='d-flex justify-content-between'>
        <div>Tem certeza que deseja Alterar?</div>
        <div>
         <button type='button' id="" class='btn btn-secondary w-50 h-25' data-bs-dismiss='modal'>Sair</button>
        <button type='button' id="" class='btn btn-primary w-50 h-25 botao '>Alterar</button>
        </div>
      </div>   
          </div>
      </div>
    </div>
  </div>
  </div>

  <div  class='modal fade' id="modal4" tabindex="-1" aria-labelledby="modal4Label" aria-hidden="true"  data-bs-keyboard='false' tabindex='-1'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='staticBackdropLabel'>Modal title</h1>
        <button type='button' id="" class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
          <label for="inputPassword5" class="form-label">Número de telefone novo:</label>
          <button type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
          <div id="passwordHelpBlock" class="form-text">
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
        <button type="button" class="btn btn-primary">Alterar</button>
      </div>
      </div>
    </div>
  </div>
  </div>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>

<?php
include('elementos/footer.php');
?>