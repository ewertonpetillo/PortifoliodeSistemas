<?php 
	
$id = $_POST['nome_aluno'];
$mes = $_POST['mes_busca'];

	echo '<script> r=confirm("Deseja imprimir?");if (r==true){window.open("../html/declaracao.php?id='.$id.'&mes='.$mes.'", "_blank");window.location= "../html/buscaReportFreq.php";}else{window.location= "../html/main.php";}</script>';

 ?>