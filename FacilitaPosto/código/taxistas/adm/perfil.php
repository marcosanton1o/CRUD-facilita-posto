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
<div class="container-fluid col pb-3 bg-dark" style="margin-top:55px">
      <div class="col-sm-4">
        <img src="imagens/perfil.png" class="mx-4 mt-4" style="border-radius:60px;" width="90px" height="90px" alt=""></div>
      <div class="h4 mt-2 mx-4 text-white">Nome: <?php echo $_SESSION['nome'];?></div>
      <div class="h6 mt-2 mx-4 text-white">Email: <?php echo $_SESSION['email'];?></div>
    </div>
<div class="container-fluid">
    <div class="col-lg-6 my-2 p-2">
    <table class="table">
          <h3>Informações do Posto:</h3>
          <tbody>
<tr>
  <th scope='row'>ID:</th>
  <td class='d-flex justify-content-between'><?php echo $postoinf['id_posto'] ?>
</td>
</tr>
<tr>
  <th scope='row'>Estado:</th>
  <td class='d-flex justify-content-between'><?php echo $postoinf['local_estado']?><div>
</td>
</tr>
<tr>
  <th scope='row'>Data de criação:</th>
  <td class='d-flex justify-content-between'><?php echo $postoinf['data_criacao'] ?>
</td>
</tr>
<tr>
  <th scope='row'>Cidade:</th>
  <td class='d-flex justify-content-between'><?php echo $postoinf['local_cidade']?><div>
 
</td>
</tr>
<tr>
  <th scope='row'>Número de Telefone:</th>
  <td class='d-flex justify-content-between'><?php echo $postoinf['numero_Tel_Posto']?><div>
   
</td>
</tr>
<tr>
  <th scope='row'>CEP:</th>
  <td class='d-flex justify-content-between'><?php echo $postoinf['CEP']?><div>
</td>
</tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-6 my-2 p-2">
        <table class="table">
          <h3>Informações Pessoais:</h3>
          <tbody>
            <?php
            if($_SESSION['admin_posto'] == 0){
              include('../modal/infta.php');
              }
              else {
              include('../modal/infadm.php');
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>

<?php
include('elementos/footer.php');
?>