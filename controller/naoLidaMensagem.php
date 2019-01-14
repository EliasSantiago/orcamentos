<?php 
include '../model/conexao.php';

$chave = $_POST['id-nao-lida'];

$var = new Conexao();
$var->naoLidaMensagem($chave);


?>