<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_aluno order by nome_aluno";
	$consulta = mysqli_query($link, $query);
	?>

	 <form class="form-control"  action= "resultFreq.php" method="post">
      	<div class="text-center mb-4" >
			<h1 class="h2">Consulta Frequência por Aluno</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="col">
	        		<select id="nome_aluno" class="form-control" placeholder="Aluno" name="nome_aluno">
	        		<?php 
	        			while ($linha = mysqli_fetch_array($consulta)){
							echo $linha['nome_aluno'];
	        				echo '<option value="'.$linha['id_aluno'].'">'.$linha['nome_aluno'].'</option>';
	        			}
	        		 ?>
        			
      			</select>

      			</div>	
	        <div class="form-group col-md-3">
	        	<button type="submit" class="btn btn-outline-primary" name="botao" value="busca">Buscar</button>
	        </div>
	                
	    </form>	        		
	        	