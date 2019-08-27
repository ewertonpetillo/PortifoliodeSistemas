<?php 

	session_start();
	require_once "../class/usuario.php";
	require_once "../DAO/usuario_DAO.php";
	require_once "../DAO/db_class.php";

		$operacao = $_POST['crud'];


		switch ($operacao) {
			case 'salvar':
				insere();
			break;
			case 'altera':
				header('Location: ../html/buscaUsuario.php');
			break;
			case 'salvarEdit':
				edit();
			break;
			case 'troca':
				header('Location: ../html/trocaSenha.php');
			break;
			case 'principal':
				header('Location: ../html/main.php');
			break;
			case 'atualSenha':
				atualizaSenha();
			break;
			

		}
		
		function insere(){
				$nome = $_POST['nome'];
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				echo $funcao = $_POST['funcao'];
				
				$usuario = new Usuario($nome, $email, $senha, $funcao);
										
				$conexao = new database();
				
				$usuarioDAO = new UsuarioDAO($conexao);
				$usuarioDAO->add($usuario);
			}

		function edit(){

			//$aluno = $_POST['nome_aluno'];
			//$usuario = $_SESSION['id_usuario'];
			$id = $_SESSION['id_usuario']; 
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$funcao = $_POST['funcao'];
			
			$conexao = new database();
    		$link = $conexao->conecta_mysql();

			$query = "UPDATE tb_usuario SET nome_usuario = '$nome', email_usuario = '$email', funcao_usuario = '$funcao' WHERE id_usuario = '$id'";

			if(mysqli_query($link, $query)){
			 		 echo '<script>alert("Usuário atualizado com sucesso!"); window.location= "../html/main.php";</script>';
			 		 				        		
    		}else{
        			 echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
    		}
    	}


    	function atualizaSenha(){

    		$id = $_SESSION['id_usuario'];

    		$conexao = new database();
    		$link = $conexao->conecta_mysql();

    		$query1 = "SELECT senha_usuario FROM tb_usuario WHERE id_usuario = '$id'";
    		$consulta = mysqli_query($link, $query1);

    		while($row = mysqli_fetch_array($consulta)){ 
		    	$senhaold = $row['senha_usuario'];
			 }


			$senhaantiga = $_POST['senhaold'];
    		$senhanew = $_POST['senhanew'];
    		$senhanew1 = $_POST['senhanew1'];

    		if($senhaold == $senhaantiga){
				if($senhanew == $senhanew1){
					$conexao2 = new database();
					$link2 = $conexao2->conecta_mysql();
    				$query2 = "UPDATE tb_usuario SET senha_usuario = '$senhanew' WHERE id_usuario = '$id'";
    				if(mysqli_query($link2, $query2)){
			 		 	echo '<script>alert("Senha alterada com sucesso!"); alert("Você deve logar novamente."); window.location= "../index.php";</script>';			        		
		    		}else{
		        		echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
		    		}
				}else{
					echo '<script>alert("Senhas diferentes, favor repetir o processo."); window.location= "../html/trocaSenha.php"</script>';
				}

    		}else{
    			echo '<script>alert("Senha atual incorreta, digite novamente."); window.location= "../html/trocaSenha.php"</script>';
    		}

    		

	}
		
		

	
 ?>