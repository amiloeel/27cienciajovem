<?php
session_start();
include('../../../_autentica/coord/conexaocoord.php');

if(empty($_POST['nick']) || empty($_POST['passw'])){
	header('Location: ../../_acessa/coord/logincoord.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['nick']);
$senha = mysqli_real_escape_string($conexao, $_POST['passw']);

$query = "select login, nome, first_time, x from coord where login='{$usuario}' and senha=md5('{$senha}')";

$queryq = "update coord set y=0 where login='$usuario'";

$registro = "insert into register (fulano, fez) values ('$usuario', 'TRY LOG')";
$fazRegistro = mysqli_query($conexao, $registro);

$result = mysqli_query($conexao, $query);


$linhas = mysqli_affected_rows($conexao);
$dados = mysqli_fetch_array($result);


$nome = $dados[0];
$ft = $dados[2];
$tipo = 'coord';
$x = $dados[3];
$name = $dados[1];



if($linhas == 1){
	if($x){
		header('Location: ../block.php');
		exit();
	}else{
	if($ft==1){
	$_SESSION['tipo'] = $tipo;
	$_SESSION['nick'] = $nome;
	$_SESSION['ft'] = $ft;
	header('Location: ../firsttime.php');
	exit();

	}else{
	$_SESSION['tipo'] = $tipo;
	$_SESSION['nick'] = $nome;
	$_SESSION['ft'] = $ft;
	$_SESSION['nome']=$name;
	$resultq = mysqli_query($conexao, $queryq);
	header('Location: coordmain.php');
	


$registro2 = "insert into register (fulano, fez) values ('$usuario', 'IS LOGGED')";
$fazRegistro = mysqli_query($conexao, $registro2);
	
	
	exit();
	}
	}
}else{
	$query2 = "select y, x from coord where login='{$usuario}'";
		$result2 = mysqli_query($conexao, $query2);
		$linhas2 = mysqli_affected_rows($conexao);
		if($linhas2==1){
			$dados2 = mysqli_fetch_array($result2);

			//se não bloqueado (x=0)
			if(!$dados2[1]){
				//se já tentou 5x
				if($dados2[0]>=4){
					$query4 = "update coord set x=TRUE where login='$usuario'";
					$result4 = mysqli_query($conexao, $query4);	
				}
				$valor = $dados2[0] + 1;
				$query3 = "update coord set y='$valor' where login='$usuario'";
				$result3 = mysqli_query($conexao, $query3);
			}else{
				$_SESSION['nao_autenticado'] = true;
				header('Location: logincoord.php');
				exit();
			}
		}
	$_SESSION['nao_autenticado'] = true;
	header('Location: logincoord.php');
	exit();
}