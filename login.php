<?php
session_start(); 
include 'conexao.php';

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();	
}


$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT id, nome FROM tb_admin WHERE nome = '{$usuario}' AND senha = md5('{$senha}')";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: painel.php');
	exit();
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

?>