<?php
include('elementos/comando.php');
$sqlre = "SELECT * FROM membro";
$resure = $conn->prepare($sqlre);
$resure->execute();
$taxistare = $resure->fetchAll();
?>
<?php
include('elementos/header.php');
?>
<div class="container-fluid col pb-3 bg-dark" style="margin-top:55px">
      <div class="col-sm-4">
        <img src="imagens/perfil.png" class="mx-5 mt-4" style="border-radius:60px;" width="90px" height="90px" alt=""></div>
      <div class="h4 mt-2 mx-4 text-white">Nome: <?php echo $_SESSION['nome'];?></div>
      <div class="h6 mt-2 mx-4 text-white">Email: <?php echo $_SESSION['email'];?></div>
    </div>

    <div class="col-sm-8">
        <div class="mx-3">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2020</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

      <h2 class="mt-5">TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2020</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
    </div>
  </div>
<?php
include('elementos/footer.php');
?>