<?php
	//session_start();
	include('../../../_autentica/s/verifys.php');
	//echo $_SESSION['tipo'];
	include_once("../../_add/proj/conexao.php");
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
	</head>
	<body>
		<div class="container">
			<nav><br><a href="supermain.php"><img src="../../X.png" style="margin-left: 12px;"></a>
				<br><br>
<a href="../../_edita/killemall.php"><li style="width: 260px;
	height: 50px;line-height: 50px;background-color: #e34f4f;color: white;margin-top: 5px;box-sizing: border-box;padding-left: 10px;text-align:center;margin-left: 10px;list-style-type: none;">Encerrar Sessão</li></a><br>

				<ul class="menu">
					
					<br><b>CADASTRO</b><br><br>
					<a href="../../_add/proj/addproj.php"><li>Projeto</li></a>
					<a href="../../_add/user/adduserA.php"><li>Usuário</li></a><br>
				</ul>
				<ul class="menu">
					<br><b>CONSULTAS</b><br><br>
					<a href="../../_visualiza/proj/consulta.php"><li>Projetos</li></a>
					<a href="../../_visualiza/user/consultaUser.php" disabled><li>Usuários</li></a><br>	

				</ul>
			</nav>
			<section>
				<h1>SEJA VEM VIND@ <?php echo $_SESSION['nick'];?></h1>
				<hr><br>
	

			</section>
		</div>
	</body>
</html>
