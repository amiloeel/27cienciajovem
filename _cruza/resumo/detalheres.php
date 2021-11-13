<?php
	//session_start();
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
//	$code = $_POST['code'];
	
	if(!isset($_POST['code'])){
	    $code=$_SESSION['codex'];
	}else{
	     $code = $_POST['code'];
	}
	
include_once("../../../_autentica/proj/conexao.php");

include_once("../../../_autentica/cruza/conexao.php");

$sql = "select codigo,proj,cat,escola, res1,res2,res3 from projetos where codigo='$code'";
$sql2 = "select id,avaliador1, avaliador2,avaliador3,a,b,c, fim,link from res where id='$code'";
$consulta = mysqli_query($conexao2, $sql);
$consulta2 = mysqli_query($conexao, $sql2);
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
			input.new3{
				width: 100px;
	height: 30px;
	border:none;
	background-color: #666;
	color: #fff;
	cursor: pointer;
	float: center;
	
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
				<h1>Detalhes da Avaliação do Resumo</h1>
				<hr><br>
				
				<br>


				<?php
					$Colorx = "gray";
					$Colory="#2a578b";	

					$exibirRegistros = mysqli_fetch_array($consulta);
					$exibirRegistros2 = mysqli_fetch_array($consulta2);

						$codigo = $exibirRegistros[0];
						$proj = $exibirRegistros[1];
						$cat = $exibirRegistros[2];
						$escola = $exibirRegistros[3];

						$res1 = $exibirRegistros2[4];
						$res2 = $exibirRegistros2[5];
						$res3 = $exibirRegistros2[6];
						
						$end = $exibirRegistros2[7];
						
				$text;
				$color;
				if($end==0){
				    $text = "ATIVAR";
				    $color = "green";
				}else{
				    $text = "DESATIVAR";
				    $color = "#555";
				}
				
						


						print "<article>";

						print'<div align=center style="Color:'.$Colorx.'">'.$codigo.' </div>';
						print"<div align=center style='font-size:18px'><b>$proj</b></div>";
						echo '<b><div align=center style="Color:'.$Colory.'">'.$cat.'</div></b>';
						print"<div align=center>$escola<br><br></div>";

if($exibirRegistros2[8]!=NULL){
						if($end==1){
							print'<hr><br>';

                        $counter=0;
                        
						if($res1==0){
							$counter++;
						}
						if($res2==0){
							$counter++;
						}if($res3==0){
							$counter++;
						}
						if($counter!=0){
							if($counter==1){
								print "<div align=center style='Color:#916e1b'><b>Falta $counter avaliação!</b></div><br>";
							}else{
								print "<div align=center style='Color:darkred'><b>Faltam $counter avaliações!</b></div><br>";	
							}
							echo'<div align=center><form method="post" action="ativar.php">
				<input type="hidden" name="atv" value="'.$end.'">
				<input type="hidden" name="origem" value="detalhe">
				<input type="hidden" name="codego" value="'.$codigo.'">
				<input type="hidden" name="nome" value="'.$proj.'">
				<input type="submit" name="edit"  class="new3" value="'.$text.'" style="width:100px;background-color:'.$color.'; margin-bottom:0px">
								</form><br></div>';
						}else{
							print "<div align=center style='Color:green'><b>Avaliação concluída!</b></div><br>";
								
						}

						}
						
	

							}
				
								


//---------------------------------------------------------------//



					print' <div align=center style="background-color:#666; color:white"><br><b>Avaliador #1</b><br><br><hr>';

					if($exibirRegistros2[1]=='x'){
						print'<div align="center" style="color:#999"><br>Sem atribuição<br><br>
						<form method="post" action="edita.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="hidden" name="ava" value="1">
				<input type="submit" name="edit" value="Atribuir Avaliador" class="new" style="color:white;width:270px;background-color:#e34f4f;border:none">
				</form>

				 <br></div>';
					}else{
						if($exibirRegistros[4]==0){
							print'<br><div align="center" style="background-color:#297c5f;width:500px"><br>';
						print $exibirRegistros2[1];
						print '<br><br></div>';
						print '<br>

						<form method="post" action="kill.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="hidden" name="ava" value="1">
				<input type="hidden" name="nome" value="'.$proj.'">
				<input type="hidden" name="avaliador" value="'.$exibirRegistros2[1].'">
				<input type="submit" name="edit" value="Remover Atribuição" class="new" style="color:white;width:270px;background-color:#222;border:none">
				</form><br>

						';
						}else{
							print'<div align="center" style="background-color:#297c5f"><br>';
						print $exibirRegistros2[1];
						print '<br><br></div>';
						}
						
					}



//---------------------------------------------------------------//




					print' </div><br><br><div align=center style="background-color:#666; color:white"><br><b>Avaliador #2</b><br><br><hr>';

					if($exibirRegistros2[2]=='x'){
						print'<div align="center" style="color:#999"><br>Sem atribuição<br><br>
						<form method="post" action="edita.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="hidden" name="ava" value="2">
				<input type="submit" name="edit" value="Atribuir Avaliador" class="new" style="color:white;width:270px;background-color:#e34f4f;border:none">
				</form>

				 <br>
						</div>';
					}else{
						if($exibirRegistros[5]==0){
							print'<br><div align="center" style="background-color:#297c5f;width:500px"><br>';
						print $exibirRegistros2[2];
						print '<br><br></div>';
						print '<br>

						<form method="post" action="kill.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="hidden" name="ava" value="2">
				<input type="hidden" name="nome" value="'.$proj.'">
				<input type="hidden" name="avaliador" value="'.$exibirRegistros2[2].'">

				<input type="submit" name="edit" value="Remover Atribuição" class="new" style="color:white;width:270px;background-color:#222;border:none">
				</form><br>

						';
						}else{
							print'<div align="center" style="background-color:#297c5f"><br>';
						print $exibirRegistros2[2];
						print '<br><br></div>';
						}
						
					}


//---------------------------------------------------------------//




					print' </div><br><br><div align=center style="background-color:#666; color:white"><br><b>Avaliador #3</b><br><br><hr>';

					if($exibirRegistros2[3]=='x'){
						print'<div align="center" style="color:#999"><br>Sem atribuição<br><br>
						<form method="post" action="edita.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="hidden" name="ava" value="3">
				<input type="submit" name="edit" value="Atribuir Avaliador" class="new" style="color:white;width:270px;background-color:#e34f4f;border:none">
				</form>

				 <br>
						</div>';
					}else{
							if($exibirRegistros[6]==0){
							print'<br><div align="center" style="background-color:#297c5f;width:500px"><br>';
						print $exibirRegistros2[3];
						print '<br><br></div>';
						print '<br>

						<form method="post" action="kill.php">
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="hidden" name="ava" value="3">
				<input type="hidden" name="nome" value="'.$proj.'">
				<input type="hidden" name="avaliador" value="'.$exibirRegistros2[3].'">
				<input type="submit" name="edit" value="Remover Atribuição" class="new" style="color:white;width:270px;background-color:#222;border:none">
				</form><br>

						';
						}else{
							print'<div align="center" style="background-color:#297c5f"><br>';
						print $exibirRegistros2[3];
						print '<br><br></div>';
						}
						
					}

					print '</div>';

						print"<br></article>";

						echo '<br><a href="cruzares.php"><input type="button" class=new value="VOLTAR" 
 style="background-color:#2a578b; color:white; margin-bottom:1px;font-size:13px; width:300px; height:30px; margin-left:262px;border:none"></a>';
					


					mysqli_close($conexao);
					mysqli_close($conexao2);

				?>
				<br><br>

			</section>
		</div>
	</body>
</html>
