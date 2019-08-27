<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_turma";
	$consulta = mysqli_query($link, $query);
	?>

	 <form class="form-control"  action= "reportFreq.php" method="post" target="blank">
      	<div class="text-center mb-4" >
			<h1 class="h2">Relatório de Frequência</h1>
      	</div>
	    <div class="row mb-3">
	     		<div class="col"><br>
		     		 <label><b>Tipo de Busca</b></label><br>
		        	 <input type="radio" name="selecao" value="bf" />Somente alunos do Bolsa Família <br>
		        	 <input type="radio" name="selecao" value="all" checked="true" />Todos os alunos
      			</div>	

				<div class="col"><br>
				<label><b>Mês: </b></label><br>
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
	    </div>
	    <div class="row mb-3">
	    	<div class="col">
	    		<center><button type="submit" class="btn btn-outline-primary">Imprimir</button></center>
	    	</div>
	    </div>

	               
                
	    </form>	        		
	        	