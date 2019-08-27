<?php 
	include "menu.php";
	require_once "../DAO/db_class.php";
	$conexao = new database();
	$link = $conexao->conecta_mysql();

    $query = "SELECT p.id_just, p.resp_just, a.nome_aluno, b.serie_turma, b.turno_turma, p.dtInicio_just, p.dtTermino_just,
 		p.desc_just, p.dtRetorno_just, p.qtDias_just, p.cid_just, p.dtEntrega_just, p.obs_just, b.prof_turma, 
		 c.nome_usuario, p.status_just FROM tb_justificativa p 
		 INNER JOIN tb_aluno a ON (a.id_aluno = p.aluno_just) 
		 INNER JOIN tb_turma b ON (b.id_turma = a.turma_aluno) 
		 INNER JOIN tb_usuario c ON (c.id_usuario = p.usuario_just) 
		 WHERE p.status_just = 'EM ANÁLISE' OR p.status_just = 'INDEFERIDO' order by p.dtEntrega_just;";

	$consulta = mysqli_query($link, $query); 
	$numrows = mysqli_num_rows($consulta);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Análise de Justificativa</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
           <form class="form-control"  action= "analise.php" method="post">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" type="submit" name="btn" value="defere">Deferir</button>
                <button class="btn btn-sm btn-outline-secondary" id="visualizarDados" class="visualizarDados" type="submit" name="btn"value="indefere">Indeferir</button>
              </div>
            </div>
          </div>
 
          <div class="table-responsive">
            <table class="table table-striped table-sm" id="tabela" class="minhaTabela">
              <thead>
                <tr>
					<th>#</th>
                  	<th>ID</th>
				    <th>Aluno<br></th>
				    <th>Motivo<br></th>
				    <th>Início<br></th>
				    <th>Término</th>
				    <th>Dias<br></th>
				    <th>Retorno<br></th>
				    <th>Turma</th>
				    <th>Turno</th>
				    <th>Professor(a)</th>
				    <th>Responsável</th>
				    <th>Entrega</th>
				   	<th>Status</th>
                  </tr>
              </thead>
              <tbody>
                    <?php 
                    if ($numrows == 0 ) {

               			echo '<tr><td> NÃO HÁ REGISTRO PARA SEREM MOSTRADOS. </td></tr>' ;
               			
               		}else{
                    while ($row = mysqli_fetch_array($consulta)){
                       	$id = $row['id_just']; 
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
					    $resp = $row['resp_just'];
					    $status = $row['status_just'];
    			echo '<tr>
    					<tr><td><input type="radio" name="id_just" value="'.$id.'"></input></td>
	                  	<td>'.$id.'</td>
	                  	<td>'.$aluno.'</td>
	                  	<td>'.$desc.'</td>
	                  	<td>'.$inicio.'</td>
	                  	<td>'.$termino.'</td>
	                	<td>'.$dias.'</td>
	                	<td>'.$retorno.'</td>
	                  	<td>'.$turma.'</td>
	                   	<td>'.$turno.'</td>
	                    <td>'.$prof.'</td>
	                    <td>'.$resp.'</td>
	                    <td>'.$entrega.'</td>
		                <td>'.$status.'</td>
	                </tr>';   
	            		}
	            	}
                     ?>
                 
                </tr>
                </form>
              </tbody>
            </table>
          </div>
</form>
          <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1076" height="454" style="display: block; width: 1076px; height: 454px;"></canvas>

</body></html>