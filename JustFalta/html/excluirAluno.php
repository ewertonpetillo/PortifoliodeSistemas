<?php
	include "menu.php";	
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_aluno order by nome_aluno";
	$consulta = mysqli_query($link, $query);

  ?>

  <form class="form-control"  action= "../Controller/aluno_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Alteração de Aluno</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="col">
	        	<select id="nome_aluno" class="form-control" placeholder="Aluno" name="id_aluno">
	        		<?php 
	        			while ($linha = mysqli_fetch_array($consulta)){
							echo $linha['nome_aluno'];
	        				echo '<option value="'.$linha['id_aluno'].'">'.$linha['nome_aluno'].'</option>';
	        			}
	        		 ?>
        			
      			</select>

	        </div>
	        <div class="form-group col-md-3">
	        	<button type="submit" class="btn btn-danger" value="excluir" name="crud">Excluir</button>
	        	<button type="submit" class="btn btn-warning" value="edit" name="crud">Editar</button>
	        </div>
	          
	    </div>

	    </form>