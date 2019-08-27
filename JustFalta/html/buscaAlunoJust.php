<?php 
  include "menu.php";
  require_once "../DAO/db_class.php";
  $conexao = new database();
  $link = $conexao->conecta_mysql();
  $query = "SELECT * FROM tb_aluno order by nome_aluno";
  $consulta = mysqli_query($link, $query);


  $query2 = "SELECT p.id_just, p.resp_just, a.nome_aluno, b.serie_turma, b.turno_turma, p.dtInicio_just, p.dtTermino_just,
    p.desc_just, p.dtRetorno_just, p.qtDias_just, p.cid_just, p.dtEntrega_just, p.obs_just, b.prof_turma, 
     c.nome_usuario, p.status_just FROM tb_justificativa p 
     INNER JOIN tb_aluno a ON (a.id_aluno = p.aluno_just) 
     INNER JOIN tb_turma b ON (b.id_turma = a.turma_aluno) 
     INNER JOIN tb_usuario c ON (c.id_usuario = p.usuario_just) order by p.id_just DESC";

  $consulta2 = mysqli_query($link, $query2);

  ?>

   <form class="form-control"  action= "resultBusca.php" method="post">
      <div class="text-center mb-4" >
          <h1 class="h2">Busca de Justificativas por Aluno</h1>
      </div>
      <div class="row mb-3">
          <div class="col">
             <select id="id_aluno" class="form-control" placeholder="Turma" name="id_aluno">
              <?php 
                while ($linha = mysqli_fetch_array($consulta)){
               echo $linha['nome_aluno'];
                  echo '<option value="'.$linha['id_aluno'].'">'.$linha['nome_aluno'].'</option>';
                }
               ?>
              
            </select>

          </div>  
          <div class="form-group col-md-3">
            <button type="submit" class="btn btn-outline-primary">Buscar</button>
          </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <div class="table-responsive">
            <table class="table table-striped table-sm" id="tabela" class="minhaTabela">
              <thead>
                <tr>
                <th>ID</th>
                <th>Aluno<br></th>
                <th>Motivo<br></th>
                <th>Início<br></th>
                <th>Término</th>
                <th>Dias<br></th>
                <th>Turma</th>
                <th>Turno</th>
                <th>Responsável</th>
                <th>Entrega</th>
                <th>Status</th>
                </tr>
              </thead>
              <tbody>
               <?php 
                    while ($row = mysqli_fetch_array($consulta2)){
                      $id = $row['id_just']; 
                      $aluno = $row['nome_aluno'];
                      $turma = $row['serie_turma'];
                      $turno = $row['turno_turma'];
                      $inicio = date("d/m/Y", strtotime($row['dtInicio_just']));
                      $termino = date("d/m/Y", strtotime($row['dtTermino_just']));
                      $desc = $row['desc_just'];
                      $dias = $row['qtDias_just'];
                      $cid = $row['cid_just'];
                      $entrega = date("d/m/Y", strtotime($row['dtEntrega_just']));
                      $obs = $row['obs_just'];  
                      $resp = $row['resp_just'];
                      $status = $row['status_just'];
                      echo '<tr>
                                  <td>'.$id.'</td>
                                  <td>'.$aluno.'</td>
                                  <td>'.$desc.'</td>
                                  <td>'.$inicio.'</td>
                                  <td>'.$termino.'</td>
                                  <td>'.$dias.'</td>
                                  <td>'.$turma.'</td>
                                  <td>'.$turno.'</td>
                                  <td>'.$resp.'</td>
                                <td>'.$entrega.'</td>
                                <td>'.$status.'</td>
                              </tr>';   
                                }
                ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>   
    </form>             
            