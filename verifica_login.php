<?php 
if (!isset($_SESSION)) {
	session_start();
}
if (!$_SESSION['usuario']) {
	header('Location: /admin/index.php');
	exit();
}

 ?>
