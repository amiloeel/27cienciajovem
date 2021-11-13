<?php

	include('../../../_autentica/avaliador/verifyava.php');
	include('../../../_autentica/cruza/conexao.php');
	include('../../../_autentica/user/conexaoUser.php');
	$prov=$_SESSION['nick'];
	
	$sqlnome = "select nome from avaliadores where login='$prov'";
	$vai1=mysqli_query($conexao3,$sqlnome);
	$nome=mysqli_fetch_array($vai1);
	$nomeia=$nome[0];
	
	
	$sqlres="select id,projeto,a,fim from res where avaliador1='$nomeia' union all select id,projeto,b,fim from res where avaliador2='$nomeia' union all select id,projeto,c,fim from res where avaliador3='$nomeia'";
	$vai2=mysqli_query($conexao,$sqlres);
	
	
	$sqlapr="select id,projeto,a,fim from apr where avaliador1='$nomeia' union all select id,projeto,b,fim from apr where avaliador2='$nomeia' union all select id,projeto,c,fim from apr where avaliador3='$nomeia'";
	$vai3=mysqli_query($conexao,$sqlapr);
	$numapr=mysqli_num_rows($vai3);
	$catotares=0;
	$catotaapr=0;
	
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
				
				<h1 style="font-size:50px;color:white">Seja bem vind@ <?php $firstName = substr($nomeia,0,strpos($nomeia," "));print $firstName;?></h1><br><br>
				
				
				<ul class="menu2" style="background-color:#666;width:800px;margin-left:2%">
					
					<br><b><div align="center" style="font-size:45px">RESUMOS</div></b>
				
					<?php
					
					print"<div align='center' style='font-size:33px'>Os seguintes projetos aguardam avaliação: </div>";
					    print'<br>';
					
				while($res=mysqli_fetch_array($vai2)){
				    $code=$res[0];
				    $proj=$res[1];
				    $done=$res[2];
				    $open=$res[3];
				    
				    
				    $prev=substr($proj,0,45);
				    if(strlen($proj)>45){
				    $prev=$prev."...";}
				    
				    if(($open==1)&&($done==0)){
				 
				    $catotares++;
				    print"<hr><br>
				    <form method='post' action='preavaliares.php'>
				    <input type='hidden' name='code' value='$code'>
				    <input type='hidden' name='nome' value='$nomeia'>
				    <input type='submit' class='btny' value='$prev'
				    style='font-size:30px;color:white;margin-bottom:20px; width:750px;height:100px;background-color:#2a578b;text-aligment:center'>
				    
				    </form>
				    
				  ";
				    
				    
				    }
				    
				}if($catotares==0){
				   print"<hr><br><div align='center' style='font-size:23'>Nenhuma pendência</div>";
				}
					
					
					
				
					
					?>
					<br>
				</ul>
				<ul class="menu2" style="background-color:#666;width:800px;margin-left:2%">
					<br><b><div align="center" style="font-size:45px">APRESENTAÇÕES</div></b>
					
					<?php
					print"<div align='center' style='font-size:33px'>Os seguintes projetos aguardam avaliação: </div>";
					    print'<br>';
				while($apr=mysqli_fetch_array($vai3)){
				    $code2=$apr[0];
				    $proj2=$apr[1];
				    $done2=$apr[2];
				    $open2=$apr[3];
				    
				    $prev2=substr($proj2,0,45);
				    if(strlen($proj2)>45){
				    $prev2=$prev2."...";}
				    
				    if(($open2==1)&&($done2==0)){
				 
				    $catotaapr++;
				    print"<hr><br>
				    <form method='post' action='preavaliaapr.php'>
				    <input type='hidden' name='code' value='$code2'>
				    <input type='hidden' name='nome' value='$nomeia'>
				    <input type='submit' class='btny' value='$prev2'
				    style='font-size:30px;color:white;margin-bottom:20px; width:750px;height:100px;background-color:#297c5f;text-aligment:center'>
				    
				    </form>
				    
				  ";
				    
				    
				    }
				}
					
					
					if($catotaapr==0){
				    print"<hr><br><div align='center' style='font-size:23'>Nenhuma pendência</div>";
				}
				
					
					?>
					
					
					<br>

				</ul>
				<br><br>
				<div align="center"><?php print'
<form method="post" action="talk.php"><input type="hidden" name="nome" value="'.$nomeia.'">'?><input type="image" src="talk.png" alt="oi" style="width: 500px; border:none;
	height: 80px;line-height: 80px;background-color: #98631c;color: white;margin-top: 5px;box-sizing: border-box;padding-left: 10px;margin-left: 10px;list-style-type: none;font-size:30px"></a><br><br>
</div>


<div align="center">
<a href="../../_edita/killemall.php"><li style="width: 500px;
	height: 80px;line-height: 80px;background-color: #e34f4f;color: white;margin-top: 5px;box-sizing: border-box;padding-left: 10px;margin-left: 10px;list-style-type: none;font-size:40px">Encerrar Sessão</li></a><br><br>
</div>

			</nav>
			
		</div>
	</body>
</html>



























