 <?php

    include "menu.php";
    require_once "../DAO/db_class.php";

   $id = $_POST['turma'];
   $mes = $_POST['mes_busca'];

    $conexao = new database();
    $link = $conexao->conecta_mysql();
    $query = "SELECT * FROM tb_aluno where turma_aluno = '$id' order by nome_aluno";
    $consulta = mysqli_query($link, $query);

    switch ($mes) {
      case '1':
        $mes_nome = "Janeiro";
        break;
      case '2':
        $mes_nome = "Fevereiro";
        break;
      case '3':
      $mes_nome = "Março";
      break;
      case '4':
      $mes_nome = "Abril";
      break;
      case '5':
      $mes_nome = "Maio";
      break;
      case '6':
      $mes_nome = "Junho";
      break;
      case '7':
      $mes_nome = "Julho";
      break;
      case '8':
      $mes_nome = "Agosto";
      break;
      case '9':
      $mes_nome = "Setembro";
      break;
      case '10':
      $mes_nome = "Outubro";
      break;
      case '11':
      $mes_nome = "Novembro";
      break;
      case '12':
        $mes_nome = "Dezembro";
      break;
    }


    $sql = "SELECT COUNT(*) AS qtd FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE b.id_turma = '$id' and p.mes_frequencia = '$mes'";


    $result = mysqli_query($link, $sql);
          

    $row = mysqli_fetch_array($result);

    $cont = $row['qtd'];

    if ($cont > 0){
        echo '<script>alert("Frequência do mês de '.$mes_nome.' desta turma já foi registrada.");window.location= "../html/registro_frequencia.php";</script>';
    }

  ?>


  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Frequência</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
           <form class="form-control"  action= "frequencia_control.php" method="post">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" type="submit" name="btn" value="enviar">Enviar</button>
                <button class="btn btn-sm btn-outline-secondary" id="visualizarDados" class="visualizarDados" type="submit" name="btn"value="altera">Cancelar</button>
              </div>
            </div>
          </div>

 
          <div class="table-responsive">
            <table class="table table-striped table-sm" id="tabela" class="minhaTabela">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Nome</th>
                  <th>Sigeam</th>              
                  <th>Bolsa Família</th>
                  <th><?php echo $mes_nome ?></th>
                  </tr>
              </thead>
              <tbody>
                    <?php 
                       $contador = 0; 
                    while ($linha = mysqli_fetch_array($consulta)){
                      $contador++;
                      $turma = $linha['turma_aluno'];
                      echo '<tr><td> '.$contador.'</td>';
                      echo '<td>'.$linha['nome_aluno'].'<input type="hidden" id="aluno_id_'.$linha['id_aluno'].'" name="aluno_id[]" value="'.$linha['id_aluno'].'"></input></td>';
                      echo '<td>'.$linha['sigeam_aluno'].'</td>';
                      echo '<td> '.$linha['bf_aluno'].'</td>';
                      echo '<td><input type="text" class="form-group col-md-2" id="freq_'.$linha['id_aluno'].'" name="freq['.$linha['id_aluno'].']"></input></td></tr>';
                      
                    }
                  ?>
                </tr>
                <input type="hidden" name="turma_id" value="<?php echo $id ?>"></input>
                <input type="hidden" name="mes_id" value="<?php echo $mes ?>"></input>
                </form>
              </tbody>
            </table>
          </div>
           
</form>
          
</body>
<canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1076" height="454" style="display: block; width: 1076px; height: 454px;"></canvas>
</html>