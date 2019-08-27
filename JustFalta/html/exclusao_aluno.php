<?php 

	require_once "../DAO/db_class.php";
	$id = $_GET['id'];

	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "DELETE FROM tb_aluno WHERE id_aluno = '$id'"; 
	if(mysqli_query($link, $query)){
		echo '<script>alert("Aluno excluído com sucesso."); window.location= "../html/main.php"</script>';
	}else{
		echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
	}
 ?>