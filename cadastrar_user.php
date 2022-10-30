<?php include_once 'DAO.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css.css"> <!-- css local -->

	<title>Coordenação - Cadastro de Coordenador</title>
</head>
<body class="container-fluid">

	<h1>Coordenação - Novo Coordenador</h1>

	<h6>Já possi cadastro? Clique <a href="login.php">aqui</a> para entrar</h6>

	<p><h3>Novo Coordenador:</h3></p>

	<form action="cadastrar_user.php" method="post">
		<p>
			<label class="font2">Nome:</label><br>
			<input type="text" name="nome_coordenador" maxlength="100" placeholder="Nome" class="button button_color">
		</p>
		<p>
			<label class="font2">E-mail:</label><br>
			<input type="text" name="email_coordenador" maxlength="100" placeholder="abc12@gmail.com" class="button button_color">
		</p>
		<p>
			<label class="font2">Senha:</label><br>
			<input type="text" name="senha" maxlength="11" placeholder="*******" class="button button_color">
		</p>
		<button type="submit" name="cadastrar" class="btn btn-Secondary btn btn-info">Cadastrar</button>
	</form>
	

	<?php   
		if(isset($_POST['cadastrar']))
		{
			if(empty($_POST['nome_coordenador'])  || empty($_POST['email_coordenador']) || empty($_POST['senha']))
			{
				echo '<h3 class="alert alert-danger">Atenção: preencha todos os campos!</h3>';
			}
			else
			{
				$coordenador['nome_coordenador']     = $_POST['nome_coordenador'];
				$coordenador['email_coordenador'] 	 = $_POST['email_coordenador'];
				$coordenador['senha']                = $_POST['senha'];

				cadastrar_coordenador($coordenador);
			}
		}
	?>

</body>
</html>