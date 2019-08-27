<?php 
	
$id = $_POST['turma_aluno'];
$mes = $_POST['mes_busca'];

	echo '<script> r=confirm("Deseja imprimir?");if (r==true){window.open("../html/reportMes.php?id='.$id.'&mes='.$mes.'", "_blank");window.location= "../html/buscaReportMes.php";}else{window.location= "../html/main.php";}</script>';

 ?>