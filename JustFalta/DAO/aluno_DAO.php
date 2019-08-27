<?php 
		require_once "db_class.php";
		require_once "../class/aluno.php";
		require_once "../Controller/aluno_control.php";


	 class AlunoDAO{
	
	 	private $link;

		function __construct(database $db){
			$this->link = $db;
		}

		public function add(Aluno $aluno){
	 		
			$turma = $aluno->getTurma();
			$sigeam = $aluno->getSigeam();
			$nome = $aluno->getNome();
			$mae = $aluno->getMae();
			$dtNascimento = $aluno->getNascimento();
			$bf = $aluno->getBf();

			
			$mysql = $this->link->conecta_mysql();
			
			$query = "INSERT INTO tb_aluno (turma_aluno, sigeam_aluno, nome_aluno, mae_aluno, dtnasc_aluno, bf_aluno) VALUES ('$turma','$sigeam','$nome','$mae', '$dtNascimento', '$bf') ";

			 if(mysqli_query($mysql, $query)){

			 		 echo '<script>alert("Aluno cadastrado com sucesso!"); window.location= "../html/main.php"</script>';
			 		 $mysql->close();
			 		        		
    		}else{
        			 echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
    		}
		}
	}

 ?>