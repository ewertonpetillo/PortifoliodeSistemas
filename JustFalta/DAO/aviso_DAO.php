<?php 
		require_once "db_class.php";
		require_once "../class/aviso.php";
		require_once "../Controller/aviso_control.php";


	 class AvisoDAO{
	
	 	private $link;

		function __construct(database $db){
			$this->link = $db;
		}

		public function add(Aviso $aviso){
	 		
			$desc = $aviso->getDescricao();
			$data = $aviso->getData();
			$status = $aviso->getStatus();
			
			$mysql = $this->link->conecta_mysql();
			
		$query = "INSERT INTO tb_avisos (desc_aviso, data_aviso, status_aviso) VALUES ('$desc','$data','$status')";

			 if(mysqli_query($mysql, $query)){

			 		 echo '<script>alert("Aviso cadastrado com sucesso!"); window.location= "../html/main.php"</script>';
			 		        		
    		}else{
        			 echo '<script>alert("Ocorreu um erro."); window.location= "../html/main.php"</script>';
    		}
		}
	}

 ?>