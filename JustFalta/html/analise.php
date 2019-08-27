<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	
	$operacao = $_POST['btn'];
	$id = $_POST['id_just'];

	if($operacao == 'defere'){
		$query = "UPDATE tb_justificativa SET status_just = 'DEFERIDO' WHERE id_just = '$id';";
		if(mysqli_query($link, $query)){
	 		echo '<script>alert("Justificativa DEFERIDA com sucesso!");window.location= "../html/analiseJust.php";</script>';
		}
	}
	if($operacao == 'indefere'){
		$query = "UPDATE tb_justificativa SET status_just = 'INDEFERIDO' WHERE id_just = '$id'";
		if(mysqli_query($link, $query)){
	 		echo '<script>alert("Justificativa INDEFERIDA com sucesso!");window.location= "../html/main.php";</script>';
		}
	}

?>