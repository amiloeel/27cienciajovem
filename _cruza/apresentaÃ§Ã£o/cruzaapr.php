<?php
	//session_start();
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];

include_once("../../../_autentica/proj/conexao.php");
include_once("../../../_autentica/cruza/conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select codigo,proj,cat,escola,nota1,nota2,nota3 from projetos where proj like '%$filtro%' or escola like '%$filtro%' order by proj";
$consulta = mysqli_query($conexao2, $sql);
$registros = mysqli_num_rows($consulta);
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
				<h1 style="color:#297c5f">Avaliação de Apresentações</h1>
				<hr><br>

				<div class = "nueva" align="center">
					<a href="IP.php"><input type="button" value=" IP - Iniciação à Pesquisa " class="btn"></a>
					<a href="IC.php"><input type="button" value=" IC - Incentivo à Pesquisa" class="btn"></a>
					<a href="DC.php"><input type="button" value=" DC - Divulgação Científica" class="btn"></a><br>
					<a href="FD.php"><input type="button" value=" FD - Talentos Internacionais" class="btn"></a>
					<a href="DT.php"><input type="button" value=" DT - Desenvolvimento Tecnológico" class="btn"></a>
					<a href="ED.php"><input type="button" value=" ED - Educação Científica" class="btn"></a>
					<a href="WS.php"><input type="button" value="WS - Workshop de Química" class="btn"></a><br><br><br>
					</div>
				<form method="get" action="">

				    <b>Pesquisa geral:</b><input type="text" name="filtro" class="new" required autofocus>
					<input type="submit" value="Pesquisar" class="btn"><br>	
				</form>
				<br>


				<?php
				    $procede = 0;
				    $sqlx = "select a,b,c from res";
				    $go2 = mysqli_query($conexao,$sqlx);
				    
				    while($exibirRegistrosX = mysqli_fetch_array($go2)){
				        $res1 = $exibirRegistrosX[0];
						$res2 = $exibirRegistrosX[1];
						$res3 = $exibirRegistrosX[2];
						
						if($res1==0){
						    $procede++;
						}if($res2==0){
						    $procede++;
						}if($res3==0){
						    $procede++;
						}
				    }
				    
				    $Colorx = "gray";
					$Colory="#2a578b";	

					if($filtro!=""){
					print "Resultado da pesquisa com a palavra '<strong>$filtro</strong>':<br><br>";
}
					print "<i><b>$registros</b> registros encontrados<br></i>	";
					print "<br>";
					
					if($procede!=0){
					
					print "<div align=center style='color:red'><b>ATENÇÃO:</b><br> Ainda existem <b>$procede</b> avaliações de resumos pendentes!<br>Favor realizar as avaliações ou excluir os projetos pendentes antes de iniciar as atribuições dessa página.</div><br><br>";}

					while($exibirRegistros = mysqli_fetch_array($consulta)){
						$codigo = $exibirRegistros[0];
						$proj = $exibirRegistros[1];
						$cat = $exibirRegistros[2];
						$escola = $exibirRegistros[3];
						$nota1 = $exibirRegistros[4];
						$nota2 = $exibirRegistros[5];
						$nota3 = $exibirRegistros[6];
						$fim = 0;
						
						
						
						
						$sql2 = "select fim,link from apr where id='$codigo'";
						$go = mysqli_query($conexao,$sql2);
						$vai = mysqli_fetch_array($go);
						
						print "<article>";

						print'<div align=center style="Color:'.$Colorx.'">'.$codigo.' </div>';
						print"<div align=center style='font-size:17px'><b>$proj</b></div>";
						echo '<b><div align=center style="Color:'.$Colory.'">'.$cat.'</div></b>';
						print"<div align=center>$escola<br></div>";


            if($vai[1]!=NULL){

            if($vai[0]==1){
                        print '<br><hr><br>';
						$counter=0;
						if($nota1==0){
							$counter++;
						}
						if($nota2==0){
							$counter++;
						}if($nota3==0){
							$counter++;
						}
						if($counter!=0){
							if($counter==1){
								print "<div align=center style='Color:#916e1b'><b>Falta $counter avaliação!</b></div>";
							}else{
								print "<div align=center style='Color:darkred'><b>Faltam $counter avaliações!</b></div>";	
							}
						}else{
							print "<div align=center style='Color:green'><b>Avaliação concluída!</b></div>";
								$fim =1;
								echo'	<br><form method="post" action="detalheapr.php">
				<input type="hidden" name="code" value="'.$codigo.'">

				<input type="submit" name="edit" value="VER DETALHES" class="new2" style="width:270px;background-color:green;">
				</form><br><br>';
						}

            }


				
				if(!$fim){			
			echo'	<br><form method="post" action="detalheapr.php">
				<input type="hidden" name="code" value="'.$exibirRegistros[0].'">
				<input type="submit" name="edit" value="VER DETALHES" class="new2" style=";width:200px;background-color:#2a578b;margin-left:31.5%">
				</form>';
				
				$text;
				$color;
				if($vai[0]==0){
				    $text = "ATIVAR";
				    $color = "green";
				}else{
				    $text = "DESATIVAR";
				    $color = "#555";
				}
				
				echo'<form method="post" action="ativar.php">
				<input type="hidden" name="atv" value="'.$vai[0].'">
				<input type="hidden" name="codego" value="'.$exibirRegistros[0].'">
				<input type="hidden" name="nome" value="'.$proj.'">
				<input type="hidden" name="origem" value="base">
				<input type="submit" name="edit" class="new2" value="'.$text.'" style="width:100px;background-color:'.$color.'; margin-left:1px">
								</form>
				<br><br>';}
}else{
    echo'	<br><form method="post" action="detalheapr.php">
				<input type="hidden" name="code" value="'.$exibirRegistros[0].'">
				<input type="submit" name="edit" value="VER DETALHES" class="new2" style=";width:200px;background-color:#2a578b;margin-left:300px">
				</form><br><br>';
}

						print"</article>";
					}
mysqli_close($conexao);

				?>
				<br><br>

			</section>
		</div>
	</body>
</html>
