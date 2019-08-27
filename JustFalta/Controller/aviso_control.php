<?php 
	require_once "../class/aviso.php";
	require_once "../DAO/aviso_DAO.php";
	require_once "../DAO/db_class.php";

		$operacao = $_POST['crud'];


		switch ($operacao) {
			case 'salvar':
				insert();
			break;
			case 'principal':
				header('Location: ../html/main.php');
			break;
		}
		
		function insert (){
			
				$desc = $_POST['desc_aviso'];
				$data = $_POST['dtaviso'];
				$status = $_POST['status_aviso'];
				
				$aviso = new Aviso($desc, $data, $status);
										
				$conexao = new database();
				
				$avisoDAO = new AvisoDAO($conexao);
				$avisoDAO->add($aviso);
			}
		
		

	
 ?>