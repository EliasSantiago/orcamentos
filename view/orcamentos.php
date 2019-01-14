<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Elias Fonseca">

    <title>Consultas</title>
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
				<div class="card">
					<div class="card-header">
						Orçamentos: 
	      				<button id="download" class="btn-toggle btn btn-success" data-element="#teste">
	      					<i class="fa"></i>Atualizar
	      				</button>
					</div>
          <div class="card-body" id="dadosCarregados">

          </div>
          <form action="visualizarOrcamentos.php" method="POST" id="id-form">
                  <input name="chave" type="hidden" id="chave">
          </form>				
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
	url: '../controller/buscaOrcamentoController.php',
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

$('.card').on('click', '#abrir', function(event){
  var chave = $(this).parent().parent().find(".chave").text();
  $("#chave").val(chave);
  $("#id-form").submit();
});

$(document).ready(function() {
  $.ajax({
  url: '../controller/buscaOrcamentoController.php',
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

</script>
<?php 
include '../footer.php';
?>