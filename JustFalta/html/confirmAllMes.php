<?php 
	
$mes = $_POST['mes_busca'];

	echo '<script> r=confirm("Deseja imprimir?");if (r==true){window.open("../html/reportAllMes.php?mes='.$mes.'", "_blank");window.location= "../html/main.php";}else{window.location= "../html/main.php";}</script>';

 ?>