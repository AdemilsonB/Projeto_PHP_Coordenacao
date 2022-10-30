<?php  
include_once 'conn.php';

function cadastrar_prof($prof)
{
	global $conn;

	$nome_prof       = $prof['nome_prof'];
	$disciplina_prof = $prof['disciplina_prof'];
	$email_prof      = $prof['email_prof'];
	$id_coordenador  = $prof['id_coordenador'];

	$inf = "INSERT INTO professor_tb (nome_prof, disciplina_prof, email_prof, id_coordenador) 
			VALUES ('$nome_prof', '$disciplina_prof', '$email_prof', $id_coordenador)";

	$result = mysqli_query($conn, $inf);

	if(mysqli_affected_rows($conn) > 0)
	{
		echo "professor cadastrado com sucesso!";
	}
	else
	{
		header('location:index.php?msg=caderro');
	}
}

function listar_prof()
{
	global $conn;

	$nome_coordenador = $_SESSION['nome_coordenador'];

	if($nome_coordenador == 'admin')
	{
		$inf = "SELECT 
					    professor_tb.id_prof, 
					    professor_tb.nome_prof, 
					    professor_tb.disciplina_prof,
					    professor_tb.email_prof, 
					    coordenador_tb.nome_coordenador
		FROM professor_tb 
		INNER JOIN coordenador_tb ON professor_tb.id_coordenador = coordenador_tb.id_coordenador";
	}
	else
	{
		$id_coordenador = $_SESSION['id_coordenador'];
		$inf = "SELECT 
						nome_prof, 
						disciplina_prof, 
						email_prof,
						id_coordenador
				FROM professor_tb 
				WHERE id_coordenador = $id_coordenador";
	}
	

	$result = mysqli_query($conn, $inf);

	if(mysqli_affected_rows($conn) > 0)
	{

		echo "<h2>Professores Cadastrados</h2>";
		echo '<table class="table table-hover table table-striped table-dark">';
		echo '<tr>';
		echo '<th>id_prof</th>';
		echo '<th>nome</th>';
		echo '<th><img src="imagens/disciplina.png" width="22px" heigh="22px">  disciplina</th>';
		echo '<th><img src="imagens/email.png" width="15px" heigh="15px">  email</th>';
		if ($nome_coordenador == 'admin') 
		{ 
			echo '<th>Cadastrado por</th>'; 
		}
		echo '<th colspan="2">Ações</th>';
		echo '</tr>';


		while ($registro = mysqli_fetch_assoc($result)) 
		{
			echo '<tr>';
			foreach ($registro as $key => $value) 
			{
				if($key == 'id_prof') { $id_prof = $value; }

				
				echo '<td>'. $value . '</td>';
			}
			echo '<td>
					<a href="editar.php?id_prof='.$id_prof.'" class="btn btn-info">
						<img src="imagens/lapis.png" width="15px" height="15px"> Editar
					</a>
				  </td>';

			echo '<td>
					<a href="deletar.php?id_prof='.$id_prof.'" class="btn btn-info" 
					onclick="return confirm(\'Deseja excluir este funcionário?\')">
						<img src="imagens/trash.png" width="15px" heigh="15px"> Deletar
					</a>
				  </td>';

			echo '</tr>';
		}
		echo '</table>';
	}
	else
	{
		echo '<h2>Não há professores cadastrados</h2>';
	}
}

function cadastrar_coordenador($coordenador)
{
	global $conn;

	$dados = "('" .  $coordenador['nome_coordenador']  . "',  " .
		  	  " '" . $coordenador['email_coordenador'] . "', "  .
		  	  " '" . $coordenador['senha'] ."')";

	$inf = "INSERT INTO coordenador_tb (nome_coordenador, email_coordenador, senha) VALUES " . $dados;

	$result = mysqli_query($conn, $inf);

	if(mysqli_affected_rows($conn) > 0)
	{
		echo "Coordenador cadastrado com sucesso. Utilize o formulario em sua conta:";
	}
	else
	{
		echo "Erro ao cadastrar o Coordenador";
	}
}

function deletar_prof($id_prof)
{
	global $conn;

	$inf = "DELETE FROM professor_tb WHERE id_prof = $id_prof";

	$result = mysqli_query($conn, $inf);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:index.php?msg=delok');
	}
	else
	{
		header('location:index.php?msg=delerro');
	}
}

function select_prof($id_prof) //select_func($id_func)
{
	global $conn;

	$inf = "SELECT * FROM professor_tb WHERE id_prof = $id_prof";

	$result = mysqli_query($conn, $inf);

	if(mysqli_affected_rows($conn) > 0)
	{
		$prof = mysqli_fetch_assoc($result);
		return $prof;
	}

	return '';
}

function editar_prof($prof)
{
	global $conn;

	$values = "id_prof  = '" .$prof['id_prof'] ."', " .
			  "nome_prof  = '" .$prof['nome_prof'] ."', " .
			  "disciplina_prof = '" .$prof['disciplina_prof']."', " .
			  "email_prof = '" .$prof['email_prof']."'";

	$inf = "UPDATE professor_tb SET $values WHERE id_prof = " . $prof['id_prof'];

	$result = mysqli_query($conn, $inf);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:index.php?msg=edtok');
	}
	else
	{
		header('location:index.php?msg=edterro');
	}
}

?>


