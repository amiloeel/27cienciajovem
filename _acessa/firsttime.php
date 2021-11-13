<?php

	include('../../_autentica/x/verifyx.php');
	$tipo= $_SESSION['tipo'];
	$nick = $_SESSION['nick'];
	$ft = $_SESSION['ft'];
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../_css/estilo.css">
	</head>
	<body>
		<div class="container" align="center">
			
			<section class="dois">
				<h1 style="color:darkred">Primeiro Acesso</h1>
				<hr>
				<h1 style="font-size: 18px">Seja bem vind@ <?php echo $_SESSION['nick'];?><br><br>
					Para acessar o sistema é necessário 

criar uma nova senha para o seu login.
				</h1>
				<br>
<hr><br><form method="post" action="firsttimex.php">

	<input type="hidden" name="nick2" value="$nick">
	<input type="hidden" name="ft" value="$ft">
	<h1 style="font-size: 18px; color: darkred;float: center;margin-right: 

none;" >Nova senha:</h1><input type="password" name="newpss" class="campo3" 

maxlength="32" style="text-align: center;" required><br>

<h1 style="font-size: 18px; color: darkred;float: center;margin-right: none;" 

>Repetir nova senha:</h1><input type="password" name="newpss2" class="campo3" 

maxlength="32" style="text-align: center;" required><br><br>

<?php
    
    if($tipo=="ava"){
       print' <h1 style="font-size: 18px; color: darkred;float: 

center;margin-right: none;" >Escolha abaixo de 1 a 5 áreas de conhecimento 

<br> com as quais você se identifica:</h1>

<div>
    <input type="checkbox" id="pedagogia" name="comp[]" value="pedagogia" 

checked>
    <label for="pedagogia" style="font-size:18px;margin-

right:5px">Pedagogia</label>
  
    <input type="checkbox" id="artes" name="comp[]" value="artes">
    <label for="artes" style="font-size:18px;margin-right:5px">Artes</label>
    
    <input type="checkbox" id="matematica" name="comp[]" value="matematica">
    <label for="matematica" style="font-size:18px;margin-

right:5px">Matemática</label>
    <input type="checkbox" id="linguagem" name="comp[]" value="linguagem">
    <label for="linguagem" style="font-size:18px;margin-

right:5px">Linguagem</label>
    <input type="checkbox" id="fisica" name="comp[]" value="fisica">
    <label for="fisica" style="font-size:18px;margin-right:5px">Física</label>
    <input type="checkbox" id="quimica" name="comp[]" value="quimica">
    <label for="quimica" style="font-size:18px;margin-

right:5px">Química</label><br><br>
    <input type="checkbox" id="sociologia" name="comp[]" value="sociologia">
    <label for="sociologia" style="font-size:18px;margin-

right:5px">Sociologia</label>
    <input type="checkbox" id="geografia" name="comp[]" value="geografia">
    <label for="geografia" style="font-size:18px;margin-

right:5px">Geografia</label>
    <input type="checkbox" id="historia" name="comp[]" value="historia">
    <label for="historia" style="font-size:18px;margin-

right:5px">História</label>
    <input type="checkbox" id="tecnologia" name="comp[]" value="tecnologia">
    <label for="tecnologia" style="font-size:18px;margin-

right:5px">Tecnologia</label>
    <input type="checkbox" id="biologia" name="comp[]" value="biologia">
    <label for="biologia" style="font-size:18px;margin-

right:5px">Biologia</label>
    <input type="checkbox" id="astronomia" name="comp[]" value="astronomia">
    <label for="astronomia" style="font-size:18px;margin-

right:5px">Astronomia</label>
    
  </div><br><br>';
    }
?>

<br>



<input type ="submit" value="SALVAR" class="btn" style="background-color: 

green; width: 150px;font-size: 15px;"><br><br> 


</form>


			</section>
		</div>
	</body>
</html>
