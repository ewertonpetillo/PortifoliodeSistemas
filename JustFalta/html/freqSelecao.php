<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();

	$id = $_POST['id_aluno'];
	$query = "SELECT * FROM tb_aluno WHERE id_aluno = '$id'";
	$consulta = mysqli_query($link, $query);



 ?>

 <form class="form-control"  action= "freqChoose.php" method="post">
      	<div class="text-center mb-4" >
			<h1 class="h2">Frequência por Aluno</h1>
      	</div>
      	<br><br>
	    <div class="row mb-3">
	     	<div class="col">
	        		<?php 
	        			while ($linha = mysqli_fetch_array($consulta)){
							$aluno = $linha['nome_aluno'];
	           			}
	        		 ?>
	        		 <span>Aluno: <b><?php echo $aluno; ?></b></span>
      			</div>	
      		<div class="col">
      			<select id="mes" class="form-control" placeholder="Mês" name="mes">
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
      		<input type="hidden" name="id_aluno" value="<?php echo $id ?>">
	        <div class="form-group col-md-3">
	        	    <button type="submit" class="btn btn-outline-success" name="botao" value="add">Inserir</button>
		        	<button type="submit" class="btn btn-outline-danger" name="botao" value="del">Excluir</button>
	        </div>
	                
	    </form>	        		