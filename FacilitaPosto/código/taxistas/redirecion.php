<?php
session_start();
require('conexao.php');
if(!isset($_SESSION['id_taxista'])){
    header('Location: login.php');
  }
  else{
if($_SESSION['admin_posto'] = 0){
    header('Location: taxista/index.php');
}
else{
    header('Location: adm/index.php');
}
  }
?>