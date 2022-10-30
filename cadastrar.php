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


	<title>Coordenação - Cadastro</title>
</head>
<body class="container-fluid">

	<h1>Coordenação - Cadastro</h1>

	<p>
		<?php 
			include_once 'menu.php'; 
		?>
	</p>

	<h3>Novo Professor:</h3>

	<form action="cadastrar.php" method="post">
		<p>
			<label class="font2">Nome do Professor:</label><br>
			<input type="text" name="nome_prof" maxlength="100" class="button button_color" placeholder="Nome">
		</p>
		<p>
			<label class="font2">Disciplina:</label><br>
			<select name="disciplina_prof" class="button button_color">
				<option value="Banco_de_Dados">Banco de Dados</option>
				<option value="Algoritmos_de_Programacao">Algoritmos de Programação</option>
				<option value="Sistemas_Operacionais">Sistemas Operacionais</option>
				<option value="Desenvolvimento_em_PHP">Desenvolvimento em PHP</option>
				<option value="Desenvolvimento_em_Java">Desenvolvimento em Java</option>
				<option value="Redes">Redes</option>
				<option value="Desenvolvimento_Gerencial">Desenvolvimento Gerencial</option>
			</select>
		</p>
		<p>
			<label class="font2">Email do Professor:</label><br>
			<input type="text" name="email_prof" maxlength="100" class="button button_color" placeholder="abc@gmail.com">
		</p>

		<button type="submit" name="cadastrar" class="btn btn-info">Cadastrar</button>
	</form>
	

	<?php  

	if(isset($_POST['cadastrar']))
	{
		if(empty($_POST['nome_prof']) || empty($_POST['disciplina_prof']) || empty($_POST['email_prof']))
		{
			echo '<h3 class="alert alert-danger">Atenção: preencha todos os campos!</h3>';
		}
		else
		{
			$prof['nome_prof']  	 = $_POST['nome_prof'];
			$prof['disciplina_prof'] 	 = $_POST['disciplina_prof'];
			$prof['email_prof'] 	 = $_POST['email_prof'];
			$prof['id_coordenador'] = $_SESSION['id_coordenador'];

			cadastrar_prof($prof);
		}
	}
	?>

</body>
</html>