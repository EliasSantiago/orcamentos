<?php 
include '../model/conexao.php';

$chave = $_POST['chave'];

$var = new Conexao();
$var->buscarMensagens($chave);

 ?>