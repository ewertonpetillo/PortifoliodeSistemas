<?php
	include "menu.php";	
	require_once "../DAO/db_class.php";
		$conexao = new database();
		$link = $conexao->conecta_mysql();
		$query = "SELECT * FROM tb_turma";
		$consulta = mysqli_query($link, $query);

  ?>

  <form class="form-control"  action= "confirmGeral.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Reimpressão de Justificativa</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="col">
	        	<input id="id_just" class="form-control" placeholder="Codigo da Justificativa" autofocus="" type="name" name="id_just" required="" >

	        </div>
	        <div class="form-group col-md-3">
	        	<button type="submit" class="btn btn-outline-primary"> Imprimir</button>
	        </div>
	          
	    </div>

	    </form>
  


