
 <?php
session_start();

?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<div class ="w3-container w3-teal">
		<div class="w3-third w3-text-teal">.</div>
		<div class="w3-third"><h2 class="w3-center">Login</h2></div>
		<div class="w3-third w3-text-teal">.</div>
		</div>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<div class="w3-third w3-center w3-text-white" >.</div>
		<div class="w3-third w3-border w3-round-large">
		<form class="w3-center" method="POST" action="valida.php">
			<label>Usuário:</label>
			<input class="w3-panel w3-border w3-round-large" type="text" name="usuario" placeholder="Digite o seu usuário"><br><br>
			
			<label>Senha:</label>
			<input class="w3-panel w3-border w3-round-large" type="password" name="senha" placeholder="Digite a sua senha"><br><br>
			
			<input class="w3-btn w3-teal w3-round-xlarge"type="submit" name="btnLogin" value="Acessar">
			
			<h4>Você ainda não possui uma conta?</h4>
			<a href="cadastrar.php">Crie grátis</a>
		
		</form>
	    </div>
		<div class="w3-third w3-text-white">.</div>
		<br><br><br>

	</body>
</html>