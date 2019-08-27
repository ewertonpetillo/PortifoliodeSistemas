

  <?php

    session_start();

    if(!isset($_SESSION['nome_usuario'])){
      echo '<script>alert("É necessário realizar login para acessar esta página."); window.location= "../index.php"</script>';
    }

    include "menu.php";
    require_once "../DAO/db_class.php";
    $conexao = new database();
    $link = $conexao->conecta_mysql();
    $query = "SELECT * FROM tb_avisos";
    $consulta = mysqli_query($link, $query);
//    require_once("valida_login.php");
  //  $login_usuario = $_POST['login'];
  //  $senha_usuario = $_POST['senha'];
  //  $usuario_validado = fun_valida_login($login_usuario, $senha_usuario);

  //  if($usuario_validado){
  //    echo "Usuário Validado";
 //   }else{
  //    echo "Usuário Negado";
  //  }
  ?>


  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Quadro de Avisos</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
           <form class="form-control"  action= "avisos.php" method="post">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" type="submit" name="btn" value="exclui">Excluir</button>
                <button class="btn btn-sm btn-outline-secondary" id="visualizarDados" class="visualizarDados" type="submit" name="btn" value="altera">Sinalizar</button>
              </div>
            </div>
          </div>

 
          <div class="table-responsive">
            <table class="table table-striped table-sm" id="tabela" class="minhaTabela">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID</th>
                  <th>Aviso</th>
                  <th>Data</th>
                  <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                    <?php 
                    while ($linha = mysqli_fetch_array($consulta)){
                      echo '<tr><td><input type="radio" name="id_aviso" value="'.$linha['id_aviso'].'"></input></td>';
                      echo '<td> '.$linha['id_aviso'].'</td>';
                      echo '<td> '.$linha['desc_aviso'].'</td>';
                      echo '<td> '.$linha['data_aviso'].'</td>';
                      echo '<td> '.$linha['status_aviso'].'</td></tr>';
                     // echo '<input type="hidden" name="status" value='.$linha['status_aviso'].'></input>';
                    }
                  ?>
                </tr>

                </form>
              </tbody>
            </table>
          </div>
           
</form>
          
</body>
<canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1076" height="454" style="display: block; width: 1076px; height: 454px;"></canvas>
</html>