<?php 
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];

include_once("../../../_autentica/proj/conexao.php");
$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$counter = 0;
$sql = "select * from projetos where proj like '%$filtro%' or escola like '%$filtro%' or prof like '%$filtro%' or aln1 like '%$filtro%' or aln2 like '%$filtro%' and cat='DT' order by proj";
$consulta = mysqli_query($conexao2, $sql);
$consulta2 = mysqli_query($conexao2, $sql);
$registros = mysqli_num_rows($consulta);

while($percorre = mysqli_fetch_array($consulta2)){
	$cat = $percorre[2];
	if($cat=='DT'){
		$counter++;
	}	
}
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
				margin-bottom: 50px;
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
			.btnSelect{
			width: 100px;
			height: 30px;
			border: 1px solid #ddd;
			background-color: green;
			color: #fff;
			cursor: pointer;
}input.new2{
				
				width: 100px;
	height: 30px;
	border: 1px solid #ddd;
	background-color: #666;
	color: #fff;
	cursor: pointer;
	float: left;
	margin-bottom: 5px;
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
				<h1>Desenvolvimento Tecnológico</h1>
				<hr><br><br>

				

					<div class = "nueva" align="center">
					<a href="IP.php"><input type="button" value=" IP - Iniciação à Pesquisa " class="btn"></a>
					<a href="IC.php"><input type="button" value=" IC - Incentivo à Pesquisa" class="btn"></a>
					<a href="DC.php"><input type="button" value=" DC - Divulgação Científica" class="btn"></a><br>
					<a href="FD.php"><input type="button" value=" FD - Talentos Internacionais" class="btn"></a>
					<a href="DT.php"><input type="button" value=" DT - Desenvolvimento Tecnológico" class="btnSelect" style="background-color: darkmagenta;"></a>
					<a href="ED.php"><input type="button" value=" ED - Educação Científica" class="btn"></a>
					<a href="WS.php"><input type="button" value=" WS - Workshop de Química" class="btn"></a><br><br><br>
					</div>
<form method="get" action="">

				    <b>Pesquisa em DT:</b><input type="text" name="filtro" class="new" autofocus required>
					<input type="submit" value="Pesquisar" class="btn"><br>	</form><br>

				<?php

					$Colorx = "gray";
					$ColorSelect = "darkmagenta";
					if($filtro!=""){
					print "Resultado da pesquisa com a palavra '<strong>$filtro</strong>':<br><br>";
}

					print "<i><b>$counter</b> registros encontrados<br></i>	";
					print "<br><br>";


					while($exibirRegistros = mysqli_fetch_array($consulta)){
						$codigo = $exibirRegistros[0];
						$proj = $exibirRegistros[1];
						$cat = $exibirRegistros[2];
						$escola = $exibirRegistros[3];
						$prof = $exibirRegistros[4];
						$aln1 = $exibirRegistros[5];
						$aln2 = $exibirRegistros[6];


						if($cat == 'DT'){
							print "<article>";
							echo '<div align=left style="Color:'.$Colorx.'">'.$codigo.'</div>';
							print"<b>$proj</b><br>";
							echo '<b><div align=left style="Color:'.$ColorSelect.'">'.$cat.'</div></b>';
							print"$escola<br>";
						print"<i>$prof<br></i>";
							
							if($cat!="ED"){
							print"<i>$aln1<br>";
							print"$aln2</i><br>";
}
						if(($type == "super") | ($type == "coord")){

			echo'	<form method="post" action="../../_edita/proj/editaProj.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="submit" name="edit" value="EDITAR" class="new2" style="width:50px;float:left;font-size:10px" >
				</form>';

}

							echo '
								<form method="post" action="vermais.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="submit" name="mais" value="DETALHES" class="new2" style="margin-left:650px;background-color:orangered;width:100px">
				</form>';

							
						print"<br><br></article>";
}
					}

					mysqli_close($conexao2);

				?>
<br>
			</section>
			
		</div>
	</body>	
</html>