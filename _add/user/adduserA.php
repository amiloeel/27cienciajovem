<?php
	//session_start();
	include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
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

			<?php
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
			<section >
				<h1>Cadastro de Usuários</h1>
				<hr><br><br>

				<form method="post" action="processaUser.php">
				
					<div align="center">
					<b>Tipo de Usuário:</b><br><br>
					<input type="radio" id="ava" name="tipo" value="ava" required>
					<label for="ava"  style="margin-right: 30px">AVALIADOR</label>
					<input type="radio" id="aux" name="tipo" value="aux" required>
					<label for="aux" style="margin-right: 30px">AUXILIAR</label>
					
					<input type="radio" id="coord" name="tipo" value="coord" required>
					<label for="coord">COORDENADOR</label></div>
					<br><br>


					<b>Nome Completo:</b><br>
					<input type="text" name="nome" class="campo" maxlength="100" required><br>
					
					<b>E-mail:</b><br>
					<input type="email" name="email" class="campo" maxlength="50" required><br>
					<br><br><hr><br><br>
<div align=center>
					<b>Login de Usuário:</b><br>
					<input type="text" name="login" class="campo3" maxlength="30" style="text-align: center"required><br>

					<b>Senha Provisória:</b><br>
					<input type="text" name="senha" class="campo3" maxlength="32" style="text-align: center" required><br>
					
						<h4>Lembre-se de anotar a senha para repassar ao usuário!<br>Ela será modificada no momento do login.</h4><br><br>
					
					<input type ="submit" value="SALVAR" class="btn" style="background-color: green;">
					<input type ="reset" value="LIMPAR TUDO" class="btn"></div><br><br>

				</form>

							</section>
		</div>
	</body>
</html>
