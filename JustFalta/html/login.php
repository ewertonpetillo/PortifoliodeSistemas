  <?php

    session_start();

    require_once("valida_login.php");

    $conexao = new database();
    $link = $conexao->conecta_mysql();
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM tb_usuario WHERE email_usuario = '$login'  AND senha_usuario = '$senha'";
    $result = mysqli_query($link, $sql); 

    if($result){
        $dados = mysqli_fetch_array($result); 
          if (isset($dados['nome_usuario'])) {

            $_SESSION['id_usuario'] = $dados['id_usuario'];
            $_SESSION['email_usuario'] = $dados['email_usuario']; 
            $_SESSION['nome_usuario'] = $dados['nome_usuario'];

            header("Location: ../html/main.php");
          }else{
            echo '<script>alert("Usuário e/ou Senha errada(o) ou não existente."); window.location= "../index.php"</script>';
          }
    }else{
          echo '<script>alert("Ocorreu um erro ao consultar o Banco de Dados. Favor contactar o Administrador."); window.location= "../index.php"</script>';    
    }

   
  ?>