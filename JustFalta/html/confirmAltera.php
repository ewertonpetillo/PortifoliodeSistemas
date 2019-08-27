<?php 
	
$id = $_POST['id_just'];
$operacao = $_POST['btAltera'];

if($operacao == 'delete'){

	echo '<script> r=confirm("Deseja excluir?");if (r==true){window.location= "../html/exclusao.php?id='.$id.'";}else{window.location= "../html/main.php";}</script>';

}else{

	header('Location: ../html/editJust.php?id='.$id); 
}

	

 ?>