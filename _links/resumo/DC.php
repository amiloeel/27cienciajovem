<?php 

include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];

include_once("../../../_autentica/proj/conexao.php");
include_once("../../../_autentica/cruza/conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select codigo,proj,cat from projetos where proj like '%$filtro%' and cat='DC' order by proj";

$consulta = mysqli_query($conexao2, $sql);
$registros = mysqli_num_rows($consulta);

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
				width: 530px;
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

			}
			.btnk{
	
	height: 30px;
	border: 1px solid #ddd;
	background-color: #2a578b;
	color: #fff;
	cursor: pointer;
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
				<h1>Links dos Resumos</h1>
				<hr><br>
                
                
				<div class="nueva" align="center">
                    <?php     
                    
                    
                    print"<div align='center' style='color:darkred'>-- Utilize esse espaço para informar o link de acesso para o <b>arquivo de resumo</b> de cada projeto --<br><br></div>";
                    
                    print'<a href="IP.php"><input type="button" value="IP - Iniciação à Pesquisa" class="btnk" ></a>';
                    print'<a href="IC.php"><input type="button" value="IC - Incentivo à Pesquisa" class="btnk" ></a>';
                    print'<a href="DC.php"><input type="button" value="DC - Divulgação Científica" class="btnk" style="background-color:darkblue"></a>';
                    print'<a href="FD.php"><input type="button" value="FD - Talentos Internacionais" class="btnk"></a>';
                    print'<a href="DT.php"><input type="button" value="DT - Desenvolvimento Tecnológico" class="btnk"></a>';
                    print'<a href="ED.php"><input type="button" value="ED - Educação Científica" class="btnk"></a>';
                     print'<a href="WS.php"><input type="button" value="WS - Workshop de Química" class="btnk" ></a>';
					
					
					?>

</div>
				<br><form method="get" action="">

				    <b>Pesquisa geral:</b><input type="text" name="filtro" class="new" required autofocus>
					<input type="submit" value="Pesquisar" class="btn"><br>	
				</form>
				<br>


				<?php
					$Colorx = "gray";
					$Colory="#2a578b";	

					if($filtro!=""){
					print "Resultado da pesquisa com a palavra '<strong>$filtro</strong>':<br><br>";
}
					print "<i><b>$registros</b> registros encontrados<br></i>	";
					print "<br><br>";

					while($exibirRegistros = mysqli_fetch_array($consulta)){
						$codigo = $exibirRegistros[0];
						$proj = $exibirRegistros[1];
						$cat = $exibirRegistros[2];

						print "<article>";
						print "<div align='center'>";
						
						print"<b>$proj<br><div align='center' style='color:#2a578b;margin-bottom:5px'>$cat</b></div>";
						
						$sql2="select id,projeto,link from res where id='$codigo'";
						$vaila=mysqli_query($conexao,$sql2);
						$vemca=mysqli_fetch_array($vaila);
						
						$cork;
						$textk;
						
						if(!isset($vemca[2])){
						    $cork = "red";
						    $textk = "Link não atribuído";
						    print"<div style='color:$cork'>$textk</div>";
						    print"<form method=post action='linka.php'>";
						    print"<input type='hidden' name='origem' value='dc'>";
						    print"<input type='hidden' name='codigo' value='$codigo'>";
						    print"<input type='text' name='link' style='width:650px;height:23px;margin-right:5px' required>";
						    print"<input type='submit' value='Atribuir link' style='margin-top:7px;height:25px;width:100px;background-color:orangered;border:none;color:white'>";
						    print"</form>";
						}else{
						     $textk = $vemca[2];
						    print"<form method=post action='deslinka.php'>";
						    print"<input type='hidden' name='origem' value='dc'>";
						    print"<input type='hidden' name='link' value='$textk'>";
						    print"<input type='hidden' name='codigo' value='$codigo'>";
						    print"<input type='button' value='$textk' style='width:625px;height:25px;background-color:#999;border:none;color:white'>";
						    print"<a href='$textk' target='_blank'><input type='button' value='->' style='height:25px;width:25px;background-color:#2a578b;border:none;color:white;margin-left:5px'></a>";
						    print"<input type='submit' value='Remover link' style='margin-top:7px;height:25px;width:100px;background-color:#333;border:none;color:white;margin-left:5px'></form>";
						    
						    
						    }
						
						
						
						
						print"</div></article>";
					}


					mysqli_close($conexao2);mysqli_close($conexao);

				?>

			<br></section>
			
		</div>
	</body>	
</html>