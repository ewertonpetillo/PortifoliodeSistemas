<?php	

	require_once "../DAO/db_class.php";
	require_once __DIR__ . '/vendor/autoload.php';

	$conexao = new database();
    $link = $conexao->conecta_mysql();


    $mes = $_GET['mes'];
  	$idaluno = $_GET['id'];

  	switch ($mes) {
  		case '1':
  			$mes1 = 1;
  			$mes2 = 0;
  			$nomeMes1 = "JANEIRO";
  			$nomeMes2 = "VAZIO";
  			break;
  		case '2':
  			$mes1 = 2;
  			$mes2 = 3;
  			$nomeMes1 = "FEVEREIRO";
  			$nomeMes2 = "MARÇO";
  			break;
		case '3':
			$mes1 = 4;
			$mes2 = 5;
			$nomeMes1 = "ABRIL";
	  		$nomeMes2 = "MAIO";
			break;
		case '4':
			$mes1 = 6;
			$mes2 = 7;
			$nomeMes1 = "JUNHO";
  			$nomeMes2 = "JULHO";
			break;
		case '5':
			$mes1 = 8;
			$mes2 = 9;
			$nomeMes1 = "AGOSTO";
  			$nomeMes2 = "SETEMBRO";
			break;
  		case '6':
  			$mes1 = 10;
  			$mes2 = 11;
  			$nomeMes1 = "OUTUBRO";
  			$nomeMes2 = "NOVEMBRO";
  			break;
		case '7':
			$mes1 = 12;
			$mes2 = 0;
			$nomeMes1 = "DEZEMBRO";
  			$nomeMes2 = "VAZIO";
		break;	
  	}

    $query = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE a.id_aluno = '$idaluno' and p.mes_frequencia = '$mes1'";

    $query1 = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE a.id_aluno = '$idaluno' and p.mes_frequencia = '$mes2' ";


   	$result = mysqli_query($link, $query);
    $result1 = mysqli_query($link, $query1);
    $contador = 0;
    $i = 0;
    
    while ($linha = mysqli_fetch_array($result1)) {
    	$i++;
    	$nota[$i] = $linha['percentual_frequencia'];
    	$id = $linha['id_turma'];
    }

 //   if($idturma < 8){
 //   	$query2 = "SELECT * FROM tb_aluno p INNER JOIN tb_turma b on (b.id_turma = p.turma_aluno) WHERE p.id_aluno = '$idaluno';" ;
//		$result2 = mysqli_query($link, $query2);
//		while ($resultado = mysqli_fetch_array($result2)) {
			//$aluno = $resultado['nome_aluno'];
//			$sigeam = $resultado['sigeam_aluno'];
			//$turma = $resultado['serie_turma'];
			//$turno = $resultado['turno_turma'];
			//$freq1 = 100;
			///$freq2 = 100;
			//$ensino = "EDUCAÇÃO INFANTIL";
			//$status = "O referido aluno pertence à EDUCAÇÃO INFANTIL portanto não está registrado no SISTEMA PRESENÇA.";
			//setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
			//date_default_timezone_set('America/Manaus');
			//$dataEntrega = strftime('%d de %B de %Y', strtotime('today'));
		//}
    //}else{
    	while($row = mysqli_fetch_array($result)){
		    	$contador++;
		    	$idturma = $row['id_turma'];    	
		     	$aluno = $row['nome_aluno'];
		     	$sigeam = $row['sigeam_aluno'];
			    $bf = $row['bf_aluno'];
			    $freq1 = $row['percentual_frequencia'] * 100;
			    $freq2 = $nota[$contador] * 100;
			    $turma = $row['serie_turma'];
			    $prof = $row['prof_turma'];
			    $turno = $row['turno_turma'];
			   	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
				date_default_timezone_set('America/Manaus');
				$dataEntrega = strftime('%d de %B de %Y', strtotime('today'));
				
				if ($idturma < 8 ) {
					$ensino = "EDUCAÇÃO INFANTIL";
					$status = "O referido aluno pertence à EDUCAÇÃO INFANTIL portanto não está registrado no SISTEMA PRESENÇA.";
				}else{
					if($freq1 > 84 && $freq2 > 84){
				    		$status = "O referido encontra-se com sua FREQUENCIA REGULAR.";
				    	}else{
				    		$status = "O referido aluno possui BAIXA FREQUENCIA no período citado.";
				    	}
				    		if($idturma > 7 && $idturma < 15){
				    			$ensino = "BLOCO PEDAGÓGICO";	
				    		}else{
				    			$ensino = "ENSINO FUNDAMENTAL";
				    		}

				    }

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
		       <img class="mb-4" src="../images/dec.png" alt="" width="800" height="140">
		  </div>
		  <div class="box" align="justify">
		  <br><br>
		        <h3 align="center"><B><u>DECLARAÇÃO DE FREQUÊNCIA</u></B></h3>
		        <br><br>
		       <br><br>
		<p class="texto" style="line-height: 2.5;" align="justify">Declaramos para os devidos fins que o(a) aluno(a), <b>'.$aluno.'</b>, sob o código(SIGEAM): <b>'.$sigeam.'</b>, está matriculado neste Estabelecimento de Ensino no ano de 2019, onde cursa o <b>'.$turma.'</b>, no turno <b>'.$turno.'  </b> do(a) <b>'.$ensino.'</b>, e possui frequência e especificações abaixo descritas.  </p><br>

		<p align="justify"><b> Frequência: </b></p> <br>		
		<p align="justify" style="word-spacing: 6px;"><b>'.$nomeMes1.' :</b> '.round($freq1).'%  ------ <b> '.$nomeMes2.': </b> '.round($freq2).'%<br> <br>

		<p align="justify"><b>Situação : </b> '.$status.'<br></p>
		<br>
		<p align="center">Manaus, '.$dataEntrega.'</p> 


		  </div>
		</div>
				</body>
		</html>');   
		
	$mpdf->Output();

 // header("Location: ../html/main.php");
  
?>