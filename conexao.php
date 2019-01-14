<?php 

$servidor = "localhost";
$banco = "db_hugovidrosproducao";
$usuario = "userhugo";
$senha = "elias.bsi1204";
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);


	if ($conn->connect_errno) {
		echo "Falha na conex���o!";
	}
	return $conn;
	

 ?>