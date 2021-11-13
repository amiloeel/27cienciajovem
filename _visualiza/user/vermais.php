<?php 

include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];

include_once("../../../_autentica/user/conexaoUser.php");


include_once("../../../_autentica/cruza/conexao.php");


$codigo = $_POST['code'];
$z = $_POST['z'];

//print $codigo;print $z;

if($z=='coo'){
	$sql = "select id,nome,email from coord where id='$codigo'";
}else if($z=='ava'){
	$sql = "select id,nome,email,comp1,comp2,comp3,comp4,comp5 from avaliadores where id='$codigo'";
}else if($z=='aux'){
	$sql = "select id,nome,email from aux where id='$codigo'";
}

$consulta = mysqli_query($conexao3, $sql);	

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
			</nav>
			<section class="nova" >
				<h1>Detalhamento de Usuário</h1>
				<hr><br>


				<?php
					$Colorx = "gray";
					$Colory="#2a578b";	
					
					$exibe = mysqli_fetch_array($consulta);


					if($z=='coo'){
						$id = $exibe[0];
						$nome = $exibe[1];
						$email = $exibe[2];
						print "<article>";

						print'<div align=center style="Color:'.$Colorx.'">'.$id.' </div>';
						print "<div align='center' style='color:'><b>COORDENADOR</b></div>";
						print"<b><h1 style='color:#297c5f;font-size:20px;margin-bottom:5px'>$nome</h1></b>";
						echo '<b><div align=center style="Color:'.$Colory.'">'.$email.'<br></b></div></article>';

					}else if($z=='ava'){
						$id = $exibe[0];
						$nome = $exibe[1];
						$email = $exibe[2];
						$c1 = $exibe[3];
						$c2 = $exibe[4];
						$c3 = $exibe[5];
						$c4 = $exibe[6];
						$c5 = $exibe[7];
						$sql2 = "select projeto from res where avaliador1='$nome' union all select projeto from res where avaliador2='$nome' union all select projeto from res where avaliador3='$nome'";
						$sql3 = "select projeto from apr where avaliador1='$nome' union all select projeto from apr where avaliador2='$nome' union all select projeto from apr where avaliador3='$nome'";

						print "<article>";

						print'<div align=center style="Color:'.$Colorx.'">'.$id.' </div>';
						print "<div align='center' style='color:'><b>AVALIADOR</b></div>";
						print"<b><h1 style='color:#783d5c;font-size:20px;margin-bottom:5px'>$nome</h1></b>";
						echo '<b><div align=center style="Color:'.$Colory.'">'.$email.'<br></b></div>';
						print '<div align=center style="font-size:15px;color:#333"><b>';
						if($c1 !="o" && $c1 !=""){
							print $c1;
						}if($c2!="o" && $c2 !=""){
							print ' / ';print $c2;
						}if($c3!="o" && $c3 !=""){
							print ' / ';print $c3;
						}if($c4!="o" && $c4 !=""){
							print ' / ';print $c4;
						}if($c5!="o" && $c5 !=""){
							print ' / ';print $c5;
						}
						print '</div></b>';
						
						

						$consulta2 = mysqli_query($conexao, $sql2);
						$tamanho = mysqli_num_rows($consulta2);
						$consulta3=mysqli_query($conexao,$sql3);
						$tamanho2 = mysqli_num_rows($consulta3);

						print"<br><hr><br><div align=center style='font-size: medium;background-color:#888'><div style='color:white'><br>Avaliador dos seguintes $tamanho resumos:</div><br><i>";
						while($result = mysqli_fetch_array($consulta2)){
                			print $result[0];
							print "<br>";
						}
						
						print"</i><br><hr><div align=center style='font-size: medium;background-color:#888'><div style='color:white'><br>Avaliador das seguintes $tamanho2 apresentações:</div><br><i>";
						while($result2 = mysqli_fetch_array($consulta3)){
                			print $result2[0];
							print "<br>";
						}





						print '</i><br></div></article>';







					}else if($z=='aux'){
						$id = $exibe[0];
						$nome = $exibe[1];
						$email = $exibe[2];
						print "<article>";

						print'<div align=center style="Color:'.$Colorx.'">'.$id.' </div>';
						print "<div align='center' style='color:'><b>AUXILIAR</b></div>";
						print"<b><h1 style='color:#916e1b;font-size:20px;margin-bottom:5px'>$nome</h1></b>";
						echo '<b><div align=center style="Color:'.$Colory.'">'.$email.'<br></b></div></article>';
					}

				print'<a href="consultaUser.php"><input type="button" value="Voltar" class="btn" style="margin-left: 32%; width: 300px;"></a>';
					
					print'<form method="post" action="../../_edita/user/deluser.php">';
							print'<br><input type="hidden" name="code" value="'.$codigo.'"><input type="hidden" name="z" value="'.$z.'">';

							print'<input type="submit" value="Excluir Usuário" style="color:red; margin-left:345px; background-color: #white;  width:150px; height:20px; margin-top:0px;"></form><br>';


					mysqli_close($conexao3);
					mysqli_close($conexao);

				?>

			</section>
			
		</div>
	</body>	
</html>