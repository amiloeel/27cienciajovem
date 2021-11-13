<?php
session_start();
include('../../../_autentica/s/conexaos.php');

if(empty($_POST['nick']) || empty($_POST['passw'])){
	header('Location: loginsuper.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['nick']);
$senha = mysqli_real_escape_string($conexao, $_POST['passw']);

$query = "select login, nome from super where login='{$usuario}' and senha=md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$linhas = mysqli_affected_rows($conexao);
$dados = mysqli_fetch_array($result);
$nome = $dados[1];
$tipo = 'super';


if($linhas == 1){
	$_SESSION['tipo'] = $tipo;
	$_SESSION['nick'] = $nome;
	$_SESSION['ft'] = FALSE;
	header('Location: supermain.php');
	exit();
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: loginsuper.php');
	exit();
}