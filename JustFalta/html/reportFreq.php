<?php	

	require_once "../DAO/db_class.php";
	require_once __DIR__ . '/vendor/autoload.php';

	$conexao = new database();
    $link = $conexao->conecta_mysql();


  	$operacao = $_POST['selecao'];
  	$mes = $_POST['mes_busca'];

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


$html = '<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg .tg-0g60{font-weight:bold;background-color:#dae8fc;text-align:center;vertical-align:top}
		.tg .tg-n533{font-weight:bold;background-color:#dae8fc;border-color:inherit;text-align:center;vertical-align:top}
		</style>
			<table class="tg">
			 <thead>
			  <tr>
			    <th class="tg-0g60" rowspan="2">#</th>
			    <th class="tg-0g60" rowspan="2">Aluno<br></th>
			    <th class="tg-0g60" rowspan="2">Bolsa Família</th>
			    <th class="tg-0g60" colspan="2">'.$nomeMes1.'</th>
			    <th class="tg-0g60" colspan="2">'.$nomeMes2.'</th>
			    <th class="tg-0g60" rowspan="2">Status</th>
			  </tr>
			  <tr>
			  	<th class="tg-0g60">F</th>
			  	<th class="tg-0g60">%</th>
			  	<th class="tg-0g60">F</th>
			  	<th class="tg-0g60">%</th>
			  </tr>
			 </thead>
			';

   	 if($operacao == 'bf'){

	    	$query = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE a.bf_aluno = 'SIM' and p.mes_frequencia = '$mes1' ORDER BY a.nome_aluno;";
	    	$query1 = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE a.bf_aluno = 'SIM' and p.mes_frequencia = '$mes2' ORDER BY a.nome_aluno; ";
			$result = mysqli_query($link, $query);
			$result1 = mysqli_query($link, $query1);
		    $contador = 0;
		    $i = 0;
	    
		  while ($linha = mysqli_fetch_array($result1)) {
		    	$i++;
		    	$falta[$i] = $linha['faltas_frequencia'];
		    	$nota[$i] = $linha['percentual_frequencia'];
		    }


		   while($row = mysqli_fetch_array($result)){
			    	$contador++;
			     	$aluno = $row['nome_aluno'];
				    $bf = $row['bf_aluno'];
				    $freq1 = $row['percentual_frequencia'] * 100;
				    $freq2 = $nota[$contador] * 100;
				    $falta1 = $falta[$contador];
				    $falta2 = $row['faltas_frequencia'];
		 		    $turma = $row['serie_turma'];
				    $prof = $row['prof_turma'];
				    $turno = $row['turno_turma'];
				    	if($freq1 > 84 && $freq2 > 84 ){
				    		$status = "Freq. Regular";
				    	}else{
				    		$status = "Baixa Frequencia";
				    	}
			    	$html .= '<tr>
			                  	<td>'.$contador.'</td>
			                  	<td>'.$aluno.'</td>
			                  	<td>'.$bf.'</td>
			                  	<td>'.$falta2.'</td>
			                  	<td>'.round($freq1).'%</td>
			                  	<td>'.$falta1.'</td>
			                  	<td>'.round($freq2).'%</td>
			                  	<td>'.$status.'</td>
			                </tr>';

					}
		}else{
				$query = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE p.mes_frequencia = '$mes1' ORDER BY a.nome_aluno;";
	    		$query1 = "SELECT * FROM tb_frequencia p INNER JOIN tb_aluno a on (a.id_aluno = p.aluno_frequencia) INNER JOIN tb_turma b on (b.id_turma = a.turma_aluno) WHERE p.mes_frequencia = '$mes2' ORDER BY a.nome_aluno;";
				$result = mysqli_query($link, $query);
				$result1 = mysqli_query($link, $query1);
			    $contador = 0;
			    $i = 0;
		    
			   while ($linha = mysqli_fetch_array($result1)) {
		    	$i++;
		    	$falta[$i] = $linha['faltas_frequencia'];
		    	$nota[$i] = $linha['percentual_frequencia'];
		    }


			while($row = mysqli_fetch_array($result)){
			    	$contador++;
			     	$aluno = $row['nome_aluno'];
				    $bf = $row['bf_aluno'];
				    $freq1 = $row['percentual_frequencia'] * 100;
				    $freq2 = $nota[$contador] * 100;
				    $falta1 = $falta[$contador];
				    $falta2 = $row['faltas_frequencia'];
		 		    $turma = $row['serie_turma'];
				    $prof = $row['prof_turma'];
				    $turno = $row['turno_turma'];
				    	if($freq1 > 84 && $freq2 > 84 ){
				    		$status = "Freq. Regular";
				    	}else{
				    		$status = "Baixa Frequencia";
				    	}
			    	$html .= '<tr>
			                  	<td>'.$contador.'</td>
			                  	<td>'.$aluno.'</td>
			                  	<td>'.$bf.'</td>
			                  	<td>'.$falta1.'</td>
			                  	<td>'.round($freq1).'%</td>
			                  	<td>'.$falta2.'</td>
			                  	<td>'.round($freq2).'%</td>
			                  	<td>'.$status.'</td>
			                </tr>';

					}
		}

                  	  
    $mpdf = new \Mpdf\Mpdf();
	
	$mpdf->WriteHTML('
		<html>

		<body>

		<div class="container-fluid logo">
		  <div class="logo" align="center">
		       <img class="mb-4" src="../images/cabecalho.png" alt="" width="1000" height="200">
		  </div>
		  <div class="box" align="justify">
		        <h3 align="center"><B><u>RELATÓRIO DE FREQUENCIA</u></B></h3>
		     
		        '
		        .$html.'</table> </div>');
		
	$mpdf->Output();

 // header("Location: ../html/main.php");
  
?>