<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnCadProjeto', FILTER_SANITIZE_STRING);
if($btnLogin){
	$nomeprojeto = filter_input(INPUT_POST, 'nomeprojeto', FILTER_SANITIZE_STRING);
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	$horas = filter_input(INPUT_POST, 'horas', FILTER_SANITIZE_NUMBER_INT);
	
	//echo "$usuario - $senha";
	if((!empty($nomeprojeto)) AND (!empty(descricao)) AND (!empty($horas))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_projeto = "SELECT idprojeto, nomeprojeto, descricao, horas FROM projetos WHERE nomeprojeto='$nomeprojeto' LIMIT 1";
		$resultado_projeto = mysqli_query($conn, $result_projeto);
		if($resultado_projeto){
			$row_nomeprojeto = mysqli_fetch_assoc($resultado_nomeprojeto);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				header("Location: cadastro_projeto.php");
			}else{
				$_SESSION['msg'] = "Informações inválidas1";
				header("Location: cadastro_projeto.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Informações inválidas2";
		header("Location: cadastro_projeto.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: cadastro_projeto.php");
}
