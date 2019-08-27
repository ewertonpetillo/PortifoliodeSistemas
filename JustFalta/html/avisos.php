<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	
	$operacao = $_POST['btn'];
	$id = $_POST['id_aviso'];

	if($operacao == 'exclui'){
		$query = "DELETE FROM tb_avisos WHERE id_aviso = '$id';";
		if(mysqli_query($link, $query)){
	 	echo '<script>alert("Aviso excluído com sucesso!");window.location= "../html/main.php";</script>';
		}
	}else{

		$qr = "SELECT * FROM tb_avisos WHERE id_aviso = '$id'";
		$consult = mysqli_query($link, $qr);

		while ($row = mysqli_fetch_array($consult)){
			$status = $row['status_aviso'];
		}
		if($status == "LIDO"){
			$upd = 'PENDENTE';
		}else{
			$upd = 'LIDO';
		}
		$query = "UPDATE tb_avisos SET status_aviso = '$upd' WHERE id_aviso = '$id'";
		if(mysqli_query($link, $query)){
	 	echo '<script>alert("Aviso '.$upd.' com sucesso!");window.location= "../html/main.php";</script>';
		}
	}

?>