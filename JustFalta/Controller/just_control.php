<?php 
	
	session_start();

	require_once "../class/justificativa.php";
	require_once "../DAO/justificativa_DAO.php";
	
		$operacao = $_POST['crud'];


		switch ($operacao) {
			case 'salvar':
				insert();
			break;
			case 'buscar':
				busca();
			break;
			case 'reimprime':
				header('Location: ../html/buscaJust.php');
			break;
			case 'consulta':
				header('Location: ../html/buscaAlunoJust.php');
			break;
			case 'excluir':
				header('Location: ../html/excluirJust.php');
			break;
			case 'salvarEdit':
				edit();
			break;
			case 'principal':
				header('Location: ../html/main.php');
			break;
		}
		
		function insert(){
			
			$aluno = $_POST['nome_aluno'];
			$usuario = $_SESSION['id_usuario'];
			$descricao = $_POST['justificativa'];
			$dataInicio = $_POST['dtInicio'];
			$cid = $_POST['cid'];
			$obs = $_POST['obs'];
			$qtdDias = $_POST['dias'];
			$dia = $qtdDias - 1;
			$dataTermino = date('Y-m-d', strtotime($dataInicio. ' +'.$dia .' days'));
			$dataEntrega = date('Y-m-d');
			$dataRetorno = date('Y-m-d', strtotime($dataTermino. ' +1 days'));

			if ($_POST['propriamae'] && $_POST['propriamae'] == 'on'){
				$conexao = new database();
	    		$link = $conexao->conecta_mysql();
	    		$query = "SELECT mae_aluno FROM tb_aluno WHERE id_aluno = '$aluno'";
	    		$consulta = mysqli_query($link, $query);
	    		$linha = mysqli_fetch_array($consulta);
	    		$responsavel = $linha['mae_aluno'];
			}else{
				$responsavel = $_POST['responsavel'];
			}
			 
			if($cid == 'SEM AMPARO'){
				$status = "EM ANÁLISE";	
			}else{
				$status = "DEFERIDO";
			}
			

			$justificativa = new Justificativa($aluno, $usuario, $descricao, $dataInicio, $dataTermino, $dataEntrega, $dataRetorno, $cid, $responsavel, $obs, $qtdDias, $status);
										
				$conexao = new database();
				
				$justDAO = new JustDAO($conexao);
				$justDAO->add($justificativa);
			}

		function busca(){
			$sigeam = $_POST['sigeam_aluno'];
			$nome = $_POST['nome_aluno'];
			$conexao = new database();
    		$link = $conexao->conecta_mysql();
    		$query = "SELECT * FROM tb_aluno WHERE sigeam_aluno = '$sigeam' OR nome_aluno = '$nome'";
    		$consulta = mysqli_query($link, $query);
    		$linha = mysqli_fetch_array($consulta);
			$sig = $linha['sigeam_aluno'];
			$nom = $linha['nome_aluno'];
			$dat = $linha['dtnasc_aluno'];
			$mae = $linha['mae_aluno'];							
			header('Location: ../html/busca.php?sigeam='.$sig.'&nome='.$nom.'&dt='.$dat.'&mae='.$mae); 

		}

		function edit(){

			//$aluno = $_POST['nome_aluno'];
			//$usuario = $_SESSION['id_usuario'];
			$id = $_SESSION['id_just']; 
			$descricao = $_POST['justificativa'];
			$dataInicio = $_POST['dtInicio'];
			$cid = $_POST['cid'];
			$obs = $_POST['obs'];
			$qtdDias = $_POST['dias'];
			$dia = $qtdDias - 1;
			$dataTermino = date('Y-m-d', strtotime($dataInicio. ' +'.$dia .' days'));
			$dataEntrega = date('Y-m-d');
			$dataRetorno = date('Y-m-d', strtotime($dataTermino. ' +1 days'));
			$responsavel = $_POST['responsavel'];
			if($cid == 'SEM AMPARO'){
				$status_just = "EM ANÁLISE";	
			}else{
				$status_just = "DEFERIDO";
			}

			$conexao = new database();
    		$link = $conexao->conecta_mysql();

			$query = "UPDATE tb_justificativa SET desc_just = '$descricao', dtInicio_just = '$dataInicio', dtTermino_just = '$dataTermino', dtEntrega_just = '$dataEntrega', dtRetorno_just = '$dataRetorno', cid_just = '$cid', resp_just = '$responsavel', obs_just = '$obs', qtDias_just = '$qtdDias', status_just = '$status_just' WHERE id_just = '$id'";

			if(mysqli_query($link, $query)){
			 		 echo '<script>alert("Justificativa atualizada com sucesso!")</script>';
			 		 echo '<script> r=confirm("Deseja imprimir?");if (r==true){window.open("../html/reportJust.php?id='.$id.'", "_blank");window.location= "../html/main.php";}else{window.location= "../html/main.php";}</script>';
				        		
    		}else{
        			 echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
    		}


		}
		
		

	
 ?>