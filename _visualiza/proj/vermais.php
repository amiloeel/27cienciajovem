<?php 

include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];

include_once("../../../_autentica/proj/conexao.php");

$codigo = $_POST['code'];

$sql = "select * from projetos where codigo='$codigo'";
$consulta = mysqli_query($conexao2, $sql);	

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
			<section class="nova" style="width:">
				<h1>Detalhamento de Projeto</h1>
				<hr><br>


				<?php
					$Colorx = "gray";
					$Colory="#2a578b";	
					$categoria;

					while($exibirRegistros = mysqli_fetch_array($consulta)){
						$codigo = $exibirRegistros[0];
						$proj = $exibirRegistros[1];
						$cat = $exibirRegistros[2];
						$escola = $exibirRegistros[3];
						$prof = $exibirRegistros[4];
						$aln1 = $exibirRegistros[5];
						$aln2 = $exibirRegistros[6];
						$res1 = $exibirRegistros[7];
						$res2 = $exibirRegistros[8];
						$res3 = $exibirRegistros[9];
						$resT = $exibirRegistros[10]; 
						$nota1 = $exibirRegistros[11];
						$nota2 = $exibirRegistros[12];
						$nota3 = $exibirRegistros[13];
						$notaT = $exibirRegistros[14];
						$xxx = $exibirRegistros[15];
						$email = $exibirRegistros[16];
						$pre = $exibirRegistros[17];
						$pais = $exibirRegistros[18];
						$estado = $exibirRegistros[19];
						$com1 = $exibirRegistros[20];
						$com2 =$exibirRegistros[21];
						$com3 =$exibirRegistros[22];


						if($cat=='IP'){
							$categoria = 'INICIAÇÃO À PESQUISA (IP)';
						}else if($cat=='IC'){
							$categoria = 'INCENTIVO À PESQUISA (IC)';
						}else if($cat=='DT'){
							$categoria = 'DESENVOLVIMENTO TECNOLÓGICO (DT)';
						}else if($cat=='DC'){
							$categoria = 'DIVULGAÇÃO CIENTÍFICA (DC)';
						}else if($cat=='ED'){
							$categoria = 'EDUCAÇÃO CIENTÍFICA (ED)';
						}else if($cat=='FD'){
							$categoria = 'TALENTOS INTERNACIONAIS (FD)';
						}else{
						    $categoria = 'WORKSHOP DE QUÍMICA (WS)';
						}




						print "<article>";

						print'<div align=center style="Color:'.$Colorx.'">'.$codigo.' </div>';
						print"<b><h1 style='color:black;font-size:20px;'>$proj</h1></b>";
						echo '<b><div align=center style="Color:'.$Colory.'">'.$categoria.'<br></b></div>';
						print"<i><div align=center style='font-size: large'>$estado / $pais<br><br></div>";
if($pre=='1'){
							print"<div align=center></i>O projeto realizou pré-inscrição.</div>";



						}print'<br>
						<hr><br></i>';
						print'<div align=center>';
						print"<i>Escola: </i>";print"<b>$escola</b><br>";
						print"<i>Professor: </i>";	print"<b>$prof</b><br>";
						
							if($cat!="ED"){
							print"<i>Primeiro Aluno: </i>";	print"<b>$aln1</b><br>";
						print"<i>Segundo Aluno: </i>";	print"<b>$aln2</b></i><br>";
}
						
						
						print"<i>E-mail: </i><b>$email</b><br><br><hr><br></div>";

						print'<div align=center>';
						
						print'<div align=center style="font-weight:normal"><i>Atenção, quaisquer notas com valor </i><b>zero</b><i> (0.00) são notas que ainda não foram atribuídas!</i></div><br>';

						echo '<b><div align=center style="Color:'.$Colory.'"><b>Avaliação do Resumo</b></div>';
						
						
						
						$resT = ($res1+$res2+$res3)/3;
						if($pre){
						    $resT = $resT + (8.3);
						}
						
						
						$notaT = ($nota1+$nota2+$nota3)/3;
						
						$xxx = ($resT+$notaT)/2;
						
						
						print'<br>
						<input type="button" class=new2 value="NOTAS:" style="background-color:#ccc; color:black; font-weight:bold;margin-left:85px;">
						<input type="button" class=new2 value='.number_format($res1, 2, '.', '').'>
						<input type="button" class=new2 value='.number_format($res2, 2, '.', '').'>
						<input type="button" class=new2 value='.number_format($res3, 2, '.', '').'>
						<input type="button" class=new2 value="TOTAL:" style="background-color:#ccc; color:black; font-weight:bold;">
						<input type="button" class=new2 value='.number_format($resT, 2, '.', '').'>
						<br><br>';

						echo '<b><div align=center style="Color:'.$Colory.'"><b><b><br>Avaliação da Apresentação</b></div><br>';

						
						print'<input type="button" class=new2 value="NOTAS:" style="background-color:#ccc; color:black; font-weight:bold;margin-left:85px;">
						<input type="button" class=new2 value='.number_format($nota1, 2, '.', '').'>
						<input type="button" class=new2 value='.number_format($nota2, 2, '.', '').'>
						<input type="button" class=new2 value='.number_format($nota3, 2, '.', '').'>
						<input type="button" class=new2 value="TOTAL:" style="background-color:#ccc; color:black; font-weight:bold;">
						<input type="button" class=new2 value='.number_format($notaT, 2, '.', '').'>
<br><br><br>
	
	<div style="background-color:#aaa;margin-right:10px;border:dashed 2px; border-color:#222"><br><b>RESULTADO FINAL</b><br><br>
						<input type="button" class=new2 value="NOTA GERAL:" style="background-color:#ccc; color:#2a578b; font-weight:bold;margin-left:280px; font-size:15px;width:130px">
						<input type="button" class=new2 value='.number_format($xxx, 2, '.', '').' style="background-color:#2a578b">
	
<br><br><br></div><br>

<br><b>Comentários dos Avaliadores:</b><br><br
<article></article><hr>
<article style="font-weight:normal">1- '.$com1.'</article><hr>
<article style="font-weight:normal">2- '.$com2.'</article><hr>
<article style="font-weight:normal">3- '.$com3.'</article><hr>

</b><br><br>

<input type="button" class=new2 value="VOLTAR" 
onclick="history.back();" style="background-color:orangered; color:white; margin-left:700px;font-size:13px">

<br><br><br>
						</div>';
						


						print"</article>";
					}


					mysqli_close($conexao2);

				?>

			</section>
			
		</div>
	</body>	
</html>