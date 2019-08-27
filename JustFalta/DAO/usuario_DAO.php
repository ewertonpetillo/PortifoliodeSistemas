<?php 
		require_once "db_class.php";
		require_once "../class/usuario.php";
		require_once "../Controller/usuario_control.php";


	 class UsuarioDAO{
	
	 	private $link;

		function __construct(database $db){
			$this->link = $db;
		}

		public function add(Usuario $usuario){
	 		
			$nome = $usuario->getNome();
			$email = $usuario->getEmail();
			$senha = $usuario->getSenha();
			$funcao = $usuario->getFuncao();
			
			
			$mysql = $this->link->conecta_mysql();
			
			$query = "INSERT INTO tb_usuario (nome_usuario, email_usuario, senha_usuario, funcao_usuario) VALUES ('$nome','$email','$senha','$funcao') ";

			 if(mysqli_query($mysql, $query)){

			 		 echo '<script>alert("Usuario cadastrado com sucesso!"); window.location= "../html/main.php"</script>';
			 		 $mysql->close();
			 		        		
    		}else{
        			 echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
    		}
		}
	}

 ?>