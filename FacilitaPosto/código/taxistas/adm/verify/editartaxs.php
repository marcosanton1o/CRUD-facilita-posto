<?php
session_start();
require('../../conexao.php');

if (!isset($_SESSION['id_taxista'])) {
    header('Location: ../login.php');
    exit;
}

if (!empty($_POST['botao'])) {

}
        