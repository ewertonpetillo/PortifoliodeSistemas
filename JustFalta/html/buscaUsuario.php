<?php

	session_start();

	$id = $_SESSION['id_usuario'];
	include "menu.php";	
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_usuario WHERE id_usuario = '$id'";
	$consulta = mysqli_query($link, $query);

	while($row = mysqli_fetch_array($consulta)){
    	$nome = $row['nome_usuario'] ;  
    	$email = $row['email_usuario'];
	    }

  ?>

  <form class="form-control"  action= "../Controller/usuario_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Alteração de Usuário</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="form-group col-md-9">
	        	<input id="usuario" class="form-control " placeholder="Nome" autofocus="" type="name" name="nome" value="<?php echo $nome ?> ">
	        </div>
	        <div class="form-group col-md-3">
	        	<select id="funcao" class="form-control" placeholder="Função" name="funcao">
        			<option value="GESTOR(A)">Gestor(a)</option>
        			<option value="SECRETÁRIO(A)">Secretario(a)</option>
        			<option value="PEDAGOGO(A)">Pedagogo(a)</option>
      			</select>
	        </div>      
	    </div>
	    <div class="row mb-6">
	     	<div class="col">
	        	<input id="inputEmail" class="form-control" placeholder="Email"  autofocus="" type="email" name="email" value="<?php echo $email?> ">
	        </div>	        
	    </div>    
	    <div class="text-center mb-4" >
			 <button type="submit" class="btn btn-success" name="crud" value="salvarEdit">Salvar</button>
	      	<button type="submit" class="btn btn-warning" name="crud" value="principal">Cancelar</button>

	    </div>
	    </form>
  