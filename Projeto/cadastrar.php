<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	
	$erro = false;
	
	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	
	if(in_array('',$dados)){
		$erro = true;
		$_SESSION['msg'] = "Necessário preencher todos os campos";
	}elseif((strlen($dados['senha'])) < 6){
		$erro = true;
		$_SESSION['msg'] = "A senha deve ter no minímo 6 caracteres";
	}elseif(stristr($dados['senha'], "'")) {
		$erro = true;
		$_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";
	}else{
		$result_usuario = "SELECT id FROM usuarios WHERE usuario='". $dados['usuario'] ."'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este usuário já está sendo utilizado";
		}
		
		$result_usuario = "SELECT id FROM usuarios WHERE email='". $dados['email'] ."'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este e-mail já está cadastrado";
		}
	}
	
	
	//var_dump($dados);
	if(!$erro){
		//var_dump($dados);
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		
		$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
						'" .$dados['nome']. "',
						'" .$dados['email']. "',
						'" .$dados['usuario']. "',
						'" .$dados['senha']. "'
						)";
		$resultado_usario = mysqli_query($conn, $result_usuario);
		if(mysqli_insert_id($conn)){
			$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
			header("Location: login.php");
		}else{
			$_SESSION['msg'] = "Erro ao cadastrar o usuário";
		}
	}
	
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro</title>
	</head>
	<body>
		<div class="w3-container w3-brown">
		<div class="w3-third w3-text-brown">.</div>
		<div class="w3-third"><h2 class="w3-center">Cadastro</h2></div>
		<div class="w3-third w3-text-brown">.</div>
		</div>
		<br>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<div class="w3-third w3-center w3-text-white" >.</div>
		<div class="w3-third w3-border w3-round-large">
		<form method="POST" action="">
			<label>Nome</label>
			<input class="w3-panel w3-border w3-round-large" type="text" name="nome" placeholder="Digite o seu nome"><br><br>
			
			<label>E-mail</label>
			<input class="w3-panel w3-border w3-round-large" type="text" name="email" placeholder="Digite o seu e-mail"><br><br>
			
			<label>Usuário</label>
			<input class="w3-panel w3-border w3-round-large" type="text" name="usuario" placeholder="Digite o usuário"><br><br>
			
			<label>Senha</label>
			<input class="w3-panel w3-border w3-round-large" type="password" name="senha" placeholder="Digite a senha"><br><br>
			
			<input class="w3-btn w3-brown w3-round-xlarge" type="submit" name="btnCadUsuario" value="Cadastrar"><br><br>
			
			Lembrou? <a href="login.php">Clique aqui</a> para logar
		
		</form>
        </div>
		<div class="w3-third w3-text-white">.</div>
	</body>
</html>