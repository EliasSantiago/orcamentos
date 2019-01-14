<?php 
echo "";
set_time_limit(0);
class Conexao{
public $dbname;
public $tb;
public $chave;
public function __construct($dbname='', $tb='', $chave=''){
	$this->dbname = $dbname;
	$this->tb = $tb;
	$this->id = $chave;
}
public function getConexao() {
	$servidor = "localhost";
	$banco = "db_hugovidrosproducao";
	$usuario = "userhugo";
	$senha = "elias.bsi1204";
	$conn = mysqli_connect($servidor, $usuario, $senha, $banco);


	if ($conn->connect_errno) {
		echo "Falha na conex���o!";
	}

	return $conn;
}


public function buscarDados(){
	
	$conn = $this->getConexao();
	if($conn){
		$sql = "SELECT * FROM hv_orcamentos WHERE status = 'Novo' OR status = 'Lido' ORDER BY id DESC";

		echo '<table id="table_id" class="table display table-striped table-bordered table-condensed table-hover"><thead class="">';
		echo '<td>ID</td>';
		echo '<td>Nome</td>';
		echo '<td>Data/Hora</td>';
		echo '<td>Status</td>';
		echo '<td>Visualizar</td>';
		echo '</thead>';
		
		$result = $conn->query($sql);

		while ($dados = mysqli_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td class="chave">'.$dados['id'].'</td>';
				echo '<td>'.$dados['nome'].'</td>';
				echo '<td>'.$dados['data'].'</td>';

				if ($dados['status'] == 'Novo') {
					echo '<td align="center"><span class="badge badge-success">'.$dados['status'].'</span></td>';
				}
				elseif ($dados['status'] == 'Lido') {
					echo '<td align="center"><span class="badge badge-secondary">'.$dados['status'].'</span></td>';
				}
				echo '<td align="center"><a href="#" id="abrir" class="badge badge-info" data-element="#teste">Abrir</a></td>';
				echo '</tr>';
		}

		echo '</table>';
	}
	mysqli_close($conn);
}

public function buscarMensagens(){
	
	$conn = $this->getConexao();
	if($conn){
		$sql = "SELECT * FROM tb_contato WHERE status = 'Novo' OR status = 'Lido' ORDER BY id DESC";

		echo '<table id="table_id" class="table display table-striped table-bordered table-condensed table-hover"><thead class="">';
		echo '<td>ID</td>';
		echo '<td>Nome</td>';
		echo '<td>Data/Hora</td>';
		echo '<td>Status</td>';
		echo '<td>Visualizar</td>';
		echo '</thead>';
		
		$result = $conn->query($sql);

		while ($dados = mysqli_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td class="chave">'.$dados['id'].'</td>';
				echo '<td>'.$dados['nome'].'</td>';
				echo '<td>'.$dados['data_hora'].'</td>';

				if ($dados['status'] == 'Novo') {
					echo '<td align="center"><span class="badge badge-success">'.$dados['status'].'</span></td>';
				}
				elseif ($dados['status'] == 'Lido') {
					echo '<td align="center"><span class="badge badge-secondary">'.$dados['status'].'</span></td>';
				}
				echo '<td align="center"><a href="#" id="abrir" class="badge badge-info" data-element="#teste">Abrir</a></td>';
				echo '</tr>';
		}

		echo '</table>';
	}
	mysqli_close($conn);
}

public function desabilitarMensagem($id){
	$conn = $this->getConexao();

	if ($conn) {
		$stmt = $conn->prepare("UPDATE hv_orcamentos SET status = 'Deletado' WHERE id = $id");
		$stmt->execute();
		mysqli_close($conn);
		header('Location: ../view/orcamentos.php');
	}
}

public function desabilitarMensagemContato($id){
	$conn = $this->getConexao();

	if ($conn) {
		$stmt = $conn->prepare("UPDATE tb_contato SET status = 'Deletado' WHERE id = $id");
		$stmt->execute();
		mysqli_close($conn);
		header('Location: ../view/fale_conosco.php');
	}
}

public function mudarStatusMensagem($id){
	$conn = $this->getConexao();

	if ($conn) {
		$stmt = $conn->prepare("UPDATE hv_orcamentos SET status = 'Lido' WHERE id = $id");
		$stmt->execute();
		mysqli_close($conn);
		header('Location: ../view/orcamentos.php');
	}
}

public function naoLidaMensagem($id){
	$conn = $this->getConexao();

	if ($conn) {
		$stmt = $conn->prepare("UPDATE hv_orcamentos SET status = 'Novo' WHERE id = $id");
		$stmt->execute();
		mysqli_close($conn);
		header('Location: ../view/orcamentos.php');
	}
}

}
?>