  <?php
    include "menu.php";
    require_once "../DAO/db_class.php";



    $conexao = new database();
    $link = $conexao->conecta_mysql();
    $query = "SELECT  a.id_aluno, a.nome_aluno, b.serie_turma, a.sigeam_aluno, a.mae_aluno, a.dtnasc_aluno, a.bf_aluno FROM tb_aluno a inner join tb_turma b on b.id_turma = a.turma_aluno order by nome_aluno";
    $consulta = mysqli_query($link, $query);


  ?>
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Pesquisa</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <form class="form-control"  action= "../Controller/aluno_control.php" method="post">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" type="submit" name="crud" value="edit">Editar</button>
                <button class="btn btn-sm btn-outline-secondary" type="submit" name="crud" value="excluir">Excluir</button>
              </div>
             
            </div>
              
          </div>
 
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cod. Sigeam</th>
                  <th>Nome do aluno</th>
                  <th>Data de Nascimento</th>
                  <th>BF</th>
                  <th>Nome da mãe</th>
                  <th>Turma</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  while ($linha = mysqli_fetch_array($consulta)){
                        $id = $linha['id_aluno'];
                        $sig = $linha['sigeam_aluno'];
                        $nom = $linha['nome_aluno'];
                        $dat = date("d/m/Y", strtotime($linha['dtnasc_aluno']));
                        $mae = $linha['mae_aluno']; 
                        $tur = $linha['serie_turma'];
                        $bf = $linha['bf_aluno']; 
                         echo '<tr>
                          <td><input type="radio" name="id_aluno" value="'.$id.'"></input></td>
                          <td>'.$sig.'</td>
                          <td>'.$nom.'</td>
                          <td>'.$dat.'</td>
                          <td>'.$bf.'</td>
                          <td>'.$mae.'</td>
                          <td>'.$tur.'</td>
                        </tr>';
                 }
               ?>
              </tbody>
            </table>
          </div>

        </form>
          <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1076" height="454" style="display: block; width: 1076px; height: 454px;"></canvas>

</body></html>