<?php 
session_start();
include 'verifica_login.php';
?>

 <!DOCTYPE html>
   <html>
 <head>
 	<title>Painel Administrativo - Piloto Carimbos</title>

 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/style-admin.css">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 </head>
 <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/admin/painel.php">Painel Adm</a></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/admin/view/fale_conosco.php">Mensagens</a>
        <a class="p-2 text-dark" href="/admin/view/orcamentos.php">Orcamentos</a>
        <a class="p-2 text-dark" href=""><b>Olá, <?php echo $_SESSION['usuario'];?></b></a>
        <a class="p-2 text-dark" href="/admin/logout.php">Sair</a> 
      </nav>
    </div>