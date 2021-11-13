<?php
	//session_start();
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
	$code = $_POST['code'];
	$ava = $_POST['ava'];
	$idava = $_POST['idava'];
	$usuario = $_SESSION['nick'];
	$proj = $_POST['nome'];
	$avaliador = $_POST['avaliador'];

include_once("../../../_autentica/cruza/conexao.php");

include_once("../../../_autentica/user/conexaoUser.php");

$sql = "select nome from avaliadores where id='$idava'";
$salvar = mysqli_query($conexao3, $sql); 
$nome = mysqli_fetch_array($salvar);
$name = $nome[0];


$slq2;

if($ava=='1'){
	$sql2 = "update apr set avaliador1='$name' where id='$code'";
}else if($ava=='2'){
	$sql2 = "update apr set avaliador2='$name' where id='$code'";
}else{
	$sql2 = "update apr set avaliador3='$name' where id='$code'";
}

$registro = "insert into register (fulano, fez, com, etb) values ('$usuario', 'APR ASSIGN', '$avaliador', '$proj')";

$fazRegistro = mysqli_query($conexao, $registro);

$salvar2 = mysqli_query($conexao,$sql2);

mysqli_close($conexao);
mysqli_close($conexao3);
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
		<style>
			section.nova {
				width: 870px;
				height: auto;
				margin-left: 20px;
				float: left;
				background-color: #fff;
				box-sizing: border-box;
				padding-left: 30px;
				margin-bottom: 30px;
			}
			input.new{
				width: 500px;
				height: 25px;
				margin-left: 15px;
				margin-right: 15px;
			}
			div.nueva input{
				width: 250px;
			}
			input.new2{
				width: 100px;
	height: 30px;
	border: 1px solid #ddd;
	background-color: #666;
	color: #fff;
	cursor: pointer;
	float: left;
	margin-bottom: 5px;
	margin-left: 267px;


	
			}
		</style>
	</head>
	<body>
		<div class="container"><?php
	
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
			<section class="nova">
				<h1 style="color:#297c5f">Confirmação de Atribuição - Apresentação</h1>
				<hr><br>

				<h2 style="color: green;">Avaliador atribuído!</h2>

				<?php 
				echo '<div align="center"><form method="post" action="detalheapr.php">
<input type="hidden" name="code" value="'.$code.'"> 
<input type="submit" value="Retornar" class="btn">
</form></div><br><br>';
?>
			</section>
		</div>
	</body>
</html>

