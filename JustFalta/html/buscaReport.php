<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_turma";
	$consulta = mysqli_query($link, $query);
	?>

	 <form class="form-control"  action= "confirm.php" method="post">
      	<div class="text-center mb-4" >
			<h1 class="h2">Relatório de Justificativas por Turma</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="col">
	        	 <select id="turma_aluno" class="form-control" placeholder="Turma" name="turma_aluno">
	        		<?php 
	        			while ($linha = mysqli_fetch_array($consulta)){
							echo $linha['serie_turma'];
	        				echo '<option value="'.$linha['id_turma'].'">'.$linha['serie_turma'].'</option>';
	        			}
	        		 ?>
        			
      			</select>

	        </div>	
	        <div class="form-group col-md-3">
	        	<button type="submit" class="btn btn-outline-primary"> Imprimir</button>
	        </div>
	                
	    </form>	        		
	        	