<?php 

	require_once "../DAO/db_class.php";
	$id = $_GET['id'];
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "DELETE FROM tb_justificativa WHERE id_just = '$id';";

	if(mysqli_query($link, $query)){
	 	echo '<script>alert("Justificativa excluída com sucesso!");window.location= "../html/main.php";</script>';
	}
 ?>