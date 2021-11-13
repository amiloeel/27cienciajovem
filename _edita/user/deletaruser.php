<?php 
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];

include_once("../../../_autentica/user/conexaoUser.php");
include_once("../../../_autentica/cruza/conexao.php");

$codigo = $_POST['code'];
$z=$_POST['z'];

if($z=='coo'){
	$sql = "delete from coord where id='$codigo'";
	$salvar = mysqli_query($conexao3, $sql);
}else if($z=='ava'){
	$presql = "select nome from avaliadores where id='$codigo'";
	$save = mysqli_query($conexao3,$presql);
	$result = mysqli_fetch_array($save);
	$nome = $result[0];
	//print $nome;
	$sql = "delete from avaliadores where id='$codigo'";
	$sql2 = "update res set avaliador1='x' where avaliador1='$nome'";
	$sql21 = "update res set avaliador2='x' where avaliador2='$nome'";
	$sql22 = "update res set avaliador3='x' where avaliador3='$nome'";
	$sql2x = "update apr set avaliador1='x' where avaliador1='$nome'";
	$sql21x = "update apr set avaliador2='x' where avaliador2='$nome'";
	$sql22x = "update apr set avaliador3='x' where avaliador3='$nome'";
	$save2 = mysqli_query($conexao3,$sql);
	$save3 = mysqli_query($conexao,$sql2);
	$save31 = mysqli_query($conexao,$sql21);
	$save32 = mysqli_query($conexao,$sql22);
	$new=mysqli_query($conexao,$sql2x);
	$new2=mysqli_query($conexao,$sql21x);
	$new3=mysqli_query($conexao,$sql22x);
	
}else if($z=='aux'){
	$sql = "delete from aux where id='$codigo'";
	$salvar = mysqli_query($conexao3, $sql);
}

$usuario = $_SESSION['nick'];

$registro = "insert into register (fulano, fez, com) values ('$usuario', 'KILLED', '$nome')";
$fazRegistro = mysqli_query($conexao, $registro);


mysqli_close($conexao3);
mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
	</head>
	<body><div class="container"><?php
	
			if($type == "super"){
				print '<nav><br><a href="../../_acessa/s/supermain.php"><img src="../../X.png" style="margin-left: 12px;"></a> 
				<br><br>';
				
			}else if($type == "coord"){
				print '<nav><br><a href="../../_acessa/coord/coordmain.php"><img src="../../y2.png" style="margin-left: 12px;"></a> 
				<br><br>';
			}
			?>

				<ul class="menu">
					
					<br><b>CADASTRO</b><img src="../../_acessa/coord/icons/a.png" style="margin-left:45px;margin-right:-80px;margin-bottom:-4px"><br><br>
					<a href="../../_add/proj/addproj.php"><li>Projeto</li></a>
					<a href="../../_add/user/adduserA.php"><li>Usuário</li></a><br>
				</ul>
				<ul class="menu">
					<br><b>CONSULTAS</b><img src="../../_acessa/coord/icons/b.png" style="margin-left:45px;margin-right:-80px;margin-bottom:-4px"><br><br>
					<a href="../../_visualiza/proj/consulta.php"><li>Projetos</li></a>
					<a href="../../_visualiza/user/consultaUser.php" disabled><li>Usuários</li></a><br>	

				</ul>
				<ul class="menu">
					<br><b>LINKS</b><img src="../../_acessa/coord/icons/c.png" style="margin-left:65px;margin-right:-100px;margin-bottom:-4px"><br><br>
					<a href="../../_links/resumo/linkres.php"><li>Resumo</li></a>
					<a href="../../_links/apresentação/linkapr.php" disabled><li>Apresentação</li></a><br>	

				</ul>
				<ul class="menu">
					<br><b>AVALIAÇÕES</b><img src="../../_acessa/coord/icons/d.png" style="margin-left:45px;margin-right:-70px;margin-bottom:-4px"><br><br>
					<a href="../../_cruza/resumo/cruzares.php"><li>Resumo</li></a>
					<a href="../../_cruza/apresentação/cruzaapr.php" disabled><li>Apresentação</li></a><br>	

				</ul>
				
				<ul class="menu" style="background-color:#2a578b;border-style: solid;border-color:#333">
				    <br><b>RESULTADOS</b><img src="../../_acessa/coord/icons/e.png" style="margin-left:45px;margin-right:-70px;margin-bottom:-5px"><br><br>
				<a href="../../_acessa/coord/parciais.php"><li style="background-color: #333;width:254px">Parciais</li></a>
				<a href="../../_acessa/coord/gerais.php"><li style="background-color: #333;width:254px">Gerais</li></a><br>
	            </ul>
	
	<a href="../../_edita/killemall.php"><li style="width: 260px;
	height: 50px;line-height: 50px;background-color: #e34f4f;color: white;margin-top: 5px;box-sizing: border-box;padding-left: 10px;text-align:center;margin-left: 10px;list-style-type: none;">Encerrar Sessão</li></a><br>
			</nav>
			<section>
				<h1>Confirmação de Exclusão</h1>
				<hr>
				<br>
				<h2 style="text-align: center; color: darkred;">O usuário foi excluído.</h2><br>
				<a href="../../_visualiza/user/consultaUser.php"><input type="button" value="Voltar" class="btn" style="margin-left: 32%; width: 300px;"></a><br><br>
			</section>
			
		</div>
	</body>	
</html>
