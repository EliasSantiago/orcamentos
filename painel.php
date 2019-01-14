<?php 
include 'header.php';
?>

<?php 
include 'conexao.php';

  if($conn){
	$result = mysqli_query($conn, "SELECT COUNT(status) AS `count` FROM `hv_orcamentos` WHERE status = 'Novo'");
	$row = mysqli_fetch_array($result);
	$count = $row['count'];
	
	$resultContato = mysqli_query($conn, "SELECT COUNT(status) AS `count` FROM `tb_contato` WHERE status = 'Novo'");
	$linha = mysqli_fetch_array($resultContato);
	$cont = $linha['count'];
	?>

<div class="container">
	<div class="row">
		<div class="card" style="width: 18rem; margin: 15px;">
			<div class="card-body">
			<h1 align="center" style=""><b><?php echo $count ?></b></h1>
			<h5 align="center" class="card-title"><?php echo $count == 0 || $count == 1 ? "Orçamento" : "Orçamentos"; ?></h5>
			<p align="center"><a align="center" href="view/orcamentos.php" class="btn btn-primary">Ver Orçamentos</a></p>
			</div>
		</div>
		
		<div class="card" style="width: 18rem; margin: 15px;">
			<div class="card-body">
			<h1 align="center" style=""><b><?php echo $cont ?></b></h1>
			<h5 align="center" class="card-title"><?php echo $count == 0 || $count == 1 ? "Mensagem" : "Mensagens"; ?></h5>
			<p align="center"><a align="center" href="view/fale_conosco.php" class="btn btn-primary">Ver Mensagens</a></p>
			</div>
		</div>

<?php
	}
	mysqli_close($conn);
?>


		


	</div>
</div>


 <?php 
include 'footer.php';
?>