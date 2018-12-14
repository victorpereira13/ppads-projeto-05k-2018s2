<?php
ob_start();
include_once("conexao.php");

# cadastro de projeto.

$btnCadProjeto = filter_input(INPUT_POST, 'btnCadProjeto', FILTER_SANITIZE_STRING);
	if($btnCadProjeto){
		include_once 'conexao.php';
		
		$dados_projeto = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	    $idusuario = ($_SESSION['id']);        
	    $nomeprojeto = filter_input(INPUT_POST, 'nomeprojeto', FILTER_SANITIZE_STRING);
        $descricaoprojeto = filter_input(INPUT_POST, 'descricaoprojeto', FILTER_SANITIZE_STRING);
        $horasprojeto = filter_input(INPUT_POST, 'horasprojeto', FILTER_SANITIZE_STRING);        
        


        $result_projeto = "INSERT INTO projetos (id_usuario, nome_projeto, status_proj, descricao_projeto, horas_projeto, data_hora_criacao) VALUES ('$idusuario', '$nomeprojeto', 'Pendente','$descricaoprojeto','$horasprojeto', sysdate())";
						

		$resultado_projeto = mysqli_query($conn, $result_projeto);

		if(mysqli_insert_id($conn)){
			$_SESSION['msgcad'] = "Projeto cadastrado com sucesso";
			header("Location:pagina_inicial.php");
		}else{
			#$_SESSION['msg'] = "Erro ao cadastrar o projeto";
		}
	}

#----------------------------------------------------------------------------------------------
#comentarios

$btnComentar = filter_input(INPUT_POST, 'btnComentar', FILTER_SANITIZE_STRING);
	if($btnComentar){
		include_once 'conexao.php';
		$dados_do_comentario = filter_input_array(INPUT_POST, FILTER_DEFAULT);	
        $comentario = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_STRING);
        $id_de_usuario = ($_SESSION['id']);
		$id_do_projeto = filter_input(INPUT_POST, 'id_do_projeto', FILTER_SANITIZE_STRING);
        
        
        $result_comentario = "INSERT INTO comentarios (id_projeto, id_usuario, text_comentario, data_hora) VALUES ('$id_do_projeto','$id_de_usuario','$comentario', sysdate())";

         
		$resultado_do_comentario = mysqli_query($conn, $result_comentario);
		
		if(mysqli_insert_id($conn)){
			$_SESSION['msgcad'] = "Comentado";
			header("Location:pagina_inicial.php");
		}else{
			$_SESSION['msg'] = "Erro ao comentar";
		}
	}

#---------------------------------------------------------------------------------------------------------------------------------------------
#cadastro de atividades

$btnAtividade = filter_input(INPUT_POST, 'btnAtividade', FILTER_SANITIZE_STRING);
	if($btnAtividade){
		include_once 'conexao.php';
		
$id_de_projeto = filter_input(INPUT_POST, 'id_de_projeto', FILTER_SANITIZE_STRING);
$descricaoativ1 = filter_input(INPUT_POST, 'descricaoativ1', FILTER_SANITIZE_STRING);
$idusuario = ($_SESSION['id']); 

$result_atividades1 = "INSERT INTO atividades (id_projeto, id_usuario, descricao_atividade, data_hora_criacao) VALUES ('$id_de_projeto', '$idusuario', '$descricaoativ1', sysdate())";

$resultado_atividades1 = mysqli_query($conn, $result_atividades1);
	}		

#---------------------------------------------------------------------------------------------------------------------------------------------
#cadastro de colaboradores

$btnColab = filter_input(INPUT_POST, 'btnColab', FILTER_SANITIZE_STRING);
	if($btnColab){
		include_once 'conexao.php';
		
$nome_projeto_colab = filter_input(INPUT_POST, 'nome_projeto_colab', FILTER_SANITIZE_STRING);
$user_id_colab = filter_input(INPUT_POST, 'user_id_colab', FILTER_SANITIZE_STRING);
$ativ_id_colab = filter_input(INPUT_POST, 'ativ_id_colab', FILTER_SANITIZE_STRING);


$result_colabs = "INSERT INTO colaboradores (id_projeto, id_atividade, id_colaborador, data_hora) VALUES ('$nome_projeto_colab', '$ativ_id_colab', '$user_id_colab', sysdate())";
$resultado_colabs = mysqli_query($conn, $result_colabs);
	}		
$select_top = "SELECT nome_usuario FROM usuarios INNER JOIN colaboradores ON colaboradores.id_colaborador = usuarios.id_usuario";
#---------------------------------------------------------------------------------------------------------------------------------------------




# editar projeto

$btnAtividade = filter_input(INPUT_POST, 'btnEdit', FILTER_SANITIZE_STRING);
	if($btnAtividade){
		include_once 'conexao.php';

$id_projeto = filter_input(INPUT_POST, '', FILTER_SANITIZE_STRING);		
$nome_projeto = filter_input(INPUT_POST, 'nome_projeto', FILTER_SANITIZE_STRING);
#$descricaoativ1 = filter_input(INPUT_POST, 'descricaoativ1', FILTER_SANITIZE_STRING);

$result_atividades1 = "INSERT INTO atividades (id_projeto, descricao_atividade, data_hora_criacao) VALUES ('$id_de_projeto', '$descricaoativ1', sysdate())";

$resultado_atividades1 = mysqli_query($conn, $result_atividades1);
	}



#---------------------------------------------------------------------------------------------------------------------------------------------

#-- lita de todos os projetos --
$result_projetos = "SELECT b.nome_usuario, a.* FROM projetos a, usuarios b where a.id_usuario = b.id_usuario order by data_hora_criacao desc";
	$resultado_projetos = mysqli_query($conn, $result_projetos);

#-- lista de projetos do usuário que esta logado---
$idusuario = ($_SESSION['id']);
#$resultado_projetos_2 = "SELECT b.nome_usuario, a.* FROM projetos a, usuarios b where a.id_usuario = b.id_usuario and a.id_usuario = '$idusuario' order by data_hora_criacao desc";

$resultado_projetos_2 = "SELECT b.nome_usuario, 
       a.*, 
       c.descricao_atividade,
       d.id_colaborador,
       g.nome_usuario
FROM projetos a
inner join usuarios b on a.id_usuario = b.id_usuario 
left join atividades c on a.id_projeto = c.id_projeto
left join colaboradores d on c.id_atividade = d.id_atividade
left join usuarios g on g.id_usuario = d.id_colaborador
where a.id_usuario = '$idusuario'
order by a.data_hora_criacao desc";
$resultado_projetos_pub = mysqli_query($conn, $resultado_projetos_2);







# editar projetos
$idusuario = ($_SESSION['id']);
$resultado_projetos_edit = "SELECT b.nome_usuario, a.* FROM projetos a, usuarios b where a.id_usuario = b.id_usuario and a.id_usuario = '$idusuario' order by data_hora_criacao desc";
$resultado_projetos_edit = mysqli_query($conn, $resultado_projetos_edit);


#----------------------------------------------------------------------------------------------

#$result_comentarios = "SELECT a.id_projeto, b.nome_usuario, a.text_comentario, a.data_hora FROM comentarios a, usuarios b where a.id_usuario = b.id_usuario order by a.data_hora desc";
$result_comentarios = "SELECT a.id_projeto, c.nome_projeto, b.nome_usuario, a.text_comentario, a.data_hora FROM comentarios a, usuarios b, projetos c where a.id_usuario = b.id_usuario and a.id_projeto = c.id_projeto order by a.data_hora desc";
	$resultado_comentarios = mysqli_query($conn, $result_comentarios);

#----------------------------------------------------------------------------------------------
$result_atividades = "select a.id_projeto, a.nome_projeto, b.descricao_atividade from projetos a, atividades b where a.id_projeto = b.id_projeto";
$resultado_atividades = mysqli_query($conn, $result_atividades);



$id_do_user = ($_SESSION['id']);

$resul_nome = "SELECT id_usuario, nome_usuario FROM usuarios";
$result_nome = mysqli_query($conn, $resul_nome);

$resulnome_proj = "SELECT id_projeto, nome_projeto FROM projetos WHERE id_usuario = '$id_do_user'";
$resultnome_proj = mysqli_query($conn, $resulnome_proj);

$resulproj_colab = "SELECT id_projeto, nome_projeto FROM projetos WHERE id_usuario = '$id_do_user'";
$resultproj_colab = mysqli_query($conn, $resulproj_colab);

$resulproj_edit = "SELECT id_projeto, nome_projeto FROM projetos WHERE id_usuario = '$id_do_user'";
$resultproj_edit = mysqli_query($conn, $resulproj_colab);

$resul_ativ = "SELECT id_atividade, id_projeto, descricao_atividade FROM atividades WHERE id_usuario = '$id_do_user'";
$result_ativ = mysqli_query($conn, $resul_ativ);

$resulproj_coment = "SELECT id_projeto, nome_projeto FROM projetos WHERE id_usuario = '$id_do_user'";
$resultproj_coment = mysqli_query($conn, $resulproj_coment);

#----------------------------------------------------------------------------------------------


$btnUpProj = filter_input(INPUT_POST, 'btnUpProj', FILTER_SANITIZE_STRING);
	if($btnUpProj){
		include_once 'conexao.php';
		
$nome_projeto_edit = filter_input(INPUT_POST, 'nome_projeto_edit', FILTER_SANITIZE_STRING);
$descricaoprojeto = filter_input(INPUT_POST, 'descricaoprojeto', FILTER_SANITIZE_STRING);
$horasprojeto = filter_input(INPUT_POST, 'horasprojeto', FILTER_SANITIZE_STRING);

$up_projeto = "UPDATE projetos SET descricao_projeto='$descricaoprojeto', horas_projeto= '$horasprojeto' WHERE id_projeto='$ide' ";


$up_projeto = mysqli_query($conn, $result_atividades1);
	}		

#----------------------------------------------------------------------------------------------
#$lista_colab = "SELECT nome_usuarios FROM usuarios";
#$result_colab = mysqli_query($conn, $lista_colab);


?>
