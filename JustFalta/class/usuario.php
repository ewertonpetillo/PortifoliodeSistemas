<?php 

	class Usuario{
		
		private $nome;
		private $email;
		private $senha;
		private $funcao;


		function __construct($c_nome,  $c_email, $c_senha, $c_funcao){
			$this->setNome($c_nome);
			$this->setEmail($c_email);
			$this->setSenha($c_senha);
			$this->setFuncao($c_funcao);
		}


		function setNome($par_nome){
			$this->nome = $par_nome;
		}

		function getNome(){
			return $this->nome;
		}
		function setEmail($par_email){
			$this->email = $par_email;
		}
		function getEmail(){
			return $this->email;	
		}
		
		function setSenha($par_senha){
			$this->senha = $par_senha;
		}
		function getSenha(){
			return $this->senha;
		}

		function setFuncao($par_funcao){
			$this->funcao = $par_funcao;
		}
		function getFuncao(){
			return $this->funcao;
		}
	}

 ?>