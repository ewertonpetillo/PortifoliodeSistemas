<?php
session_start();
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();

	$id = $_GET['id'];
	$conexao = new database();
    $link = $conexao->conecta_mysql();
    $query = "SELECT  a.id_aluno, a.nome_aluno, b.serie_turma, a.sigeam_aluno, a.mae_aluno, a.dtnasc_aluno FROM tb_aluno a inner join tb_turma b on b.id_turma = a.turma_aluno WHERE id_aluno = '$id'";

    $query2 = "SELECT * FROM tb_turma";
    $consulta = mysqli_query($link, $query2);

    $result = mysqli_query($link, $query);

	while($row = mysqli_fetch_array($result)){
    	$aluno = $row['nome_aluno'];
	    $turma = $row['serie_turma'];
	    $data = date("d/m/Y", strtotime($row['dtnasc_aluno']));
	    $mae  = $row['mae_aluno'];
	    $sigeam = $row['sigeam_aluno']; 	
    }

  ?>

   <form class="form-control"  action= "../Controller/aluno_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Alteração de Aluno</h1>
      	</div>
	   	    <div class="row mb-3">
	     	<div class="form-group col-md-3">
	        	<input id="sigeam_aluno" class="form-control" placeholder="Codigo do Sigeam" autofocus="" type="name" name="sigeam_aluno" value="<?php echo $sigeam ?>" >
	        </div>
	        <div class="col">
	        	 <input id="nome_aluno" class="form-control text-uppercase" placeholder="Nome do Aluno" autofocus="" type="name" name="nome_aluno" value="<?php echo $aluno ?>">
	        </div>	        
	    </div>
	    <div class="row mb-3">
	     	<div class="col">
	        	<input id="nome_mae" class="form-control text-uppercase" placeholder="Nome da Mãe" autofocus="" type="name" name="nome_mae" value="<?php echo $mae ?>">
	        </div>
	        <div class="form-group col-md-3">
	        	 <input id="dtnascimento" class="form-control" placeholder="Data de Nascimento" autofocus="" type="date" name="dtnascimento" value="<?php echo $data ?>">
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
	        	<input type="hidden" name="id_aluno" value="<?php echo $id ?>">
	        </div>
	    </div>   
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success" name="crud" value="salvarEdit">Salvar</button>
	      	<button type="submit" class="btn btn-warning" name="crud" value="principal">Cancelar</button>
	     </div>
	    </form>