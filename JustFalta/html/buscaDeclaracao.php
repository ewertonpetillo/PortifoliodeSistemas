<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_aluno order by nome_aluno";
	$consulta = mysqli_query($link, $query);
	?>

	 <form class="form-control"  action= "confirmDec.php" method="post">
      	<div class="text-center mb-4" >
			<h1 class="h2">Emissão de Declaração com Frequencia</h1>
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
				<div class="col">
      			<select id="mes_busca" class="form-control" placeholder="Turma" name="mes_busca">
	        		
	        		<option value="1">Janeiro</option>
	        		<option value="2">Fevereiro/Março</option>
	        		<option value="3">Abril/Maio</option>
	        		<option value="4">Junho/Julho</option>
	        		<option value="5">Agosto/Setembro</option>
	        		<option value="6">Outubro/Novembro</option>
	        		<option value="7">Dezembro</option>	        			
      				</select>
	        	</div> 
	        <div class="form-group col-md-3">
	        	<button type="submit" class="btn btn-outline-primary">Imprimir</button>
	        </div>
	                
	    </form>	        		
	        	