<?php
	session_start();
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$query = "SELECT * FROM tb_aluno order by nome_aluno";
	$consulta = mysqli_query($link, $query);

  ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#propriamae").on("click", function(){
            if($(this).prop("checked")){
              $("#responsavel").prop("disabled", true); 
          }
          else{
              $("#responsavel").prop("disabled", false);
          }
        });
    });
    </script>

 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <form class="form-control"  action= "../Controller/just_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Cadastro de Justificativa</h1>
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
	        	<button type="button" class="btn btn-outline-primary" onclick="window.location.href='cad_aluno.php'">Novo Aluno</button>
	        </div>
	                
	    </div>
	    <div class="row mb-3">
		    <div class="input-group col-md-12">
	  			<div class="input-group-prepend">
	   			<span class="input-group-text">Justificativa</span>
	  			</div>
	 			<textarea class="form-control" aria-label="Com textarea" name="justificativa" id="justificativa"></textarea>
			</div>
		</div>
	    <div class="row mb-3">    	
	    	<div class="form-group col-md-4">
	        	 <input id="dtInicio" class="form-control" placeholder="Data de Início"  autofocus="" type="date" name="dtInicio">
	        </div>	
	        <div class="form-group col-md-4">
	        	<input id="dias" class="form-control" placeholder="Qtd. Dias" autofocus="" type="number" name="dias" >
	        </div>
	        <div class="form-group col-md-4">
	        	 <input id="cid" class="form-control" placeholder="CID"  autofocus="" type="name" name="cid">
	        </div>	
	        <div class="form-group col-md-9">
	        	<input id="responsavel" class="form-control" placeholder="Responsável pela Justificativa"  autofocus="" type="name" name="responsavel" >
	        </div>	
	         <div class="form-group col-md-3">
	       		<input type="checkbox" aria-label="Chebox para permitir input text" id="propriamae" name="propriamae" value="on"> Própria Mãe
	       	</div>
	       	<div class="form-group col-md-9">
	        	<input id="obs" class="form-control" placeholder="Observações: " autofocus="" type="obs" name="obs" >
	        </div>	
	        <div class="form-group col-md-9">
	        	<label>Recebedor: <?php  echo $_SESSION['nome_usuario']?></label>
	        </div>	
	    </div>    
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success" name="crud" value="salvar">Salvar</button>
	      	<button type="submit" class="btn btn-danger" name="crud" value="excluir">Excluir</button>	
	      	<button type="submit" class="btn btn-warning" name="crud" value="excluir">Editar</button>
	      	<button type="submit" class="btn btn-secondary" name="crud" value="reimprime">Reimprimir</button>

	    </div>
	    </form>
 