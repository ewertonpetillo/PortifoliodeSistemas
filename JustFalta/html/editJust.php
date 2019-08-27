<?php
session_start();
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();
	$id = $_GET['id'];

	$id_just = "";
    $resp = "";
    $aluno = "";
    $turma = "";
    $turno = "";
    $inicio = "";
    $termino = "";
    $desc = "";
    $retorno = "";
    $dias = "";
    $cid = "";
    $entrega ="";
    $obs = ""; 
    $prof = "";
    $usuario = "";

	$query = "SELECT p.id_just, p.resp_just, a.nome_aluno, b.serie_turma, b.turno_turma, p.dtInicio_just, p.dtTermino_just, p.desc_just, p.dtRetorno_just, p.qtDias_just, p.cid_just, p.dtEntrega_just, p.obs_just, b.prof_turma, c.nome_usuario FROM tb_justificativa p INNER JOIN tb_aluno a ON (a.id_aluno = p.aluno_just) INNER JOIN tb_turma b ON (b.id_turma = a.turma_aluno) INNER JOIN tb_usuario c ON (c.id_usuario = p.usuario_just) WHERE p.id_just = '$id'";

    $result = mysqli_query($link, $query);

	while($row = mysqli_fetch_array($result)){
    	$_SESSION['id_just'] = $row['id_just'];
    	$resp = $row['resp_just'] ;  
    	$aluno = $row['nome_aluno'];
	    $turma = $row['serie_turma'];
	    $turno = $row['turno_turma'];
	    $inicio = date("d/m/Y", strtotime($row['dtInicio_just']));
	    $termino = date("d/m/Y", strtotime($row['dtTermino_just']));
	    $desc = $row['desc_just'];
	    $retorno = date("d/m/Y", strtotime($row['dtRetorno_just']));
	    $dias = $row['qtDias_just'];
	    $cid = $row['cid_just'];
	    $entrega = date("d/m/Y", strtotime($row['dtEntrega_just']));
	    $obs = $row['obs_just']; 
	    $prof = $row['prof_turma'];
	    $usuario = $row['nome_usuario'];  	
    }

  ?>

   <form class="form-control"  action= "../Controller/just_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Alteração de Justificativa</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="col">
	        	 <input type="text" readonly="true" name="aluno" class="form-control" value="<?php echo $aluno;?>">
	        </div>	
                
	    </div>
	    <div class="row mb-3">
		    <div class="input-group col-md-12">
	  			<div class="input-group-prepend">
	   			<span class="input-group-text">Justificativa</span>
	  			</div>
	 			<textarea class="form-control" aria-label="Com textarea" name="justificativa" id="justificativa"> <?php echo $desc;?></textarea>
			</div>
		</div>
	    <div class="row mb-3">    	
	    	<div class="form-group col-md-4">
	        	 <input id="dtInicio" class="form-control" placeholder="Data de Início"  autofocus="" type="date" name="dtInicio"  value="<?php echo $inicio;?>">
	        </div>	
	        <div class="form-group col-md-4">
	        	<input id="dias" class="form-control" placeholder="Qtd. Dias" autofocus="" type="number" name="dias" value="<?php echo $dias;?>" >
	        </div>
	        <div class="form-group col-md-4">
	        	 <input id="cid" class="form-control" placeholder="CID"  autofocus="" type="name" name="cid" value="<?php echo $cid;?>">
	        </div>	
	        <div class="form-group col-md-12">
	        	<input id="responsavel" class="form-control" placeholder="Responsável pela Justificativa"  autofocus="" type="name" name="responsavel" value="<?php echo $resp;?>">
	        </div>	
	       	<div class="form-group col-md-9">
	        	<input id="obs" class="form-control" placeholder="Observações: " autofocus="" type="obs" name="obs" value="<?php echo $obs;?>">
	        </div>	
	        <div class="form-group col-md-9">
	        	<label>Recebedor: <?php  echo $usuario?></label>
	        </div>	
	    </div>    
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success" name="crud" value="salvarEdit">Salvar</button>
	      	<button type="submit" class="btn btn-warning" name="crud" value="principal">Cancelar</button>
	     </div>
	    </form>