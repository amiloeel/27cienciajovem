<?php

	include('../../../_autentica/avaliador/verifyava.php');
	include('../../../_autentica/cruza/conexao.php');
    
    $code=$_POST['code'];
    $nomeia=$_POST['nome'];
    $proj=$_POST['proj'];
    $primeiro=$_POST['primeira'];
    $segundo=$_POST['segunda'];
    $terceiro=$_POST['terceira'];
    $quarto=$_POST['quarta'];
    $quinto=$_POST['quinta'];

	$sqlres="select avaliador1, avaliador2, avaliador3 from res where id='$code'";
	$vai2=mysqli_query($conexao,$sqlres);
	$res=mysqli_fetch_array($vai2);
	
	$um=$res[0];
    $dois=$res[1];
    $tres=$res[2];
    
    $media=($primeiro+$segundo+$terceiro+$quarto+$quinto)/5;
    //print"$media";
    
    if($um==$nomeia){
        $registrar = "update res set a='$media' where id='$code'";
        $registrar2 = "update projetos set res1='$media' where codigo='$code'";
    }
    if($dois==$nomeia){
        $registrar = "update res set b='$media' where id='$code'";
        $registrar2 = "update projetos set res2='$media' where codigo='$code'";
    }
    if($tres==$nomeia){
        $registrar = "update res set c='$media' where id='$code'";
        $registrar2 = "update projetos set res3='$media' where codigo='$code'";
    }
     $fazregistro = mysqli_query($conexao,$registrar);
     $fazregistro2 = mysqli_query($conexao,$registrar2);
     
     $feedback = "insert into register (fulano,fez,com) values ('$nomeia','AVA RES','$proj')";
     $doFeed = mysqli_query($conexao,$feedback);
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
				<br><br><br><br>
				
				<ul class="menu2" style="background-color:#666;width:800px;margin-left:2%">
					
					<br><b><div align="center" style="font-size:45px">Você concluiu a avaliação do resumo: <?php print"$proj";?></div><br></b>
				
			
					<br>
					
				</ul>
				
				<br>
				<div align="center">
				    
				    
<a href="avamain.php"><li style="width: 200px;
	height: 80px;line-height: 80px;background-color: green;color: white;margin-top: 15px;box-sizing: border-box;list-style-type: none;font-size:40px">OK!</li></a><br>
</div>
			</nav>
			<section class="sec2">
				
	

			</section>
		</div>
	</body>
</html>
