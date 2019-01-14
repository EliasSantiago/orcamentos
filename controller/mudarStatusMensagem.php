<?php 
include '../model/conexao.php';

$chave = $_POST['id-mensagem'];

$var = new Conexao();
$var->mudarStatusMensagem($chave);


?>