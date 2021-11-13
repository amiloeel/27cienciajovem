<?php include('../../_autentica/x/verifyx.php');
	$tipo= $_SESSION['tipo'];
	$um = $_POST['newpss'];
	$dois = $_POST['newpss2'];
	$nick = $_SESSION['nick'];
	$ft = $_SESSION['ft'];
	$x = 0;
	
	if($tipo=="ava"){
	   $comps = $_POST['comp'];
	    $y = count($comps);
	   $z=0; $k=[]; $q=0;
	   while($z<$y){
	       if($comps[$z]){
	           if($q<5){
	               $k[$q] = $comps[$z];
	               $q++;
	           }
	       }$z++;
	   }
	   
	   if(($um!=$dois) || (mb_strlen($um)<5)){
	    $x = 1;
	}else{
	    $_SESSION['tipo'] = $tipo;
		$_SESSION['nick'] = $nick;
		$_SESSION['pass'] = $dois;
		$_SESSION['ft'] = $ft;
		$_SESSION['comps'] = $k;
		header('Location: firsttimey.php');
	}
	}
	
	else{

    

        if(($um!=$dois) || (mb_strlen($um)<5)){
	    $x = 1;
	}else{
	    $_SESSION['tipo'] = $tipo;
		$_SESSION['nick'] = $nick;
		$_SESSION['pass'] = $dois;
		$_SESSION['ft'] = $ft;
		header('Location: firsttimey.php');
	}}
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
				<hr><?php
					if($x){
						print '<br><b><h2 style="color:red">Atenção, erro detectado.<br><br>Você precisa:<br><br>Escolher uma senha de pelo menos 5 caracteres<br>Repetir a mesma senha nova em ambos os campos<br><br><br>

						<input type="button" onclick="history.back();" value="VOLTAR" class="new3" style="background-color:red;alignment:left;width:300px;height:35px;color:white;font-size:medium;font-weight:bold"> ';
					}
						?></section>
		</div>
	</body>
</html>
