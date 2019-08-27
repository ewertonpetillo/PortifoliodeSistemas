<?php 

	class Aluno{
		
		private $turma;
		private $sigeam;
		private $nome;
		private $mae;
		private $dtnascimento;
		private $bf;


		function __construct($c_turma,  $c_sigeam, $c_name, $c_mae, $c_dtnascimento, $c_bf){
			$this->setTurma($c_turma);
			$this->setSigeam($c_sigeam);
			$this->setNome($c_name);
			$this->setMae($c_mae);
			$this->setNascimento($c_dtnascimento);
			$this->setBf($c_bf);
		}


		function setTurma($par_turma){
			$this->turma = $par_turma;
		}

		function getTurma(){
			return $this->turma;
		}
		function setSigeam($par_sigeam){
			$this->sigeam = $par_sigeam;
		}
		function getSigeam(){
			return $this->sigeam;	
		}
		
		function setNome($par_nome){
			$this->nome = $par_nome;
		}
		function getNome(){
			return $this->nome;
		}
		function setMae($par_mae){
			$this->mae = $par_mae;
		}
		function getmae(){
			return $this->mae;
		}
		function setNascimento($par_dtnascimento){
			return $this->dtnascimento = $par_dtnascimento;
		}
		function getNascimento(){
			return $this->dtnascimento;
		}
		function setBf($par_bf){
			return $this->bf = $par_bf;
		}
		function getBf(){
			return $this->bf;
		}
	}

 ?>