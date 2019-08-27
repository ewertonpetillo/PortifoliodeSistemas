<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_turma";
	$consulta = mysqli_query($link, $query);
	?>

	 <form class="form-control"  action= "frequencia.php" method="post">
      	<div class="text-center mb-4" >
			<h1 class="h2">Registro de Frequência</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="col">
	        	 <select id="turma" class="form-control" placeholder="Turma" name="turma">
	        		<?php 
	        			while ($linha = mysqli_fetch_array($consulta)){
							echo $linha['serie_turma'];
	        				echo '<option value="'.$linha['id_turma'].'">'.$linha['serie_turma'].'</option>';
	        			}
	        		 ?>
        			
      			</select>

      			</div>	
				<div class="col">
      			<select id="mes_busca" class="form-control" placeholder="Turma" name="mes_busca">
	        		
	        		<option value="1">Janeiro</option>
	        		<option value="2">Fevereiro</option>
	        		<option value="3">Março</option>
	        		<option value="4">Abril</option>
	        		<option value="5">Maio</option>
	        		<option value="6">Junho</option>
	        		<option value="7">Julho</option>
	        		<option value="8">Agosto</option>
	        		<option value="9">Setembro</option>
	        		<option value="10">Outubro</option>
	        		<option value="11">Novembro</option>
	        		<option value="12">Dezembro</option>
	        			        			
      				</select>
	        	</div> 
	        <div class="form-group col-md-3">
	        	<button type="submit" class="btn btn-outline-primary">Inserir</button>
	        </div>
	                
	    </form>	        		
	        	