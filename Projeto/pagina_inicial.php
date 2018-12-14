<?php
session_start();
ob_start();
include_once("conexao.php");
include_once("codigo.php");

?>
<!DOCTYPE html>
<html>
<title>Página inicial</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu inicio -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide">
      <b>
            <?php
            if(!empty($_SESSION['id'])){
            echo $_SESSION['nome'];
            }else{
            $_SESSION['msg'] = "Área restrita";
            header("Location: index.php");  
            }
            ?>      
      </b><br>
      <b>
            <?php
            if(!empty($_SESSION['id'])){
            echo "ID: ".$_SESSION['id']. " ";
            }else{
            $_SESSION['msg'] = "Área restrita";
            header("Location: index.php");  
            }
            ?>
      </b>
    </h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Projetos <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#projetos" class="w3-bar-item w3-button">Lista de projetos</a>      
      <a href="#cadastro_projeto" class="w3-bar-item w3-button">Cadastrar novo projeto</a>
      <a href="#cadastro_atividade" class="w3-bar-item w3-button">Adicionar atividades a um projeto</a>
      <a href="#cadastro_colab" class="w3-bar-item w3-button">Adicionar colaboradores a um projeto</a>
      <a href="#todos_projetos" class="w3-bar-item w3-button">Todos os Projetos</a>
      <a href="#projetoedit" class="w3-bar-item w3-button">Editar informações do projeto</a>
    </div>
    <a href="#comentar" class="w3-bar-item w3-button">Comentar um projeto</a>
    <a href="#comentarios" class="w3-bar-item w3-button">Comentários</a>
  </div>
</nav>
<!-- Sidebar/menu fim -->


<!-- Top menu -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">.</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- efeitos  -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left">
    <!-- colocar alguma coisa -->
    </p>
    <p class="w3-right">
      <div><h4 class="w3-right-align"> <?php echo "<a href='sair.php'>Sair</a>"; ?></h4></div>
    </p>

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
  </header>

<!-- Lista Projeto usuário -->

  <div id="projetos" class="w3-row w3-grayscale">
    <h2 style="text-shadow: 1px 1px 1px black;">Meus Projetos</h2>
      <div class="row">
        <div class="col-md-12">
            <div class="w3-container">
          <table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
            <thead>
              <tr class="w3-teal">
                <th>ID do projeto</th>
                <th>Nome do criador</th>
                <th>Nome do projeto</th>
                <th>Descrição</th>
                <th>Horas</th>
                <th>Data de criação</th>
                <th>Colaboradores</th>
                <th>Atividades</th>
                <!--<th>Colaborador</th>-->
                <th>Nome Colaborador</th>
              </tr>
            </thead>
            <tbody>
              <?php while($rows_proj_pub = mysqli_fetch_assoc($resultado_projetos_pub)){ ?>
                <tr>
                  <td><?php echo $rows_proj_pub['id_projeto']; ?></td>
                  <td><?php echo $rows_proj_pub['nome_usuario']; ?></td>
                  <td><?php echo $rows_proj_pub['nome_projeto']; ?></td>
                  <td><?php echo $rows_proj_pub['descricao_projeto']; ?></td>
                  <td><?php echo $rows_proj_pub['horas_projeto']; ?></td>
                  <td><?php echo $rows_proj_pub['data_hora_criacao']; ?></td>
                  <td><?php echo $rows_proj_pub['nome_usuario']; ?></td>                  
                  <td><?php echo $rows_proj_pub['descricao_atividade']; ?></td>
                  <!--<td><?php echo $rows_proj_pub['id_colaborador']; ?></td>-->
                  <td><?php echo $rows_proj_pub['nome_usuario']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
           </table>
           </div>
        </div>
      </div>    
    </div>
<br><br>

<!-- Cadastro de projeto -->
<div id="cadastro_projeto" class="w3-container w3-black w3-padding-32">
<div class="w3-container">
      <!-- <p style="text-shadow: 1px 1px 1px black;">Cadastrar Projetos</p> -->
      <h1>Cadastrar Projetos</h1>
</div>
<form method="POST" action="pagina_inicial.php">
<input class="w3-panel w3-border w3-round-large" type="text" name="nomeprojeto" placeholder="Digite o nome do projeto"><br><br>

<label>ID de Usuário:</label>
<?php
if(!empty($_SESSION['id'])){
echo " ".$_SESSION['id']."<br>";
}else{
$_SESSION['msg'] = "x";
header("Location: index.php");  
}
?>


<label>Descrição:</label><br>
<textarea charset="utf-8" type="text" name="descricaoprojeto" class="msg" cols="35" rows="8" placeholder="Descrição"></textarea><br>
            
<label>Duração(Quantidade de horas estimadas):<label>
<input class="w3-panel w3-border w3-round-large" type="number" name="horasprojeto" placeholder="Número de horas estimadas"><br>
<br>

<input href="#cadastro_atividade" class="w3-btn w3-red w3-round-xlarge w3-border" type="submit" name="btnCadProjeto"><br><br>

</form>
</div>
<br><br>
<!-- Cadastrar atividades -->

<div id="cadastro_atividade" class="w3-container w3-black w3-padding-32">
<div class="w3-container">
      <!-- <p style="text-shadow: 1px 1px 1px black;">Cadastrar Projetos</p> -->
      <h1>Atividades</h1>
</div>
<form method="POST" action="pagina_inicial.php">
<label>Descrição da atividades:</label><br>
<textarea charset="utf-8" type="text" name="descricaoativ1" class="msg" cols="35" rows="8" placeholder="Descrição"></textarea><br>
<label>Selecione o projeto:</label><br>
  <select name="id_de_projeto">
    <?php while($resulnome_proj = mysqli_fetch_array($resultnome_proj)){ ?>
    <option value="<?php echo$resulnome_proj['id_projeto'];?>"><?php echo $resulnome_proj['nome_projeto'];?></option>
    <?php } ?>
    
</select>
<br>
<br>

<input class="w3-btn w3-red w3-round-xlarge w3-border" type="submit" name="btnAtividade"><br><br>
</form>
</div>
<br><br>

<!-- Cadastro de colaboradores -->

<div id="cadastro_colab" class="w3-container w3-black w3-padding-32">
<div class="w3-container">
      <h1>Colaboradores</h1>
</div>
<form method="POST" action="pagina_inicial.php">
<!--    
<label> Selecione o projeto:</label><br>

    <select name="nome_projeto_colab">
    <?php while($resulproj_colab = mysqli_fetch_array($resultproj_colab)){ ?>
    <option value="<?php echo $resulproj_colab['id_projeto'];?>"><?php echo $resulproj_colab['nome_projeto'];?></option>
    <?php } ?>
    </select> -->


<label> Selecione o usuário:</label><br>

<select name="user_id_colab">
    <?php while($resul_nome = mysqli_fetch_array($result_nome)){ ?>
    <option value="<?php echo $resul_nome['id_usuario'];?>"><?php echo $resul_nome['nome_usuario'];?></option>
    <?php } ?>
</select>
<br>
<br>

<label> Selecione a Atividade:</label><br>

<select name="ativ_id_colab">
    <?php while($resul_ativ = mysqli_fetch_array($result_ativ)){ ?>
    <option value="<?php echo $resul_ativ['id_atividade'];?>"><p>ID do Projeto:</p><?php echo $resul_ativ['id_projeto'];?><p>- Descr Ativ:</p><?php echo $resul_ativ['descricao_atividade'];?></option>
    <?php } ?>
</select>
<br>
<br>

<input class="w3-btn w3-red w3-round-xlarge w3-border" type="submit" name="btnColab"><br><br>
</form>
</div>
<br><br>

<!-- Lista de Projetos Publicos -->

  <div id="todos_projetos" class="w3-row w3-grayscale">
    <h2 style="text-shadow: 1px 1px 1px black;">Todos os Projetos</h2>
      <div class="row">
        <div class="col-md-12">
            <div class="w3-container">
          <table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
            <thead>
              <tr class="w3-teal">
                <th>ID do projeto</th>
                <th>Status</th>
                <th>Nome do criador</th>
                <th>Nome do projeto</th>
                <th>Descrição</th>
                <th>Horas</th>
                <th>Data de criação</th>
                <!-- <th>+</th> -->
              </tr>
            </thead>
            <tbody>
              <?php while($rows_projetos = mysqli_fetch_assoc($resultado_projetos)){ ?>
                <tr>
                  <td><?php echo $rows_projetos['id_projeto']; ?></td>
                  <td><?php echo $rows_projetos['status_proj']; ?></td>
                  <td><?php echo $rows_projetos['nome_usuario']; ?></td>
                  <td><?php echo $rows_projetos['nome_projeto']; ?></td>
                  <td><?php echo $rows_projetos['descricao_projeto']; ?></td>
                  <td><?php echo $rows_projetos['horas_projeto']; ?></td>
                  <td><?php echo $rows_projetos['data_hora_criacao']; ?></td>
<!--                  <td>
                  
                  
 <div class = "w3-container">
    <button onclick="document.getElementById('ativ').style.display='block'" class="w3-button w3-teal w3-round-xlarge w3-border">Mais informações</button>
    <div id="ativ" class="w3-modal">
        <div class="w3-modal-content w3-animate-left">
            <header class="w3-container w3-teal">
                <span onclick="document.getElementById('ativ').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                

      <h2>Atividades</h2>
      </header>
      <div class="row">
        <div class="col-md-12">
            <div class="w3-container">
          <table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
            <thead class="w3-dark-grey">
              <tr>
                <th>ID Projeto</th>
                <th>Nome Projeto</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <?php while($rows_atividades = mysqli_fetch_assoc($resultado_atividades)){ ?>
                <tr>
                    
                  <td><?php echo $rows_atividades['id_projeto']; ?></td>
                  <td><?php echo $rows_atividades['nome_projeto']; ?></td>
                  <td><?php echo $rows_atividades['descricao_atividade']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
           </table>
        </div>
      </div>
      </div>
    </div>
</div>
</div>                      
                      
                  </td> -->
                </tr>
              <?php } ?>
            </tbody>
           </table>
           </div>
        </div>
      </div>    

    </div>
<br><br>
<!-- Editar informações de um projeto -->

<div id="projetoedit" class="w3-container w3-black w3-padding-32">
<div class="w3-container">
      <!-- <p style="text-shadow: 1px 1px 1px black;">Cadastrar Projetos</p> -->
      <h1>Editar Meus Projetos</h1>
</div>
<form method="POST" action="pagina_inicial.php">
<label> Selecione o projeto:</label><br>

    <select name="nome_projeto_edit">
    <?php while($resulproj_edit = mysqli_fetch_array($resultproj_edit)){ ?>
    <option value="<?php echo $resulproj_edit['id_projeto'];?>"><?php echo $resulproj_edit['nome_projeto'];?></option>
    <?php } ?>
    </select><br><br>

<label>ID de Usuário:</label>
<?php
if(!empty($_SESSION['id'])){
echo " ".$_SESSION['id']."<br>";
}else{
$_SESSION['msg'] = "x";
header("Location: index.php");  
}
?>


<label>Descrição:</label><br>
<textarea charset="utf-8" type="text" name="descricaoprojeto" class="msg" cols="35" rows="8" placeholder="Descrição"></textarea><br>
            
<label>Duração(Quantidade de horas estimadas):<label>
<input class="w3-panel w3-border w3-round-large" type="number" name="horasprojeto" placeholder="Número de horas estimadas"><br>
<br>

<input href="#proj_edit" class="w3-btn w3-red w3-round-xlarge w3-border" type="submit" name="btnUpProjeto"><br><br>

</form>
</div>
<br><br>

<!-- ANTIGO

  <div id="projetoedit" class="w3-row w3-grayscale">
    <h2 style="text-shadow: 1px 1px 1px black;">Editar Meus Projetos</h2>
      <div class="row">
        <div class="col-md-12">
            <div class="w3-container">
          <table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
            <thead>
              <tr class="w3-teal">
                <th>IDD do projeto</th>
                <th>Status</th>
                <th>Nome do criador</th>
                <th>Nome do projeto</th>
                <th>Descrição</th>
                <th>Horas</th>
                <th>Data de criação</th>
              </tr>
            </thead>
            <tbody>
              <?php while($rows_proj_pub = mysqli_fetch_assoc($resultado_projetos_pub)){ ?>
                <tr>
                  <td><?php echo $rows_proj_pub['id_projeto']; ?></td>
                  <td><?php echo $rows_proj_pub['status_proj']; ?></td>
                  <td><?php echo $rows_proj_pub['nome_usuario']; ?></td>
                  <td><?php echo $rows_proj_pub['nome_projeto']; ?></td>
                  <td><?php echo $rows_proj_pub['descricao_projeto']; ?></td>
                  <td><?php echo $rows_proj_pub['horas_projeto']; ?></td>
                  <td><?php echo $rows_proj_pub['data_hora_criacao']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
           </table>
           </div>
        </div>
      </div>    
    </div>
<br><br>
FIM ANTIGO -->

  <!-- Comentários -->
  <div id="comentar" class="w3-container w3-black w3-padding-32">
    <h1>Comentar um projeto</h1>
    <!--<label>Insira o ID do Projeto:</label>-->
<form method="POST" action="pagina_inicial.php">
    <!--<p><input class="w3-panel w3-border w3-round-large" type="text" name="id_do_projeto" placeholder="ID do projeto"></p>-->
    
    <label> Selecione o projeto:</label><br>

    <select name="id_do_projeto">
    <?php while($resulproj_coment = mysqli_fetch_array($resultproj_coment)){ ?>
    <option value="<?php echo $resulproj_coment['id_projeto'];?>"><?php echo $resulproj_coment['nome_projeto'];?></option>
    <?php } ?>
    </select>
    <br>
    <br>

    <textarea class="w3-round-large" charset="utf-8" type="text" name="comentario" class="msg" cols="93" rows="4" placeholder="Comentário"></textarea><br>

    <input class="w3-btn w3-red w3-round-xlarge w3-border" type="submit" name="btnComentar">
</form>
  </div>

  <!-- Footer -->
  <footer id="comentarios" class="w3-padding-64 w3-center">
    <div class="w3-row-padding">
        <h4>Comentários</h4>

<div class="row">
<div class="col-md-12">
<div class="w3-container">
<table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
  <thead class="w3-teal">
    <tr>
      <th>ID Projeto</th>
      <th>Nome Projeto</th>
      <th>Usuario</th>
      <th>Comentário</th>
      <th>Data Hora do Comentário</th>
    </tr>
  </thead>
  <tbody>
    <?php while($rows_comentarios = mysqli_fetch_assoc($resultado_comentarios)){ ?>
    <tr>
      <td><?php echo $rows_comentarios['id_projeto']; ?></td>
      <td><?php echo $rows_comentarios['nome_projeto']; ?></td>      
      <td><?php echo $rows_comentarios['nome_usuario']; ?></td>
      <td><?php echo $rows_comentarios['text_comentario']; ?></td>
      <td><?php echo $rows_comentarios['data_hora']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</div>
</div>

    </div>
  </footer>

  <!-- fim da página -->
</div>

<!-- teste inicio -->

<!-- teste fim -->

<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
