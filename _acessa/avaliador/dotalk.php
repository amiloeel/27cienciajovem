<?php

	include('../../../_autentica/avaliador/verifyava.php');
	include('../../../_autentica/cruza/conexao.php');
    
    $nomeia=$_POST['nome'];
    $text=$_POST['aqui'];
    
    $sql="insert into inbox (name,text) values ('$nomeia','$text')";
    $dosql=mysqli_query($conexao,$sql);
   
	
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
		<style>
		    .big{ width: 2.5em; height: 2.5em; }
		</style>
	</head>
	<body><br><br><br>
		<div class="containernovo">
			<nav class="novonav"><br><img src="../../y.png" style="margin-left:20%;width:500px">
				<br><br>
				<div align="center"><br>
				<h3 style="font-size:30px;margin:10px">Seu comentário foi registrado!!!<br><br>Agradecemos por qualquer opinião que possa ajudar a melhorar cada vez mais nosso ambiente de avaliação!</h3><br>
				
				</div>
				<div align=center>
			<a href="avamain.php"><li style="width: 200px;
	height: 80px;line-height: 80px;background-color: green;color: white;margin-top: 15px;box-sizing: border-box;list-style-type: none;font-size:20px">Ok!</li></a></div><br>
</div>
			</nav>
			
		</div>
		
	</body>
</html>
