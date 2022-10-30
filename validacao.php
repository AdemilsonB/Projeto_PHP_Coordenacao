

<?php
	if (empty($_POST['nome_coordenador']) || empty($_POST['senha'])) //verificação
	{
		echo "preencha todos os dados!"; //msgm de erro por conta de campos em vazio
	}
	else 
	{
		// armazena os dados do form em variáveis locais
		$nome_coordenador = $_POST['nome_coordenador'];
		$senha            = $_POST['senha'];

		include_once 'conn.php';

		$inf = "SELECT * FROM coordenador_tb WHERE nome_coordenador LIKE '$nome_coordenador' AND senha LIKE '$senha'";

		$informacoes = mysqli_query($conn, $inf); //guarda as informações

		if(mysqli_affected_rows($conn) > 0) //verificação de linhas afetadas
		{
			$login = mysqli_fetch_assoc($informacoes); //array associativo

			session_start();
	 
			$_SESSION['id_coordenador']    = $login['id_coordenador'];
			$_SESSION['nome_coordenador']  = $login['nome_coordenador'];
			$_SESSION['email_coordenador'] = $login['email_coordenador'];
			$_SESSION['senha']	           = $login['senha'];

			header('location:index.php'); //redireciona para a pagina index automaticamente
		}
		else 
		{
			header('location:login.php?msg=invalid'); //nome ou senha errado
		}
	}
?>




