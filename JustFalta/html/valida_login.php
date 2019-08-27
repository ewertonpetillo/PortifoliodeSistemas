<?php
	require_once "../DAO/db_class.php";

function fun_valida_login($login, $senha){

	$conexao = new database();
    $link = $conexao->conecta_mysql();
	
	$sql = "SELECT * FROM tb_usuario WHERE email_usuario = '$login'  AND senha_usuario = '$senha'";
	$result = mysqli_query($link, $sql); 

	if($result){
		$dados = mysqli_fetch_array($result);	
		if (isset($dados['nome_usuario'])) {
			return 1;
		}else{
			return 2;
		}
    }else{
        return 3;    
   }

}

?>