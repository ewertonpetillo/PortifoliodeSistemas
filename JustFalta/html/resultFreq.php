<?php 
	
	include "menu.php";
	require_once "../DAO/db_class.php";

	$conexao = new database();
    $link = $conexao->conecta_mysql();

  	$idaluno = $_POST['nome_aluno'];

  	$queryaluno = "SELECT nome_aluno FROM tb_aluno WHERE id_aluno = '$idaluno'; ";

    $query = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE a.id_aluno = '$idaluno'";

  	$result = mysqli_query($link, $query);
  	$consulta = mysqli_query($link, $queryaluno);
	$numrows = mysqli_num_rows($result);
  	
  	while ($linha = mysqli_fetch_array($consulta)) {
  		$nome = $linha['nome_aluno'];
  	}
    $contador = 0;

?>
	  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Justificativa por Aluno</h1>
       </div>

        <div class="table-responsive">
        	<form class="form-control"  action= "freqSelecao.php" method="post">
        	<span>Aluno: <b><?php echo $nome; ?></b></span>
        	<button type="submit" class="btn btn-outline-success" name="botao" value="add">Frequência</button>
        	<input type="hidden" name="id_aluno" value="<?php echo $idaluno ?>">
        	<br>
        	<br>
        	</form>
            <table class="table table-striped table-sm" id="tabela" class="minhaTabela">
              <thead>
                <tr>
		            <th>N° Mês</th>
		            <th>Mês</th>
				    <th>Faltas<br></th>
				    <th>Percentual<br></th>
				    <th>BF<br></th>
				    <th>Status</th>				    				  
			  </tr>
              </thead>
              <tbody>
               <?php 
               		if ($numrows == 0 ) {

               			echo '<tr><td> ALUNO SEM FREQUENCIA NOS MESES ANTERIORES. (ALUNO NOVO) </td></tr>' ;
               			
               		}else{
                    while ($row = mysqli_fetch_array($result)){
                    	$mes = $row['mes_frequencia'];
                     	$faltas = $row['faltas_frequencia']; 
                     	$percentual = $row['percentual_frequencia'] * 100;
                     	$bf = $row['bf_aluno'];
                     	if($percentual > 84 ){
		    				$status = "FREQUENCIA REGULAR.";
		    			}else{
		    				$status = "BAIXA FREQUENCIA";
		    			}

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
    			echo '<tr>
	                  	<td>'.$mes.'</td>
	                  	<td>'.$nomeMes.'</td>
	                  	<td>'.$faltas.'</td>
	                  	<td>'.round($percentual).'%</td>
	                  	<td>'.$bf.'</td>
	                	<td>'.$status.'</td>
	                </tr>';   
                    }
                }
                  ?>
                </tr>
              </tbody>
            </table>
          </div>

          <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1076" height="454" style="display: block; width: 1076px; height: 454px;"></canvas>