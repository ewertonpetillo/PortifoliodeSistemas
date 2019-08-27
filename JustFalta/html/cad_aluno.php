<?php
	include "menu.php";	
	require_once "../DAO/db_class.php";
		$conexao = new database();
		$link = $conexao->conecta_mysql();
		$query = "SELECT * FROM tb_turma";
		$consulta = mysqli_query($link, $query);

  ?>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  



  <form class="form-control"  action= "../Controller/aluno_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Cadastro de Alunos</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="form-group col-md-3">
	        	<input id="sigeam_aluno" class="form-control" placeholder="Codigo do Sigeam" autofocus="" type="name" name="sigeam_aluno"  onkeypress="$(this).mask('0000000-0')">
	        </div>
	        <div class="col">
	        	 <input id="nome_aluno" class="form-control text-uppercase cep-mask" placeholder="Nome do Aluno" autofocus="" type="name" name="nome_aluno">
	        </div>	        
	    </div>
	    <div class="row mb-3">
	     	<div class="col">
	        	<input id="nome_mae" class="form-control text-uppercase" placeholder="Nome da Mãe" autofocus="" type="name" name="nome_mae" >
	        </div>
	        <div class="form-group col-md-3">
	        	 <input id="dtnascimento" class="form-control" placeholder="Data de Nascimento" autofocus="" type="date" name="dtnascimento">
	        </div>	
	        <div class="form-group col-md-3">
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
	        	<label><b>POSSUI BOLSA FAMÍLA? </b></label><br>
				<input type="radio" name="bf" value="SIM">SIM 
				<input type="radio" name="bf" value="NÃO" checked="true">NÃO	        	
	        </div>
	    </div>    
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success" name="crud" value="salvar">Salvar</button>
	      	<button type="submit" class="btn btn-danger" name="crud" value="delete">Excluir</button>	
	      	<button type="submit" class="btn btn-warning" name="crud" value="delete">Editar</button>
	      	<button type="submit" class="btn btn-secondary" name="crud" value="buscar">Listar</button>

	    </div>
	    </form>
  


