<?php 
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];

include_once("../../../_autentica/proj/conexao.php");

$code = $_POST['code'];

$sql = "select * from projetos where codigo='$code'";
$consulta = mysqli_query($conexao2, $sql);

mysqli_close($conexao2);
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
	margin-left: 700px;
			}input.new3{
				width: 100px;
				height: 30px;
				border: 1px solid #ddd;
				background-color: green;
				color: #fff;
				cursor: pointer;
				margin-left: 20px;
				align-items: center;
			}
		</style>
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
			<section class="nova">
				<h1>Editar Projeto</h1>
				<hr><br><br>

				<?php
					$Colorx = "gray";
					$Colory="#2a578b";	
					$mensagem;

					$exibirRegistros = mysqli_fetch_array($consulta);
					$codigo = $exibirRegistros[0];
					$proj = $exibirRegistros[1];
					$cat = $exibirRegistros[2];
					$escola = $exibirRegistros[3];
					$prof = $exibirRegistros[4];
					$aln1 = $exibirRegistros[5];
					$aln2 = $exibirRegistros[6];
					$email = $exibirRegistros[16];
					$pre = $exibirRegistros[17];
					$pais = $exibirRegistros[18];
					$estado = $exibirRegistros[19];


						print "<article>";


						
						print'<i>ID #'.$codigo.'</i>';

						print'<form method="post" action="editarProj.php">';
						print'<br><b>Nome do Projeto:</b><br>
					<input type="text" name="proj" class="campo" maxlength="100" value="'.$proj.'" required><br>

					<b>O projeto realizou pré-inscrição?</b> 
					<select name="pre" id="pre">';
						if($pre){
								print '<option value=1>Sim</option>';
								print '<option value=0>Não</option></select><br><br>';
							}else{
								print '<option value=0>Não</option>';
								print '<option value=1>Sim</option></select><br><br>';
							}

						print '<b>País:</b>
					<input type="text" name="pais" class="campo3" maxlength="20" value='.$pais.' required><br>

					<b>Estado:</b>
					<input type="text" name="estado" class="campo3" maxlength="20" value='.$estado.' required><br><br>';

					print'<b>Categoria: </b><br><br>';  
?><?php

					if($cat=="IP"){
						print'<input type="radio" id="IP" name="categoria" value="IP" checked required>
													<label for="IP">Iniciação à Pesquisa</label><br>
													<input type="radio" id="DC" name="categoria" value="DC" required>
													<label for="DC">Divulgação Científica</label>
													<br>
													<input type="radio" id="IC" name="categoria" value="IC" required>
													<label for="IC">Incentivo à Pesquisa</label>
													<br>
													<input type="radio" id="DT" name="categoria" value="DT" required>
													<label for="DT">Desenvolvimento Tecnológico</label>
													<br>
													<input type="radio" id="FD" name="categoria" value="FD" required>
													<label for="FD">Talentos Internacionais</label>
													<br>
													<input type="radio" id="ED" name="categoria" value="ED" required>
													<label for="ED">Educação Científica</label>';


					}else if($cat=="IC"){
						print'<input type="radio" id="IP" name="categoria" value="IP"  required>
													<label for="IP">Iniciação à Pesquisa</label><br>
													<input type="radio" id="DC" name="categoria" value="DC" required>
													<label for="DC">Divulgação Científica</label>
													<br>
													<input type="radio" id="IC" name="categoria" value="IC" checked required>
													<label for="IC">Incentivo à Pesquisa</label>
													<br>
													<input type="radio" id="DT" name="categoria" value="DT" required>
													<label for="DT">Desenvolvimento Tecnológico</label>
													<br>
													<input type="radio" id="FD" name="categoria" value="FD" required>
													<label for="FD">Talentos Internacionais</label>
													<br>
													<input type="radio" id="ED" name="categoria" value="ED" required>
													<label for="ED">Educação Científica</label>';


					}else if($cat=="DT"){
						print'<input type="radio" id="IP" name="categoria" value="IP"  required>
													<label for="IP">Iniciação à Pesquisa</label><br>
													<input type="radio" id="DC" name="categoria" value="DC" required>
													<label for="DC">Divulgação Científica</label>
													<br>
													<input type="radio" id="IC" name="categoria" value="IC"  required>
													<label for="IC">Incentivo à Pesquisa</label>
													<br>
													<input type="radio" id="DT" name="categoria" value="DT" checked required>
													<label for="DT">Desenvolvimento Tecnológico</label>
													<br>
													<input type="radio" id="FD" name="categoria" value="FD" required>
													<label for="FD">Talentos Internacionais</label>
													<br>
													<input type="radio" id="ED" name="categoria" value="ED" required>
													<label for="ED">Educação Científica</label>';

					}else if($cat=="DC"){
						print'<input type="radio" id="IP" name="categoria" value="IP"  required>
													<label for="IP">Iniciação à Pesquisa</label><br>
													<input type="radio" id="DC" name="categoria" value="DC" checked required>
													<label for="DC">Divulgação Científica</label>
													<br>
													<input type="radio" id="IC" name="categoria" value="IC" required>
													<label for="IC">Incentivo à Pesquisa</label>
													<br>
													<input type="radio" id="DT" name="categoria" value="DT" required>
													<label for="DT">Desenvolvimento Tecnológico</label>
													<br>
													<input type="radio" id="FD" name="categoria" value="FD" required>
													<label for="FD">Talentos Internacionais</label>
													<br>
													<input type="radio" id="ED" name="categoria" value="ED" required>
													<label for="ED">Educação Científica</label>';

					}else if($cat=="ED"){
						print'<input type="radio" id="IP" name="categoria" value="IP"  required>
													<label for="IP">Iniciação à Pesquisa</label><br>
													<input type="radio" id="DC" name="categoria" value="DC" required>
													<label for="DC">Divulgação Científica</label>
													<br>
													<input type="radio" id="IC" name="categoria" value="IC" required>
													<label for="IC">Incentivo à Pesquisa</label>
													<br>
													<input type="radio" id="DT" name="categoria" value="DT" required>
													<label for="DT">Desenvolvimento Tecnológico</label>
													<br>
													<input type="radio" id="FD" name="categoria" value="FD" required>
													<label for="FD">Talentos Internacionais</label>
													<br>
													<input type="radio" id="ED" name="categoria" value="ED" checked required>
													<label for="ED">Educação Científica</label>';

					}else if($cat=="FD"){
						print'<input type="radio" id="IP" name="categoria" value="IP"  required>
													<label for="IP">Iniciação à Pesquisa</label><br>
													<input type="radio" id="DC" name="categoria" value="DC" required>
													<label for="DC">Divulgação Científica</label>
													<br>
													<input type="radio" id="IC" name="categoria" value="IC" required>
													<label for="IC">Incentivo à Pesquisa</label>
													<br>
													<input type="radio" id="DT" name="categoria" value="DT" required>
													<label for="DT">Desenvolvimento Tecnológico</label>
													<br>
													<input type="radio" id="FD" name="categoria" value="FD" checked required>
													<label for="FD">Talentos Internacionais</label>
													<br>
													<input type="radio" id="ED" name="categoria" value="ED" required>
													<label for="ED">Educação Científica</label>';

					}
					?><?php
													
					print'<br><br><br><hr><br><br>
					<b>Nome da Escola:</b><br>
					<input type="text" name="escola" class="campo" maxlength="100" value="'.$escola.'" required><br>
					<b>Nome do Professor:</b><br>
					<input type="text" name="prof" class="campo" maxlength="100" value="'.$prof.'" required><br>
					<b>Email de contato:</b><br>
					<input type="email" name="email" class="campo" maxlength="50" value="'.$email.'" required><br>
					<b>Nome do primeiro aluno:</b><br>
					<input type="text" name="aln1" class="campo" maxlength="100" value="'.$aln1.'" required><br>
					<b>Nome do segundo aluno:</b><br>
					<input type="text" name="aln2" class="campo" maxlength="100" value="'.$aln2.'" required><br>

					<label for="arq"><br><b>Arquivo do projeto:</b></label>
  					<input type="file" id="arq" name="myfile"><br><br><br>';

							print'<input type="hidden" name="code" value="'.$codigo.'">';
							echo'<div class = "nueva" align="center">
							<input type="button" onclick="history.back();" value="CANCELAR" class="new3" style="background-color:red;alignment:left;">
							<input type="submit" name="go" value="SALVAR" class="new3"> </div><br></form>';

							print'<form method="post" action="delproj.php">';
							print'<input type="hidden" name="code" value="'.$codigo.'">';
							print'<br><br><input type="submit" value="Excluir Projeto" style="color:#2a578b; margin-left:335px; background-color: #white; border-style: none; width:150px; height:20px; margin-top:0px;"></form>';
						


						print"</article>";
					


				
				?>

			</section>
			
		</div>
	</body>	
</html>