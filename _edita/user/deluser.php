<?php 
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
	

include_once("../../../_autentica/user/conexaoUser.php");

//include_once("../../../_autentica/cruza/conexao.php");

$z = $_POST['z'];
$code = $_POST['code'];

if($z=='coo'){
	$sql = "select id,nome from coord where id='$code'";
}else if($z=='ava'){
	$sql = "select id,nome from avaliadores where id='$code'";
}else if($z=='aux'){
	$sql = "select id,nome from aux where id='$code'";
}

$consulta = mysqli_query($conexao3, $sql);

mysqli_close($conexao3);
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
				<h1>Excluir Usuário</h1>
				<hr><br><br>

				<?php
					$exibirRegistros = mysqli_fetch_array($consulta);
					$codigo = $exibirRegistros[0];
					$nome = $exibirRegistros[1];
					
				    print "<article>";
	
						print'<i>ID #'.$codigo.'</i>';
?><?php
						
						print'<h4 style="font-size: large; text-align:center; font-style: normal;">ATENÇÃO<br>Você está prestes a remover o seguinte usuário<br> de nossa base de dados:<br>
						<br></h4><h4 style="font-size: large; text-align:center; font-style: normal; color:black;">'.$nome.'</h4><br><br><h4 style="font-size: large; text-align:center; font-style: normal;">Deseja prosseguir?</h4>';

							print'<form method="post" action="deletaruser.php">';
							print'<input type="hidden" name="code" value="'.$codigo.'">';
							print'<input type="hidden" name="z" value="'.$z.'">';
							print'<br><br><input type="submit" value="Confirmar exclusão de usuário" style="color:red; margin-left:268px; background-color: #white; border-style: none; width:280px; height:20px; margin-top:0px;"></form><br>';

							print'<div class = "nueva" align="center"><a href="../../_visualiza/user/consultaUser.php"><input type="button" value="CANCELAR" class="new3" style="background-color:red;"></a></div>';
						


						print"</article>";
					


					//mysqli_close($conexao);

				?>

			</section>
			
		</div>
	</body>	
</html>