<?php 
	
$id = $_POST['id_just'];

	echo '<script> r=confirm("Deseja imprimir?");if (r==true){window.open("../html/reportJust.php?id='.$id.'", "_blank");window.location= "../html/main.php";}else{window.location= "../html/main.php";}</script>';

 ?>