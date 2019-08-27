<?php 
	include "../html/menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
    $link = $conexao->conecta_mysql();

	$operacao = $_POST['btn'];
	$mes = $_POST['mes_id']; 
	$aluno = $_POST['aluno_id'];

    $query1 = "SELECT letivos_mes FROM tb_meses where id_mes = '$mes'";
    $consulta1 = mysqli_query($link, $query1);

    while ($linha = mysqli_fetch_array($consulta1)){
    	$letivo = $linha['letivos_mes'];
    }
	
	switch ($operacao) {
		case 'enviar':
			$freq = $_POST['freq'];
			foreach ( $aluno as $id) {
				$per =  1 - ($freq[$id]/$letivo); 
			    $query = "INSERT INTO tb_frequencia (aluno_frequencia, mes_frequencia, faltas_frequencia, percentual_frequencia) values ('$id', '$mes', '$freq[$id]', '$per')";
			     if(mysqli_query($link, $query)){
			 		 echo '<script>alert("Frequencia registrada com sucesso!");window.location= "../html/freqAluno.php";</script>';
			 		}else{
			 			echo '<script>alert("Erro ao registrar!")</script>';
			 		}
			}
			break;
		
		case 'salvar':
			if(verifica($aluno, $mes)>0){
				edit($aluno, $mes, $letivo);
			}else{
				insert($aluno,$mes, $letivo);
			}
			
			break;

		case 'principal':
			echo '<script>window.location= "../html/main.php";</script>';
			break;
	}

function verifica($id, $mes){

	$conexao = new database();
    $link = $conexao->conecta_mysql();
    $query = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE a.id_aluno = '$id' AND p.mes_frequencia = '$mes'";
    $result = mysqli_query($link, $query);
	$numrows = mysqli_num_rows($result);
	return $numrows; 

}

function insert($id, $mes, $let){
			$conexao = new database();
   			 $link = $conexao->conecta_mysql();
	
			$freq = $_POST['freq'];
			$per =  1 - ($freq/$let); 
			$query = "INSERT INTO tb_frequencia (aluno_frequencia, mes_frequencia, faltas_frequencia, percentual_frequencia) values ('$id', '$mes', '$freq', '$per')";
			     if(mysqli_query($link, $query)){
			 		 echo '<script>alert("Frequencia registrada com sucesso!");window.location= "../html/freqAluno.php";</script>';
			 		}else{
			 			echo '<script>alert("Erro ao registrar!")</script>';
			 		}

}


function edit($id, $mes, $let){
			$conexao = new database();
    		$link = $conexao->conecta_mysql();

			$frequencia = buscaFreq($id, $mes);
			$freq = $_POST['freq'];
			$per =  1 - ($freq/$let);

			$query = "UPDATE tb_frequencia SET faltas_frequencia = $freq, percentual_frequencia = $per WHERE id_frequencia = $frequencia;";
			     if(mysqli_query($link, $query)){
			 		 echo '<script>alert("Frequencia registrada com sucesso!");window.location= "../html/freqAluno.php";</script>';
			 		}else{
			 			echo '<script>alert("Erro ao registrar!")</script>';
			 		}

}

function buscaFreq($id, $mes){
	$conexao = new database();
    $link = $conexao->conecta_mysql();
    $query = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE a.id_aluno = '$id' AND p.mes_frequencia = '$mes'";
    $result = mysqli_query($link, $query);
    while ($linha = mysqli_fetch_array($result)){
    	$id_freq = $linha['id_frequencia'];
    }
    return $id_freq;
}

?>