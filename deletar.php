<?php  
if(empty($_GET['id_prof'])) 
{ 
	header('location:index.php?msg=idinvalid');
} 
else 
{
	$id_prof = $_GET['id_prof'];
	include_once 'DAO.php';
	deletar_prof($id_prof);
}
?>