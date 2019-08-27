<?php 

	class Justificativa{
		
		private $aluno;
		private $usuario;
		private $descricao;
		private $dataInicio;
		private $dataTermino;
		private $dataEntrega;
		private $dataRetorno;
		private $cid;
		private $responsavel;
		private $obs;
		private $qtdDias;
		private $status;


		function __construct($c_aluno,  $c_usuario, $c_descricao, $c_dataInicio, $c_dataTermino, $c_dataEntrega, $c_dataRetorno, $c_cid, $c_responsavel, $c_obs, $c_qtdDias, $c_status){
			$this->setAluno($c_aluno);
			$this->setUsuario($c_usuario);
			$this->setDescricao($c_descricao);
			$this->setInicio($c_dataInicio);
			$this->setTermino($c_dataTermino);
			$this->setEntrega($c_dataEntrega);
			$this->setRetorno($c_dataRetorno);
			$this->setCid($c_cid);
			$this->setResponsa($c_responsavel);
			$this->setObs($c_obs);
			$this->setDias($c_qtdDias);
			$this->setStatus($c_status);
		}


		function setAluno($par_aluno){
			$this->aluno = $par_aluno;
		}

		function getAluno(){
			return $this->aluno;
		}
		function setUsuario($par_usuario){
			$this->usuario = $par_usuario;
		}
		function getUsuario(){
			return $this->usuario;	
		}
		
		function setDescricao($par_descricao){
			$this->descricao = $par_descricao;
		}
		function getDescricao(){
			return $this->descricao;
		}
		function setInicio($par_dataInicio){
			$this->dataInicio = $par_dataInicio;
		}
		function getInicio(){
			return $this->dataInicio;
		}
		function setTermino($par_termino){
			return $this->dataTermino = $par_termino;
		}
		function getTermino(){
			return $this->dataTermino;
		}

		function setEntrega($par_dataEntrega){
			$this->dataEntrega = $par_dataEntrega;
		}

		function getEntrega(){
			return $this->dataEntrega;
		}

		function setRetorno($par_retorno){
			$this->dataRetorno = $par_retorno;
		}

		function getRetorno(){
			return $this->dataRetorno;
		}

		function setCid($par_cid){
			$this->cid = $par_cid;
		}

		function getCid(){
			return $this->cid;
		}

		function setResponsa($par_resp){
			$this->responsavel = $par_resp;
		}

		function getResponsa(){
			return $this->responsavel;
		}

		function setObs($par_obs){
			$this->obs = $par_obs;
		}

		function getObs(){
			return $this->obs;
		}

		function setDias($par_Dias){
			$this->qtdDias = $par_Dias;
		}

		function getDias(){
			return $this->qtdDias;
		}

		function setStatus($par_Status){
			$this->status = $par_Status;
		}

		function getStatus(){
			return $this->status;
		}
	}

 ?>