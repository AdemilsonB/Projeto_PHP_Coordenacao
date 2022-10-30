<?php 
	include_once 'lock.php'; 
	include_once 'DAO.php'; 

	if(empty($_GET['id_prof'])) 
	{
		header('location:index.php?msg=idvalid'); //id invalido
	}
	else
	{
		$id_prof = $_GET['id_prof'];

		$prof = select_prof($id_prof);//chama função no DAO.php

		if(empty($prof))
		{
			header('location:index.php?msg=erroselect'); //edição não realizada 
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Coordenação - Editar</title>
</head>
<body class="container-fluid">

	<h1>Coordenação - Editar</h1>

	<p>
		<?php 
			include_once 'menu.php'; 
		?>
	</p>

	<h3>Editar Professor:</h3>

	<form action="editar.php" method="post">
		<p>
			<label>Nome do Professor:</label><br>
			<input type="text" name="nome_prof" maxlength="100" 
			value="<?php echo $prof['nome_prof']; ?>">
		</p>
		<p>
			<label>Cargo</label>
			<br>
				<i>
					<?php 
						echo "Disciplina: ". $prof['disciplina_prof']; 
					?>
				</i>
			<br>
				<select name="disciplina_prof">
				<option value="Banco_de_Dados" 
					<?php 
						if($prof['disciplina_prof'] == 'Banco_de_Dados') 
						{
							echo "selected";
						}
					?>>Banco de Dados
				</option>

				<option value="Algoritmos_de_Programacao"  
					<?php 
						if($prof['disciplina_prof'] == 'Algoritmos_de_Programacao') 
						{
							echo "selected"; 
						}
					?>>Algoritmos de Programação
				</option>

				<option value="Sistemas_Operacionais" 
					<?php 
						if($prof['disciplina_prof'] == 'Sistemas_Operacionais') 
						{
							echo "selected"; 
						}
					?>>Sistemas Operacionais
				</option>

				<option value="Desenvolvimento_em_PHP" 
					<?php 
						if($prof['disciplina_prof'] == 'Desenvolvimento_em_PHP') 
						{
							echo "selected"; 
						}
					?>>Desenvolvimento em PHP
				</option>

				<option value="Desenvolvimento_em_Java" 
					<?php 
						if($prof['disciplina_prof'] == 'Desenvolvimento_em_Java') 
						{
							echo "selected"; 
						}
					?>>Desenvolvimento em Java
				</option>

				<option value="Redes" 
					<?php 
						if($prof['disciplina_prof'] == 'Redes') 
						{
							echo "selected"; 
						}
						?>>Redes
				</option>
				<option value="Desenvolvimento_Gerencial" 
					<?php 
						if($prof['disciplina_prof'] == 'Desenvolvimento_Gerencial') 
						{
							echo "selected"; 
						}
						?>>Desenvolvimento Gerencial
				</option>
			</select>
		</p>
		<p>
			<label>Email do Professor:</label><br>
			<input type="email_prof" name="email_prof" maxlength="100" 
			value="<?php echo $prof['email_prof']; ?>">
		</p>

		<input type="hidden" name="id_prof" value="<?php echo $prof['id_prof']; ?>">
		<button type="submit" name="editar" class="btn btn-warning">Editar</button>
	</form>
	

	<?php  
		if(isset($_POST['editar']))
		{
			if(empty($_POST['nome_prof']) || empty($_POST['disciplina_prof']) || empty($_POST['email_prof']))
			{
				header('location:index.php?msg=erroselect');
			}
			else
			{
				$prof['id_prof'] = $_POST['id_prof'];
				$prof['nome_prof']    = $_POST['nome_prof'];
				$prof['disciplina_prof']   = $_POST['disciplina_prof'];
				$prof['email_prof']   = $_POST['email_prof'];

				editar_prof($prof);
			}
		}
	?>
</body>
</html>
