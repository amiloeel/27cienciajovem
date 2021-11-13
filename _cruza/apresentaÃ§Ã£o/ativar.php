<?php

include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
	
	include_once("../../../_autentica/cruza/conexao.php");
	
	$id = $_POST['codego'];
	$atv = $_POST['atv'];
	$origem = $_POST['origem'];
	$nome = $_POST['nome'];
	$usuario = $_SESSION['nick'];
	
	if($atv==0){
	    $sql = "update apr set fim=1 where id='$id'";
	    $registro = "insert into register (fulano, fez, com) values ('$usuario', 'APR ON', '$nome')";
	}else{
	    $sql = "update apr set fim=0 where id='$id'";
	    $registro = "insert into register (fulano, fez, com) values ('$usuario', 'APR OFF', '$nome')";
	}
		$fazRegistro = mysqli_query($conexao, $registro);
	
	$go = mysqli_query($conexao, $sql);
	
	if($origem=='base'){
	    header('Location: cruzaapr.php');
	}else if($origem=='detalhe'){
	    $_SESSION['codex'] = $id;
	    header('Location: detalheapr.php');
	}else if($origem=='IP'){
	    header('Location: IP.php');
	}else if($origem=='FD'){
	    header('Location: FD.php');
	}else if($origem=='IC'){
	    header('Location: IC.php');
	}else if($origem=='DT'){
	    header('Location: DT.php');
	}else if($origem=='DC'){
	    header('Location: DC.php');
	}else if($origem=='ED'){
	    header('Location: ED.php');
	}
	
	mysqli_close($conexao);
	
?>