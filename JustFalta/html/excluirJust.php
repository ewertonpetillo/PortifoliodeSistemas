<?php
	include "menu.php";	
	require_once "../DAO/db_class.php";
  ?>

  <form class="form-control"  action= "confirmAltera.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Alteração de Justificativa</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="col">
	        	<input id="id_just" class="form-control" placeholder="Codigo da Justificativa" autofocus="" type="name" name="id_just" required="" >

	        </div>
	        <div class="form-group col-md-3">
	        	<button type="submit" class="btn btn-danger" value="delete" name="btAltera">Excluir</button>
	        	<button type="submit" class="btn btn-warning" value="edit" name="btAltera">Editar</button>
	        </div>
	          
	    </div>

	    </form>