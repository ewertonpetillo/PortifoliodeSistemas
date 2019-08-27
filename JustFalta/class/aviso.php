<?php 

	class Aviso{
		
		private $descricao;
		private $data;
		private $status;


		function __construct($c_desc,  $c_data, $c_status){
			$this->setDescricao($c_desc);
			$this->setData($c_data);
			$this->setStatus($c_status);
		}


		function setDescricao($par_desc){
			$this->descricao = $par_desc;
		}

		function getDescricao(){
			return $this->descricao;
		}
		function setData($par_data){
			$this->data = $par_data;
		}
		function getData(){
			return $this->data;	
		}
		
		function setStatus($par_status){
			$this->status = $par_status;
		}
		function getStatus(){
			return $this->status;
		}
	}

 ?>