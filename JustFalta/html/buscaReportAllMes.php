<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_turma";
	$consulta = mysqli_query($link, $query);
	?>

	 <form class="form-control"  action= "confirmAllMes.php" method="post">
      	<div class="text-center mb-4" >
			<h1 class="h2">Relatório de Justificativas por Turma</h1>
      	</div>
	    <div class="row mb-3">
	     <div class="col">
      			<select id="mes_busca" class="form-control" placeholder="Turma" name="mes_busca">
	        		
	        		<option value="01">Janeiro</option>
	        		<option value="02">Fevereiro</option>
	        		<option value="03">Março</option>
	        		<option value="04">Abril</option>
	        		<option value="05">Maio</option>
	        		<option value="06">Junho</option>
	        		<option value="07">Julho</option>
	        		<option value="08">Agosto</option>
	        		<option value="09">Setembro</option>
	        		<option value="10">Outubro</option>
	        		<option value="11">Novembro</option>
	        		<option value="12">Dezembro</option>
	        			        			
      				</select>
	        	</div> 
	        <div class="form-group col-md-3">
	        	<button type="submit" class="btn btn-outline-primary"> Imprimir</button>
	        </div>
	                
	    </form>	        		
	        	