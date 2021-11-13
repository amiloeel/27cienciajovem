<?php 
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
	//print $type;

include_once("../../../_autentica/proj/conexao.php");
include_once("../../../_autentica/cruza/conexao.php");


$proj = $_POST['proj'];
$cat = $_POST['categoria'];
$aln1 = $_POST['aln1'];
$aln2 = $_POST['aln2'];


$escola = $_POST['escola'];
$prof = $_POST['prof'];

$email = $_POST['email'];
$estado = $_POST['estado'];
$pais = $_POST['pais'];
$pre = $_POST['pre'];
$sql;




if($pre == "0"){
    $sql="insert into projetos (proj,cat,escola,prof,aln1,aln2,email,estado,pais,pre,res1,res2,res3,resT,nota1,nota2,nota3,notaT,xxx) values ('$proj','$cat','$escola','$prof','$aln1','$aln2', '$email', '$estado', '$pais', 0,0,0,0,0,0,0,0,0,0)";
}else{
    $sql="insert into projetos (proj,cat,escola,prof,aln1,aln2,email,estado,pais,pre,res1,res2,res3,resT,nota1,nota2,nota3,notaT,xxx) values ('$proj','$cat','$escola','$prof','$aln1','$aln2', '$email', '$estado', '$pais', 1,0,0,0,0,0,0,0,0,0)";
}

$sql2 = "insert into res (projeto,avaliador1,avaliador2,avaliador3, a, b, c, fim) values ('$proj','x','x','x', 0,0,0,0)";
$sql3 = "insert into apr (projeto,avaliador1,avaliador2,avaliador3, a, b, c, fim) values ('$proj','x','x','x', 0,0,0,0)";


$usuario = $_SESSION['nick'];

$registro = "insert into register (fulano, fez, com) values ('$usuario', 'ADD PROJ', '$proj')";
$fazRegistro = mysqli_query($conexao, $registro);


$salvar = mysqli_query($conexao2, $sql); 
$salvar2 = mysqli_query($conexao, $sql2);
$salvar3 = mysqli_query($conexao, $sql3);

$linhas = mysqli_affected_rows($conexao2);

mysqli_close($conexao2);
mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
	</head>
	<body><div class="container">	<?php
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
			<section>
				<h1>Confirmação de Cadastro</h1>
				<hr><br><br>

				<?php 
					$Color = "red";
					$Color2 = "green";
					$Text = "<b>Cadastro efetuado com sucesso!</b>";
					$Text2 = "<b>Falha no cadastro.</b><br>Projeto já existe ou alunos já estão inscritos.";
					if ($linhas == 1){
						echo '<div align=center style="Color:'.$Color2.'">'.$Text.'</div>';
					}else{
						echo '<div align=center style="Color:'.$Color.'">'.$Text2.'</div>';
					}

    


				?>


				<br>
				<input type="button" onclick="history.back();" value="Voltar" class="btn" style="margin-left: 32%; width: 300px;">
			<br><br></section>
			
		</div>
	</body>	
</html>
