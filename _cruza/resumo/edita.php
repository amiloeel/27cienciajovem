<?php
	//session_start();
include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];
	if(!isset($_POST['ava'])){
	    $ava = $_GET['ava'];
	}else{
	    $ava = $_POST['ava'];
	}
	if(!isset($_POST['code'])){
	    $code = $_GET['code'];
	}else{
	$code = $_POST['code'];
	}

include_once("../../../_autentica/proj/conexao.php");  //2

include_once("../../../_autentica/cruza/conexao.php"); //0

include_once("../../../_autentica/user/conexaoUser.php"); //3

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sqlw = "select id,nome,comp1,comp2,comp3,comp4,comp5 from avaliadores where nome like '%$filtro%' or comp1 like '%$filtro%' or comp2 like '%$filtro%' or comp3 like '%$filtro%' or comp4 like '%$filtro%' or comp5 like '%$filtro%' order by nome";

$sql = "select codigo,proj,cat,escola, res1,res2,res3 from projetos where codigo='$code'";
$sql2 = "select id,avaliador1, avaliador2,avaliador3 from res where id='$code'";

$sql3 = "select id,nome,comp1,comp2,comp3,comp4,comp5 from avaliadores order by nome";

$consulta = mysqli_query($conexao2, $sql);
$consulta2 = mysqli_query($conexao, $sql2);
$consulta3 = mysqli_query($conexao3, $sql3);
$consulta4 = mysqli_query($conexao3, $sqlw);
//$nomes = mysqli_fetch_array($consulta3);

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
				width: 133px;
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
					.btnk{
	
	height: 30px;
	border: 1px solid #ddd;
	background-color: #2a578b;
	color: #fff;
	cursor: pointer;
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
				<h1>Atribuir Avaliador</h1>
				<hr><br>
				
								<?php
					$Colorx = "gray";
					$Colory="#2a578b";	

					$exibirRegistros = mysqli_fetch_array($consulta);
					$exibirRegistros2 = mysqli_fetch_array($consulta2);

						$codigo = $exibirRegistros[0];
						$proj = $exibirRegistros[1];
						$cat = $exibirRegistros[2];
						$escola = $exibirRegistros[3];
					
							$um = $exibirRegistros2[1];
							$dois = $exibirRegistros2[2];
							$tres = $exibirRegistros2[3];
	

print'<div class = "nueva" align="center">';

                    $corg =  "#2a578b";
                                            
                    if($filtro=="pedagogia"){
                        $corg = "#783d5c";
                    }    
                     print' <form method="get" action="" style="float:left;margin-left:10px">';  
                     print'<input type="hidden" name="filtro" value="pedagogia">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">';
					print'<input type="submit" value="Pedagogia" class="btnk" style="background-color:'.$corg.'"></a>
					</form>';$corg =  "#2a578b";
					
					if($filtro=="artes"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="artes">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="Artes" class="btnk" style="background-color:'.$corg.'"></a></form>';$corg =  "#2a578b";
					
						if($filtro=="matematica"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="matematica">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="Matemática" class="btnk" style="background-color:'.$corg.'"></a></form>';$corg =  "#2a578b";
					
					if($filtro=="linguagem"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="linguagem">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="Linguagem" class="btnk" style="background-color:'.$corg.'"></a></form>';$corg =  "#2a578b";
					
					if($filtro=="fisica"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="fisica">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="Física" class="btnk" style="background-color:'.$corg.'"></a></form>';$corg =  "#2a578b";
					
					if($filtro=="quimica"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="quimica">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="Química" class="btnk" style="background-color:'.$corg.'"></a></form>';$corg =  "#2a578b";
					
					if($filtro=="sociologia"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left;margin-left:10px">';  
                     print'<input type="hidden" name="filtro" value="sociologia">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value=" Sociologia " class="btnk" style="background-color:'.$corg.'"></a></form>';$corg =  "#2a578b";
					
					if($filtro=="geografia"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="geografia">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
				<input type="submit" value="Geografia" class="btnk" style="background-color:'.$corg.'""></a></form>';$corg =  "#2a578b";
					
					if($filtro=="historia"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="historia">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="História" class="btnk" style="background-color:'.$corg.'""></a></form>';$corg =  "#2a578b";
					
					if($filtro=="tecnologia"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="tecnologia">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="Tecnologia" class="btnk" style="background-color:'.$corg.'""></a></form>';$corg =  "#2a578b";
					
					if($filtro=="biologia"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="biologia">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="Biologia" class="btnk" style="background-color:'.$corg.'""></a></form>';$corg =  "#2a578b";
					
					if($filtro=="astronomia"){
                        $corg = "#783d5c";
                    }
					print' <form method="get" action="" style="float:left">';  
                     print'<input type="hidden" name="filtro" value="astronomia">
                     <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
					<input type="submit" value="Astronomia" class="btnk" style="background-color:'.$corg.'""></a></form>';
					$corg =  "#2a578b";print'
					
					
					<br><br><br>
					<form method="get" action="">
                    <input type="hidden" name="code" value="'.$code.'">
                     <input type="hidden" name="ava" value="'.$ava.'">
				    <br><br><b>Pesquisa geral:</b><input type="text" name="filtro" class="new" required autofocus style="width:460px">
					<input type="submit" value="Pesquisar" class="btn"><br>	
				</form>
					</div><br>';
					
					
				
				

						print "<article>";

						print'<div align=center style="Color:'.$Colorx.'">'.$codigo.' </div>';
						print"<div align=center style='font-size:18px'><b>$proj</b></div>";
						echo '<b><div align=center style="Color:'.$Colory.'">'.$cat.'</div></b>';
						print"<div align=center>$escola<br><br></div>";	

						print'<br><div align="center" style="background-color:#666;width:800px;color:#333"><br>';


						
						while($exibirRegistros3 = mysqli_fetch_array($consulta4)){
						$avaliador = $exibirRegistros3;
						$idava = $avaliador[0];
						$nomeava = $avaliador[1];
						
						$sqlk="select id from res where avaliador1='$nomeava' union all select id from res where avaliador2='$nomeava' union all select id from res where avaliador3='$nomeava'";
						$vaik=mysqli_query($conexao, $sqlk);
						$tag=0;
						$tag=mysqli_num_rows($vaik);
						

						if($avaliador[1]!=$um && $avaliador[1]!=$dois && $avaliador[1]!=$tres){
						print "<article style='font-size:18px;color:#297c5f'><b>";
						print"    ";
						print $avaliador[1];
						print '<input type="button" class="btn" value="'.$tag.'" disabled style="background-color:#916e1b;color:white;width:30px;float:right">';
						print '<hr style="margin-top:5px;margin-bottom:5px">';
						print '<div align=center style="font-size:15px;color:#333">';
						if($avaliador[2]!=null && $avaliador[2]!="o"){
							print $avaliador[2];
						}if($avaliador[3]!=null && $avaliador[3]!="o"){
							print ' / ';
							print $avaliador[3];
						}if($avaliador[4]!=null && $avaliador[4]!="o"){
							print ' / ';
							print $avaliador[4];
						}if($avaliador[5]!=null && $avaliador[5]!="o"){
							print ' / ';
							print $avaliador[5];
						}if($avaliador[6]!=null && $avaliador[6]!="o"){
							print ' / ';
							print $avaliador[6];
						}
						print '</div>';
						print '</b><form method="post" action="atribuir.php" >
				<input type="hidden" name="code" value="'.$codigo.'">
				<input type="hidden" name="ava" value="'.$ava.'">
				<input type="hidden" name="idava" value="'.$idava.'">
				<input type="hidden" name="avaliador" value="'.$avaliador[1].'">
				<input type="hidden" name="nome" value="'.$exibirRegistros[1].'">
				<input type="submit" name="edit" value="SELECIONAR" class="new" style="width:100px;margin-top:10px;height:30px;background-color:#297c5f;color:white;border:none">
				</form>';
						print "</article>";	}		
}









							echo '<br><form method="post" action="detalheres.php">

							<input type="hidden" name="code" value="'.$codigo.'">
							<input type="submit" class=new value="VOLTAR" 
 style="background-color:#2a578b; color:white; margin-bottom:1px;font-size:13px; width:300px; height:30px; margin-left:20px;margin-bottom:15px;border:none">';
							?>


			</section>
		</div>
	</body>
</html>
