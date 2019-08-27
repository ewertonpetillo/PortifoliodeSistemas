<?php 
	require_once "../class/aluno.php";
	require_once "../DAO/aluno_DAO.php";
	require_once "../DAO/db_class.php";

		$operacao = $_POST['crud'];
		$id = $_POST['id_aluno'];

		switch ($operacao) {
			case 'salvar':
				insert();
			break;
			case 'buscar':
				header('Location: ../html/busca.php'); 
			break;
			case 'excluir':
				exclui($id);
			break;
			case 'delete':
				header('Location: ../html/excluirAluno.php'); 
			break;
			case 'edit':
				header('Location: ../html/editAluno.php?id='.$id); 
			break;
			case 'salvarEdit':
				editar($id); 
			break;
			case 'principal':
				header('Location: ../html/main.php'); 
			break;
		}
		
		function insert(){
				$turma = $_POST['turma_aluno'];
				$sigeam = $_POST['sigeam_aluno'];
				$nome = $_POST['nome_aluno'];
				$mae = $_POST['nome_mae'];
				$dtnascimento = $_POST['dtnascimento'];
				$bf = $_POST['bf'];
				$aluno = new Aluno($turma, $sigeam, $nome, $mae, $dtnascimento, $bf);
										
				$conexao = new database();
				
				$alunoDAO = new AlunoDAO($conexao);
				$alunoDAO->add($aluno);
			}

		function exclui($p_id){

				echo '<script> r=confirm("Deseja excluir?");if (r==true){window.location= "../html/exclusao_aluno.php?id='.$p_id.'";}else{window.location= "../html/main.php";}</script>';

		}

		function editar($p_id){

			$conexao = new database();
    		$link = $conexao->conecta_mysql();

    		$idaluno = $p_id;
    		$turma = $_POST['turma_aluno'];
			$sigeam = $_POST['sigeam_aluno'];
			$nome = $_POST['nome_aluno'];
			$mae = $_POST['nome_mae'];
			$dtnascimento = $_POST['dtnascimento'];
			$bf = $_POST['bf'];


			$query = "UPDATE tb_aluno SET nome_aluno = '$nome', dtnasc_aluno = '$dtnascimento', turma_aluno = '$turma', mae_aluno = '$mae', bf_aluno = '$bf' WHERE id_aluno = '$idaluno'";

			if(mysqli_query($link, $query)){
			 		 echo '<script>alert("Aluno atualizado com sucesso!") ;window.location= "../html/main.php";</script>';
				        		
    		}else{
        			 echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
    		}

		}
		

	
 ?>