<?php 
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
	//print $type;

include_once("../../../_autentica/user/conexaoUser.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];
//$ft = TRUE;
$y = 0;
$sql;
$usuario = $_SESSION['nick'];

if($tipo=='ava'){
	$sql = "insert into avaliadores (nome, email, login, senha, first_time, y, x, z) values ('$nome', '$email', '$login', md5('$senha'), 1, 0, 0, 'ava')";
	$registro = "insert into register (fulano, fez, com) values ('$usuario', 'ADD AVA', '$nome')";

}else if($tipo=='aux'){
	$sql = "insert into aux (nome, email, login, senha, first_time, y, x, z) values ('$nome', '$email', '$login', md5('$senha'), 1, 0, 0, 'aux')";
}else if($tipo=='coord'){
	$sql = "insert into coord (nome, email, login, senha, first_time, y, x, z) values ('$nome', '$email', '$login', md5('$senha'), 1, 0, 0, 'coo')";
	$registro = "insert into register (fulano, fez, com) values ('$usuario', 'ADD COO', '$nome')";
}




$fazRegistro = mysqli_query($conexao3, $registro);

$salvar = mysqli_query($conexao3, $sql); 

$linhas = mysqli_affected_rows($conexao3);

mysqli_close($conexao3);
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
					$Text2 = "<b>Falha no cadastro.</b><br>Usuário ou e-mail já estão cadastrados.";
					if ($linhas == 1){
						echo '<div align=center style="Color:'.$Color2.'">'.$Text.'</div><br>';
					}else{
						echo '<div align=center style="Color:'.$Color.'">'.$Text2.'</div><br>';
					}

    


				?>


				<br>
				<input type="button" onclick="history.back();" value="Voltar" class="btn" style="margin-left: 32%; width: 300px;"><br><br>
			</section>
			
		</div>
	</body>	
</html>
