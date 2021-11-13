<?php

	include('../../../_autentica/avaliador/verifyava.php');
	include('../../../_autentica/cruza/conexao.php');
    
    $code=$_POST['code'];
	$nomeia=$_POST['nome'];

	$sqlres="select id,projeto,fim from res where id='$code'";
	$vai2=mysqli_query($conexao,$sqlres);
	$res=mysqli_fetch_array($vai2);
	
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
	</head>
	<body><br><br><br>
		<div class="containernovo">
			<nav class="novonav"><br><img src="../../y.png" style="margin-left:20%;width:500px">
				<br><br>
				
				
				
				
				<ul class="menu2" style="background-color:#666;width:800px;margin-left:2%">
					
					<br><b><div align="center" style="font-size:45px">AVALIAR RESUMO</div><br><br></b>
				
					<?php
					
				
				    $code=$res[0];
				    $proj=$res[1];
				    $go=$res[2];
				
				    
				    print"
				    <div align='center' style='margin-bottom:20px'><article style='width:750px;font-size:40px;height:auto;background-color:#333'>";
				    
				    print"$proj";
				    
				    
				    
				    print"</article></div></a>";
				
					if($go==0){
					    print"
				    <div align='center' style='margin-top:50px'><article style='width:750px;font-size:40px;height:auto;background-color:#ccc;color:black'>";
				    print"Oi $nomeia, tudo bem?<br>Você foi selecionado para avaliar o resumo desse projeto porém ele ainda não está ativo.<br>Quando ele for ativado você verá o botão <b>AVALIAR</b> ao invés dessa importuna mensagem!<br><br>Para saber as datas e horários de ativação basta procurar o representante da sua categoria.";
				    print"</article></div>";
					}else{
					    $sqlx="select link from res where id='$code'";
					    $resx=mysqli_query($conexao,$sqlx);
					    $ress=mysqli_fetch_array($resx);
					    $link=$ress[0];
					    
					    print'<br><div align="center" style="font-size:35px">Vamos começar?<br><br>Primeiro clique no botão abaixo para fazer a leitura do documento que traz os detalhes sobre o projeto:<br><br></div>';
					    
					    print'<div align="center"><a href="'.$link.'" ><li style="width: 500px;
	height: 80px;line-height: 80px;background-color: #783d5c;color: white;margin-top: 5px;box-sizing: border-box;padding-left: 10px;margin-left: 10px;list-style-type: none;font-size:35px">Acessar Arquivo</li></a><br>
</div>';

print'<br><div align="center" style="font-size:35px">Após ler o documento clique no botão abaixo para começar a avaliação!<br><br></div>';

print'<div align="center"><form method="post" action="avaliares.php">
				    <input type="hidden" name="code" value="'.$code.'">
				    <input type="hidden" name="nome" value="'.$nomeia.'">
				    <input type="submit" class="btny" value="Avaliar!"
				    style="width: 500px;
	height: 80px;line-height: 80px;background-color: #783d5c;color: white;margin-top: 5px;box-sizing: border-box;padding-left: 10px;margin-left: 10px;list-style-type: none;font-size:45px">
				    
				    <br>
</form></div>';

					    
					}
					
					
				
					
					?>
					<br><br>
				</ul>
				
				<br><br>
				<div align="center">
<a href="avamain.php"><li style="width: 500px;
	height: 80px;line-height: 80px;background-color: #297c5f;color: white;margin-top: 5px;box-sizing: border-box;padding-left: 10px;margin-left: 10px;list-style-type: none;font-size:40px">Voltar</li></a><br><br>
</div>
			</nav>
			<section class="sec2">
				
	

			</section>
		</div>
	</body>
</html>
