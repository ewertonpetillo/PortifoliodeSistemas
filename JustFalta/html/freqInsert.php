<?php
	include "menu.php";	
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();

	$id = $_GET['id'];

	$query = "SELECT * FROM tb_aluno WHERE id_aluno = '$id'";
	$consulta = mysqli_query($link, $query);

	while ($linha = mysqli_fetch_array($consulta)){
			$aluno = $linha['nome_aluno'];
	}

	$mes = $_GET['mes'];

	switch ($mes) {
	  		case '1':
	  			$nomeMes = "JANEIRO";
	  			break;
	  		case '2':
	  			$nomeMes = "FEVEREIRO";
	  			break;
			case '3':
				$nomeMes = "MARÇO";
				break;
			case '4':
	  			$nomeMes = "ABRIL";
				break;
			case '5':
	  			$nomeMes = "MAIO";
				break;
	  		case '6':
	  			$nomeMes = "JUNHO";					  	
	  			break;
			case '7':
	  			$nomeMes = "JULHO";								
			break;	
			case '8':
				$nomeMes = "AGOSTO";
				break;
			case '9':
	  			$nomeMes = "SETEMBRO";
				break;
			case '10':
	  			$nomeMes = "OUTUBRO";
				break;
	  		case '11':
	  			$nomeMes = "NOVEMBRO";					  	
	  			break;
			case '12':
	  			$nomeMes = "DEZEMBRO";								
			break;

	  	}


  ?>

  <form class="form-control"  action= "frequencia_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Frequência</h1>
      	</div>
	    <div class="row mb-3">
	        <div class="col">
	        	 <input id="aluno" class="form-control" placeholder="Aluno" autofocus="" type="text" name="aluno" readonly="true" value="<?php echo $aluno ?>">
	        </div>	 
	         <div class="col">
	        	 <input id="mes" class="form-control" placeholder="Mês" autofocus="" type="text" name="mes" readonly="true" value="<?php echo $nomeMes ?>">
	        </div>	  
	       	<div class="col">
	        	 <input id="freq" class="form-control" placeholder="Faltas" autofocus="" type="text" name="freq">
	        	 <input type="hidden" name="mes_id" value="<?php echo $mes ?>">
	        	 <input type="hidden" name="aluno_id" value="<?php echo $id ?>">
	        </div>	      
	    </div>
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success" name="btn" value="salvar">Salvar</button>
	      	<button type="submit" class="btn btn-secondary" name="btn" value="principal">Cancelar</button>

	    </div>
	    </form>
  

