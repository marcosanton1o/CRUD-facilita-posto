<?php
session_start();
require ('conexao.php');
if(!isset($_SESSION['id_admin'])){
  header('Location: login.php');
}
?>