<?php
session_start();
ob_start();

$btnCadProjeto = filter_input(INPUT_POST, 'btnCadProjeto', FILTER_SANITIZE_STRING);
	if($btnCadProjeto){
		include_once 'conexao.php';
		$dados_projeto = filter_input_array(INPUT_POST, FILTER_DEFAULT);	
		/*$result_projeto = "INSERT INTO projetos (nomeprojeto, descricao, horas) VALUES (
						'" .$dados_projeto['nomeprojeto']. "',
						'" .$dados_projeto['descricaoprojeto']. "',
						'" .$dados_projeto['horasprojeto']. "',
						)";*/
        $nomeprojeto = filter_input(INPUT_POST, 'nomeprojeto', FILTER_SANITIZE_STRING);
        $descricaoprojeto = filter_input(INPUT_POST, 'descricaoprojeto', FILTER_SANITIZE_STRING);
        $horasprojeto = filter_input(INPUT_POST, 'horasprojeto', FILTER_SANITIZE_STRING);
        



        $result_projeto = "INSERT INTO projetos (nomeprojeto, descricao, horas) VALUES ('$nomeprojeto','$descricaoprojeto','$horasprojeto')";
						

		$resultado_projeto = mysqli_query($conn, $result_projeto);
		
		if(mysqli_insert_id($conn)){
			$_SESSION['msgcad'] = "Projeto cadastrado com sucesso";
			header("Location: cadastro_projeto.php");
		}else{
			$_SESSION['msg'] = "Erro ao cadastrar o projeto";
		}
	}
	


?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>projetos</title>
	</head>
	<body>
		<div class="w3-container w3-teal w3-third">
		<h4>
			<?php
			if(!empty($_SESSION['id'])){
 	        echo "Logado como: ".$_SESSION['nome']."<br>";
            }else{
	        $_SESSION['msg'] = "Área restrita";
	        header("Location: login.php");	
            }
            ?>
        </h4>
		</div>


		<div class ="w3-container w3-teal w3-third">
		<h4 class="w3-text-teal">Oooooooo</h4>
		</div>
		

		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			if(isset($_SESSION['msgcad'])){
				echo $_SESSION['msgcad'];
				unset($_SESSION['msgcad']);
			}
		?>
		
		<div class="w3-container w3-teal w3-third"><h4 class="w3-right-align"> <?php echo "<a href='sair.php'>Sair</a>"; ?></h4></div>

	
<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-border w3-margin-top w3-teal">Cadatrar projetos.</button>	
        <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Novo Projeto</h2>
      </header>
      <div class="w3-container">
       <form method="POST" action="cadastro_projeto">
			<label>Nome do Projeto:</label>
			<input class="w3-panel w3-border w3-round-large" type="text" name="nomeprojeto" placeholder="Digite o nome do projeto"><br><br>
			
			<label>Descrição:</label><br>
			<textarea charset="utf-8" type="text" name="descricaoprojeto" class="msg" cols="35" rows="8" placeholder="Descricao"></textarea><br>
			
			
			<label>Duração(Quantidade de horas estimadas):<label>
			<input class="w3-panel w3-border w3-round-large" type="number" name="horasprojeto" placeholder="Número de horas estimadas"><br>
			<br>
			<input class="w3-btn w3-teal w3-round-xlarge" type="submit" name="btnCadProjeto">
		
		</form>
      </div>
      <footer class="w3-container w3-teal">
        <p>inc©</p>
      </footer>
    </div>
  </div>		



		<br><br><br>

	</body>
</html>
