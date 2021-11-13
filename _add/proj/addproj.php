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
			<section style="padding-bottom:20px">
				<h1>Cadastro de Projetos</h1>
				<hr><br><br>

				<form method="post" action="processa.php">
				
					<b>Nome do Projeto:</b><br>
					<input type="text" name="proj" class="campo" maxlength="100" required autofocus><br><br>

					<b>O projeto realizou pré-inscrição?</b>
					<select name="pre" id="pre">
						<option value=0>Não</option>
						<option value=1>Sim</option></select><br><br>

					<b>País:</b>
					<input type="text" name="pais" class="campo3" maxlength="20" required><br>

					<b>Estado:</b>
					<input type="text" name="estado" class="campo3" maxlength="20" required><br>
                    <i>Ainda estamos na nossa versão beta, por favor insira o estado por extenso!</i>
					<br><br><br>


					<div align="left">
					<b>Categoria:</b><br><br>
					<input type="radio" id="IP" name="categoria" value="IP" required>
					<label for="IP" style="margin-right: 30px;">Iniciação à Pesquisa</label>
<input type="radio" id="DT" name="categoria" value="DT" required>
					<label for="DT">Desenvolvimento Tecnológico</label><br>

					<input type="radio" id="DC" name="categoria" value="DC" required>
					<label for="DC" style="margin-right: 26px;">Divulgação Científica</label>
					<input type="radio" id="FD" name="categoria" value="FD" required>
					<label for="FD">Talentos Internacionais</label><br>
					<input type="radio" id="IC" name="categoria" value="IC" required>
					<label for="IC" style="margin-right: 31px;">Incentivo à Pesquisa</label><input type="radio" id="ED" name="categoria" value="ED" required>
					<label for="ED">Educação Científica</label><br><br>
					
					<input type="radio" id="WS" name="categoria" value="WS" required>
					<label for="WS" style="margin-right: 31px;color:#2a578b">Workshop Olimpíada Pernambucana de Química  </label>
					
					</div>
					<br><br><hr><br><br>



					<b>Nome da Escola:</b><br>
					<input type="text" name="escola" class="campo" maxlength="100" required><br>
					
					<b>Nome do Professor:</b><br>
					<input type="text" name="prof" class="campo" maxlength="100" required><br>

					<b>Email de contato:</b><br>
					<input type="email" name="email" class="campo" maxlength="50" required><br>
					
					<b>Nome do primeiro aluno:</b><br>
					<input type="text" name="aln1" class="campo" maxlength="100" required><br>
					
					<b>Nome do segundo aluno:</b><br>
					<input type="text" name="aln2" class="campo" maxlength="100" required><br><br>

	

					<div align="center">
					<input type ="submit" value="SALVAR" class="btn" style="background-color: green;">
					<input type ="reset" value="LIMPAR TUDO" class="btn"></div>

				</form>
			</section>
		</div>
	</body>
</html>
