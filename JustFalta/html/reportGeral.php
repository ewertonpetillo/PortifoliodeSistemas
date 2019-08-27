<?php	

	require_once "../DAO/db_class.php";
	require_once __DIR__ . '/vendor/autoload.php';

	$conexao = new database();
    $link = $conexao->conecta_mysql();


    $mes = $_GET['mes'];
  	$idturma = $_GET['id'];

    $query = "SELECT p.id_just, p.resp_just, a.nome_aluno, b.serie_turma, b.turno_turma, p.dtInicio_just, p.dtTermino_just,
 		p.desc_just, p.dtRetorno_just, p.qtDias_just, p.cid_just, p.dtEntrega_just, p.obs_just, b.prof_turma, 
		 c.nome_usuario, p.status_just FROM tb_justificativa p 
		 INNER JOIN tb_aluno a ON (a.id_aluno = p.aluno_just) 
		 INNER JOIN tb_turma b ON (b.id_turma = a.turma_aluno) 
		 INNER JOIN tb_usuario c ON (c.id_usuario = p.usuario_just) 
		 order by p.dtInicio_just;";

$html = "<style type='text/css'>
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg .tg-0g60{font-weight:bold;background-color:#dae8fc;text-align:center;vertical-align:top}
		.tg .tg-n533{font-weight:bold;background-color:#dae8fc;border-color:inherit;text-align:center;vertical-align:top}
		</style>
			<table class='tg'>
			 <thead>
			  <tr>
			    <th class='tg-0g60'>ID</th>
			    <th class='tg-0g60'>Aluno<br></th>
			    <th class='tg-0g60'>Motivo<br></th>
			    <th class='tg-0g60'>Início<br></th>
			    <th class='tg-n533'>Término</th>
			    <th class='tg-0g60'>Dias<br></th>
			    <th class='tg-0g60'>Retorno<br></th>
			    <th class='tg-0g60'>Turma</th>
			    <th class='tg-0g60'>Turno</th>
			    <th class='tg-0g60'>Professor(a)</th>
			    <th class='tg-0g60'>Recebedor</th>
			    <th class='tg-0g60'>Responsável</th>
			    <th class='tg-0g60'>Entrega</th>
			    <th class='tg-0g60'>Status</th>
			  </tr>
			 </thead>
			";

   	$result = mysqli_query($link, $query);
    while($row = mysqli_fetch_array($result)){
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
    	$html .= '<tr>
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
                    <td>'.$usuario.'</td>
                    <td>'.$resp.'</td>
                    <td>'.$entrega.'</td>
                    <td>'.$status.'</td>
                </tr>';    
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
		        <h3 align="center"><B><u>JUSTIFICATIVA DE FALTAS</u></B></h3>
		        <br>
		        '
		        .$html.'</table> </div>');
		
	$mpdf->Output();

 // header("Location: ../html/main.php");
  
?>