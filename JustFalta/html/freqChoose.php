<?php 
	require_once "../DAO/db_class.php";
	$id = $_POST['id_aluno'];
	$mes = $_POST['mes'];
	$opt = $_POST['botao'];

	$conexao = new database();
	$link = $conexao->conecta_mysql();
	
	$query1 = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE a.id_aluno = '$id' AND p.mes_frequencia = '$mes'";
    $result = mysqli_query($link, $query1);
    while ($linha = mysqli_fetch_array($result)){
    	$id_freq = $linha['id_frequencia'];
    }

	$query2 = "DELETE FROM tb_frequencia WHERE id_frequencia = '$id_freq';";


	if($opt == 'add'){
		header('Location: freqInsert.php?id='.$id.'&mes='.$mes);
	}else{
		if(mysqli_query($link, $query2)){
	 	echo '<script>alert("Frequência excluída com sucesso!");window.location= "../html/main.php";</script>';
	}
	}


 ?>