<?php  

function verificar_msg()
{
	if (!empty($_GET['msg']))
	{
		$msg = $_GET['msg'];
		if ($msg == 'eptfields')
		{
			$texto = "Atenção: Preencha todos os campos!";
		}
		else if ($msg == 'invalid') 
		{
			$texto = "Atenção: Coordenador ou senha inválidos!";
		}
		else if ($msg == 'notlog')
		{
			$texto = "Atenção: informe os dados de login para acessar a página!";
		}
		else if ($msg == 'cadok')
		{
			$texto = "Professor cadastrado com sucesso!";
		}
		else if ($msg == 'caderro')
		{
			$texto = "Erro ao cadastrar professor. Tente novamente!";
		}
		else if ($msg == 'caduserok')
		{
			$texto = "Coordenador cadastrado com sucesso. Utilie o form abaixo para logar:";
		}
		else if ($msg == 'cadusererro')
		{
			$texto = "Erro ao cadastrar Coordenador. Tente novamente!";
		}
		else if ($msg == 'delok')
		{
			$texto = "Professor excluído com sucesso!";
		}
		else if ($msg == 'delerro')
		{
			$texto = "Erro ao excluir Professor da Lista. Tente novamente!";
		}
		else if ($msg == 'idvalid')
		{
			$texto = "Edição com Sucesso!";
		}
		else if ($msg == 'erroselect')
		{
			$texto = "Não foi possível realizar a ação. Tente novamente!";
		}
		else if ($msg == 'edtok')
		{
			$texto = "Dados do Professor editados com Sucesso!";
		}
		else if ($msg == 'edterro')
		{
			$texto = "Erro ao editar os dados do Professor. Tente novamente!";
		}

		echo '<p><h3 class="alert alert-success" role="alert">'.$texto.'<h3></p>';
	}
}

?>