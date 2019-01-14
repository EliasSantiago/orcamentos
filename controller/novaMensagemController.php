<?php 
include '../model/conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];
$status = "Nova";

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $data = date('d/m/Y H:i:s', time());

$var = new Conexao();
$var->novaMensagem($nome, $email, $telefone, $mensagem, $status, $data);

 ?>