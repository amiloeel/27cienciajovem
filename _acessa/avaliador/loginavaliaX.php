<?php
session_start();
include('../../../_autentica/avaliador/conexaoava.php');

if(empty($_POST['nick']) || empty($_POST['passw'])){
	header('Location: ../../_acessa/avaliador/loginavalia.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao666, $_POST['nick']);
$senha = mysqli_real_escape_string($conexao666, $_POST['passw']);

$query = "select login, nome, first_time, x from avaliadores where login='{$usuario}' and senha=md5('{$senha}')";

$queryq = "update avaliadores set y=0 where login='$usuario'";

$result = mysqli_query($conexao666, $query);


$linhas = mysqli_affected_rows($conexao666);
$dados = mysqli_fetch_array($result);


$nome = $dados[0];
$ft = $dados[2];
$tipo = 'ava';
$x = $dados[3];

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
	$resultq = mysqli_query($conexao666, $queryq);
	header('Location: avamain.php');
	exit();
	}
	}
}else{
	$query2 = "select y, x from avaliadores where login='{$usuario}'";
		$result2 = mysqli_query($conexao666, $query2);
		$linhas2 = mysqli_affected_rows($conexao666);
		if($linhas2==1){
			$dados2 = mysqli_fetch_array($result2);

			//se não bloqueado (x=0)
			if(!$dados2[1]){
				//se já tentou 5x
				if($dados2[0]>=4){
					$query4 = "update avaliadores set x=TRUE where login='$usuario'";
					$result4 = mysqli_query($conexao666, $query4);	
				}
				$valor = $dados2[0] + 1;
				$query3 = "update avaliadores set y='$valor' where login='$usuario'";
				$result3 = mysqli_query($conexao666, $query3);
			}else{
				$_SESSION['nao_autenticado'] = true;
				header('Location: loginavalia.php');
				exit();
			}
		}
	$_SESSION['nao_autenticado'] = true;
	header('Location: loginavalia.php');
	exit();
}