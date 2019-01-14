<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Elias Fonseca">

    <title>Orçamentos</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/style-admin.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    </head>

  <body>
    <?php include '../header.php'; ?>

    <div role="main" class="container">


<div class="container">
	<div class="row">
		    <div class="col-12">
				<div class="card mensagem">
					<div class="card-header">
						Orçamentos Recebidos:
					</div>
          <div class="card-body" id="dadosCarregados">
<?php 
include '../conexao.php';
$id = $_POST['chave'];

  if($conn){
    $sql = "SELECT * FROM hv_orcamentos WHERE id = $id";
    $res = $conn->query($sql);

    while ($dados = mysqli_fetch_assoc($res)) {
      echo '<div class="row">';
      echo '<div class="col-6">';
      echo '<p><b>ID: </b><span class="chave">'.$dados['id'].'</span></p>';
      echo '<p><b>Status: </b><span class="status">'.$dados['status'].'</span></p>';
      echo '<form action="../controller/deletarMensagem.php" method="POST" id="id-form">';
      echo '<input name="chave" type="hidden" id="chave">';
      echo '</form>';
      echo '<p><b>Nome: </b>'.$dados['nome']. '</p>';
      echo '<p><b>E-mail: </b>'.$dados['email']. '</p>';
      echo '<p><b>Telefone: </b>'.$dados['telefone']. '</p>';
      echo '</div>';
      
      echo '<div class="col-6">';
      echo '<p><b>Serviço: </b>'.$dados['servico']. '</p>';
      echo '<p><b>Para quando: </b>'.$dados['inicio']. '</p>';
      echo '<p><b>Endereço: </b>'.$dados['endereco']. '</p>';
      echo '<p><b>Data/Hora da solicitação: </b>'.$dados['data']. '</p>';
      echo '</div>';
      echo '<div class="col-12">';
      if ($dados['status'] == "Novo") {
        echo '</br><p><button class="btn btn-primary btn-sm" id="mudarStatus">Marcar como lida</button> ';
      }
      elseif ($dados['status'] == "Lido") {
        echo '</br><p><button class="btn btn-primary btn-sm" id="naoLida">Marcar como não lida</button> ';
      }
      echo ' <button class="btn btn-danger btn-sm" id="btn-deletar">Deletar</button></p>';
      
      echo '<form action="../controller/mudarStatusMensagem.php" method="POST" id="status-form">';
      echo '<input name="id-mensagem" type="hidden" id="id-mensagem">';
      echo '</form>';
      
      echo '<form action="../controller/naoLidaMensagem.php" method="POST" id="status-nao-lida">';
      echo '<input name="id-nao-lida" type="hidden" id="id-nao-lida">';
      echo '</form>';
      
      echo '</div>';
      echo '</div>';      
    }
  }
  mysqli_close($conn);

 ?>


          </div>
			
				</div>
			</div>
	</div>
</div>
    </div><!-- /.container -->
  </body>
</html>

<script>
//Buscar dados
$('.card-header').on('click', '#download', function(event){
	$("#download").submit();

	$.ajax({
	url: '../controller/buscaMensagensController.php',
	type: 'POST',
	beforeSend: function(){
		$("#dadosCarregados").html("Carregando...");
	},
	success: function(data){
		$("#dadosCarregados").html(data);
	},
	error: function(data){
		$("#dadosCarregados").html("Algum erro ocorreu aqui!");
	}
	});
});

$('.mensagem').on('click', '#btn-deletar', function(event){
  confirm("Excluir Permanentemente?");
  var chave = $(".chave").text();
  $("#chave").val(chave);
  $("#id-form").submit();
});

$('.mensagem').on('click', '#mudarStatus', function(event){
  var chave = $(".chave").text();
  $("#id-mensagem").val(chave);
  $("#status-form").submit();
});

$('.mensagem').on('click', '#naoLida', function(event){
  var chave = $(".chave").text();
  $("#id-nao-lida").val(chave);
  $("#status-nao-lida").submit();
});



</script>

<?php 
include '../footer.php';
?>