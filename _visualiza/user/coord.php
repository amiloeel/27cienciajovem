<?php 

include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
	$nome2 = $_SESSION['nick'];

include_once("../../../_autentica/user/conexaoUser.php");


$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select id, nome, email, z, login from coord where nome like '%$filtro%' or email like '%$filtro%' order by nome";
$consulta = mysqli_query($conexao3, $sql);
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
				</ul>
			</nav>
			<section class="nova">
				<h1>Coordenadores</h1>
				<hr><br><br>

				<div class = "nueva" align="center">
					<a href="avaliador.php"><input type="button" value=" Avaliadores " class="btn" style="background-color: #783d5c;font-size: 15px;font-weight: bold;height: 42px;"></a>
					<a href="auxiliar.php"><input type="button" value=" Auxiliares " class="btn" style="background-color: #916e1b;font-size: 15px;font-weight: bold;height: 42px"></a>
					<a href="coord.php"><input type="button" value=" Coordenadores " class="btn" style="background-color:#297c5f;font-size: 15px;font-weight: bold;height: 42px"></a><br>
					</div><br><br>


				<form method="get" action="">

				    <b>Pesquisa geral:</b><input type="text" name="filtro" class="new" required autofocus>
					<input type="submit" value="Pesquisar" class="btn"><br>	
				</form>
				<br>


				<?php
					$Colorx = "black";
					$Colory="#2a578b";	

					if($filtro!=""){
					print "Resultado da pesquisa com a palavra '<strong>$filtro</strong>':<br><br>";
}
					print "<i><b>$registros</b> registros encontrados<br></i>	";
					print "<br><br>";

					while($exibirRegistros = mysqli_fetch_array($consulta)){

						$codigo = $exibirRegistros[0];
						$nome = $exibirRegistros[1];
						$email = $exibirRegistros[2];
						$id = $exibirRegistros[4];

						$msg;
						if($exibirRegistros[3]=='coo'){
							$msg = 'COORDENADOR';
							$cor = '#297c5f';
						}else if($exibirRegistros[3]=='ava'){
							$msg = 'AVALIADOR';
							$cor = '#783d5c';
						}else{
							$msg = 'AUXILIAR';
							$cor = '#916e1b';
						}
						
						if($id!=$nome2){

						print "<article>";

						print'<b><div align=left style="Color:'.$Colory.';font-size:17px">'.$nome.' </div></b>';

						print'<div align=left style="Color:'.$cor.'"><h5>'.$msg.' </h5></div>';
						
						echo '<div align=left style="Color:'.$Colorx.'">'.$email.'</div>';

							if(($type == "super") | ($type == "coord")){

								echo '
								<form method="post" action="vermais.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="hidden" name="z" value="'.$exibirRegistros[3].'">
				<input type="submit" name="mais" value="+" class="new2" style="float:right; background-color:#2a578b;font-weight:bold;font-size:large;width:30px">
				</form>';

			echo'	<br><br>';

}
						print"</article>"; }
					}


					mysqli_close($conexao3);

				?>

			<br></section>
			
		</div>
	</body>	
</html>