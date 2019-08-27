<?php 
	
$id = $_POST['turma_aluno'];

	echo '<script> r=confirm("Deseja imprimir?");if (r==true){window.open("../html/reportTur.php?id='.$id.'", "_blank");window.location= "../html/main.php";}else{window.location= "../html/main.php";}</script>';

 ?>