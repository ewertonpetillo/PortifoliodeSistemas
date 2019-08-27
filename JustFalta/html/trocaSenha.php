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
			<h1 class="h2">Troca de Senha</h1>
      	</div>

      	<div class="row">
      		<div class="col mb-6"><label><b>Usuário: </b></label></div>
      		<div class="col mb-6"><label><b>Email: </b></label></div>
      	</div>

      	<div class="row mb-4">
      		<div class="col mb-6"><input id="id_just" class="form-control" placeholder="Senha Atual" autofocus="" type="name" name="nome" value="<?php echo $nome ?>" readonly="true" ></div>
      		<div class="col mb-6"><input id="id_just" class="form-control" placeholder="Senha Atual" autofocus="" type="email" name="email" value="<?php echo $email ?>" readonly="true" ></div>
      	</div>
	    <div class="row mb-4">
	     	<div class="col mb-4">
	        	<input id="id_just" class="form-control" placeholder="Senha Atual" autofocus="" type="password" name="senhaold" required="" >

	        </div>
	        <div class="col mb-4">
	        	<input id="id_just" class="form-control" placeholder="Nova Senha" autofocus="" type="password" name="senhanew" required="" >

	        </div>
	        <div class="col mb-4">
	        	<input id="id_just" class="form-control" placeholder="Repita a  Nova Senha" autofocus="" type="password" name="senhanew1" required="" >
	   		</div>
	   	</div>
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success" name="crud" value="atualSenha">Salvar</button>
	      	<button type="submit" class="btn btn-warning" name="crud" value="principal">Cancelar</button>
	     </div>
	    </form>