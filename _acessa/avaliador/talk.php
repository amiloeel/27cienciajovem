<?php

	include('../../../_autentica/avaliador/verifyava.php');
	include('../../../_autentica/cruza/conexao.php');
    
    $nomeia=$_POST['nome'];
    
   
	
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
		<style>
		    .big{ width: 2.5em; height: 2.5em; }
		</style>
	</head>
	<body><br><br><br>
		<div class="containernovo">
			<nav class="novonav"><br><img src="../../y.png" style="margin-left:20%;width:500px">
				<br><br>
				<div align="center"><br>
				<h3 style="font-size:30px;margin:10px">Utilize esse espaço para registrar qualquer dúvida, sugestão, elogio ou reclamação sobre o nosso site de avaliações:</h3><br>
			<?php print '<form method="post" action="dotalk.php" id="talker">';?>
			<?php print "
				 <input type='hidden' name='nome' value='$nomeia'>
				<textarea form='talker' name='aqui' maxlength='500' rows='5' required style='font-size:40px; width:750px;background-color:#aaa'></textarea>";?>
				
				
				</div>
				
				
				
				<div align="center">
				    <br>
			<br>	    
			<input type="submit" value="Enviar" style="width: 500px;
	height: 80px;background-color:#297c5f;color: white;border:none;font-size:40px"></form><br><br>
<a href="avamain.php"><li style="width: 200px;
	height: 80px;line-height: 80px;background-color: #333;color: white;margin-top: 15px;box-sizing: border-box;list-style-type: none;font-size:20px">Cancelar</li></a><br>
</div>
			</nav>
			
			<nav class='novonav' style="margin-top:130px;background-color:#333">
			    <h3 style="margin-top:50px;color:#666">Desenvolvido por Leandro Lima</h3>
			    <h3 style="margin-top:50px;color:#999;margin-top:-10px">leandroqlima@gmail.com</h3>
			    <div align=center>
			        <a href="https://linkedin.com/in/leandro-lima-572953191"><img src='in.png'></a>
			        <a href="https://api.whatsapp.com/send?phone=+5581997032166"><img src='wp.png'></a>
			        <a href="https://facebook.com/profile.php?id=100051477075502"><img src='fb.png'></a>
			        <a href="https://instagram.com/amiloeel"><img src='ig.png'></a><br><br>
			    </div>
			    
			</nav>
			
		</div>
	</body>
</html>
