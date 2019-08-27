<?php 
		require_once "db_class.php";
		require_once "../class/justificativa.php";
		require_once "../Controller/just_control.php";


	 class JustDAO{
	
	 	private $link;

		function __construct(database $db){
			$this->link = $db;
		}

		public function add(Justificativa $justificativa){
	 		
			$aluno = $justificativa->getAluno();
			$usuario = $justificativa->getUsuario();
			$descricao = $justificativa->getDescricao();
			$dataInicio = $justificativa->getInicio();
			$dataTermino  = $justificativa->getTermino();
			$dataEntrega = $justificativa->getEntrega();
			$dataRetorno = $justificativa->getRetorno();
			$cid = $justificativa->getCid();
			$responsavel = $justificativa->getResponsa();
			$obs = $justificativa->getObs();
			$qtdDias = $justificativa->getDias();
			$status = $justificativa->getStatus();

			
			$mysql = $this->link->conecta_mysql();
			
			$query = "INSERT INTO tb_justificativa (aluno_just, usuario_just, desc_just, dtInicio_just, dtTermino_just, dtEntrega_just, dtRetorno_just, cid_just, resp_just, obs_just, qtDias_just, status_just) VALUES ('$aluno','$usuario','$descricao','$dataInicio', '$dataTermino', '$dataEntrega', '$dataRetorno', '$cid', '$responsavel', '$obs', '$qtdDias', '$status')";

			 if(mysqli_query($mysql, $query)){
			 		 echo '<script>alert("Justificativa registrada com sucesso!")</script>';
			 		 echo '<script> r=confirm("Deseja imprimir?");if (r==true){		 		 window.open("../html/report.php", "_blank");window.location= "../html/main.php";}else{window.location= "../html/main.php";}</script>';
				        		
    		}else{
        			 echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
    		}
		}


		public function del(Justificativa $justificativa){
			$id = $justificativa->getID(); 

		}
	}

 ?>