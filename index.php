<?php 
	include_once 'lock.php'; 
	include_once 'DAO.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="css.css"> <!-- css local -->


	<title class="font4 font3">Coordenação - Home</title>
</head>
<body class="container-fluid .bg-info">

	<h1 class="font4 font3">Coordenação - Home</h1>

	<h6>Bem-vindo, <?php echo $_SESSION['nome_coordenador']; ?></h6> <!-- nome do coordenador logado -->

	<p>
		<?php 
			include_once 'menu.php'; 
			include_once 'func.php';
		?>
	</p>

	<?php 
		verificar_msg();
		listar_prof(); 
	?>

</body>
</html>