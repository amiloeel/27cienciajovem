<?php

	//session_start();
	include('../../_autentica/x/verifyx.php');
	$tipo= $_SESSION['tipo'];
	$nick = $_SESSION['nick'];
	$pass = $_SESSION['pass'];
	

	include_once("../../_autentica/user/conexaoUser.php");

	$sql;

	if($tipo=="coord"){
		//print $tipo;print $nick;print $pass;
		$sql = "update coord set senha=md5('$pass'), first_time=FALSE where login='$nick'";
	}else if($tipo=="aux"){
		$sql = "update aux set senha=md5('$pass'), first_time=FALSE where login='$nick'";
	}else if($tipo=="ava"){
	    $comp1='o';$comp2='o';$comp3='o';$comp4='o';$comp5='o';
	    $k = $_SESSION['comps'];
	    $q = count($k);
	    
	    if($q>=1){
	        $comp1 = $k[0];
	    }if($q>=2){
	        $comp2 = $k[1];
	    }if($q>=3){
	        $comp3 = $k[2];
	    }if($q>=4){
	        $comp4 = $k[3];
	    }if($q==5){
	        $comp5 = $k[4];
	    }
	    
	    $sql = "update avaliadores set senha=md5('$pass'), first_time=FALSE, comp1='$comp1', comp2='$comp2', comp3='$comp3', comp4='$comp4', comp5='$comp5' where login='$nick'";
	}

$salvar = mysqli_query($conexao3, $sql); 

$registro = "insert into register (fulano, fez) values ('$nick', 'entrou para o clube!')";
$fazRegistro = mysqli_query($conexao3, $registro);

mysqli_close($conexao3);
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
				<h1 style="font-size: 18px"><br>
					Tudo pronto!<br>
					Clique no botão abaixo para realizar o login com sua nova senha
				</h1><br>

				<a href="../_edita/killemall.php"><input type="button" value="ACESSAR O SISTEMA" class="new3" style="background-color:green;width:300px;height:35px;color:white;font-size:medium;"> </a>

				<br><br>


			</section>
		</div>
	</body>
</html>
