<?php	

	require_once "../DAO/db_class.php";
	require_once __DIR__ . '/vendor/autoload.php';

	$conexao = new database();
    $link = $conexao->conecta_mysql();

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

    $query = "SELECT p.id_just, p.resp_just, a.nome_aluno, b.serie_turma, b.turno_turma, p.dtInicio_just, p.dtTermino_just, p.desc_just, p.dtRetorno_just, p.qtDias_just, p.cid_just, p.dtEntrega_just, p.obs_just, b.prof_turma, c.nome_usuario FROM tb_justificativa p INNER JOIN tb_aluno a ON (a.id_aluno = p.aluno_just) INNER JOIN tb_turma b ON (b.id_turma = a.turma_aluno) INNER JOIN tb_usuario c ON (c.id_usuario = p.usuario_just) WHERE p.id_just = (SELECT MAX(id_just) FROM tb_justificativa)";


    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)){
    	$id_just = $row[id_just];
    	$resp = $row[resp_just] ;  
    	$aluno = $row[nome_aluno];
	    $turma = $row[serie_turma];
	    $turno = $row[turno_turma];
	    $inicio = date("d/m/Y", strtotime($row[dtInicio_just]));
	    $termino = date("d/m/Y", strtotime($row[dtTermino_just]));
	    $desc = $row[desc_just];
	    $retorno = date("d/m/Y", strtotime($row[dtRetorno_just]));
	    $dias = $row[qtDias_just];
	    $cid = $row[cid_just];
	    $entrega = date("d/m/Y", strtotime($row[dtEntrega_just]));
	    $obs = $row[obs_just]; 
	    $prof = $row[prof_turma];
	    $usuario = $row[nome_usuario];  	
    }

    $mpdf = new \Mpdf\Mpdf();
	
	$mpdf->WriteHTML('
		<html>
		<style type="text/css">
		.logo{
		  margin: auto;
		  width:100%;
		  margin-bottom: 15px;

		}

		.box {
		  margin: auto;
		  background: white;
		  text-align: justify;
		  width: 640PX;
		}

		.texto{
			margin: auto;
			text-align: justify;
			

		<body>

		<div class="container-fluid logo">
		  <div class="logo" align="center">
		       <img class="mb-4" src="../images/cabecalho.png" alt="" width="800" height="140">
		  </div>
		  <div class="box" align="justify">
		        <h3 align="center"><B><u>JUSTIFICATIVA DE FALTAS</u></B></h3>
		        <h4 align="right">Nº '.$id_just.'/2019</h4>
		        <br>
		       

		<p class="texto" style="line-height: 1.5;">Eu, <b>'.$resp.'</b>, responsável pelo aluno <b>'.$aluno.'</b>, da turma <b>'.$turma.'</b>, turno <b>'.$turno.' </b>, venho por meio deste justificar a(s) falta(s) do referido aluno no periodo de: </p><br>

		<p align="center"><b>'.$inicio.' a '.$termino.'</b></p> <br>

		<b>Justificativa:</b><br>
		'.$desc.'
		<br>    

		<p align="center" style="word-spacing: 6px;"><b>CID: </b>'.$cid.'<b> Quantidade de dias: '.$dias.' </b> <br> <br>
		O aluno retornará às suas atividades no dia '.$retorno.'. <br> 

		Declaro serem verdadeiras as afirmações e dou fé. <br><br>
		<p align="center">Atenciosamente,<br></p>
		<p align="center">_________________________________________________ <br>
		'.$resp.'
		<br> </p>
		<b>Obs: </b>'.$obs.'. <br>

			<p align="center"><b>(  ) DEFERIDO                 (  ) INDEFERIDO</b></p><br> 

		Ciente: <br>
		_______________________________________ <br>
		'.$prof.'
		<br><br>

		Recebido:<br>
		_______________________________________ <br>
		'.$usuario.'
		<br><br>

		Em: '.$entrega.' <br><br>


		  </div>
		</div>


		<div>
		  <div class="container col-mb-9" >   
		      <div class="text-center" > 
		       
		      </div>      
		  <div class="text-center mb-4"   >
		   
		  </div>
		</div>
		<div class="col-mb-2">

		</div>

		<div class="mb-12">


		</div>



		</body>
		</html>');   

	$mpdf->Output();

  header("Location: ../html/main.php");
  


?>