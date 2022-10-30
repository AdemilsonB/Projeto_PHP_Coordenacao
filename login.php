<?php 
	include_once 'func.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css.css"> <!-- css local -->

	<title>Coordernação - Login</title>
</head>
<body class="container-fluid"> <!-- estilo da pagina -->

	<?php 
		verificar_msg(); 
	?>

	<h2 class="font4 font3">Entrar no Sistema</h2>

	<form action="validacao.php" method="post">
		
		<p>
			<label class="font2">Nome de Coordenador:</label><br>
			<input type="text" name="nome_coordenador" maxlength="100" placeholder="Nome" class="button button_color">
		</p>

		<p>
			<label class="font2">Senha:</label><br>
			<input type="text" name="senha" maxlength="11" placeholder="******" class="button button_color">
		</p>

		<p>
			<button type="submit" class="btn btn-info">Entrar</button> | <a href="cadastrar_user.php">Cadastre-se</a>
		</p>

	</form>

</body>
</html>