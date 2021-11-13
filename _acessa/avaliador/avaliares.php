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
		<style>
		    .big{ width: 2.5em; height: 2.5em; }
		    
		    .slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 75%;
  height: 30px;
  border-radius: 50px; 
  background: linear-gradient(to right, red, green);
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  border:solid 3px black;
  width: 70px;
  border-radius: 50%; 
  height:70px;
  background: white;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
   border-radius: 50%;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}

		</style>
	</head>
	<body><br><br><br>
		<div class="containernovo">
			<nav class="novonav"><br><img src="../../y.png" style="margin-left:20%;width:500px">
				<br><br>
				
				
				
				
				<ul class="menu2" style="background-color:#666;width:800px;margin-left:2%">
					
					<br><b><div align="center" style="font-size:45px"><?php $firstName = substr($nomeia,0,strpos($nomeia," "));print $firstName; ?> avaliando resumo:</div><br></b>
				
					<?php
					
				
				    $code=$res[0];
				    $proj=$res[1];
				    $go=$res[2];
				
				    
				    print"
				    <div align='center' style='margin-bottom:20px'><article style='width:750px;font-size:40px;height:auto;background-color:#333'>";
				    
				    print"$proj";
				    
				    
				    
				    print"</article></div>";
				    
				    print'<form method="post" action="finaliza.php">
				    <input type="hidden" name="code" value="'.$code.'">
				    <input type="hidden" name="nome" value="'.$nomeia.'">
				    <input type="hidden" name="proj" value="'.$proj.'">';
				    
				
					
					print"<div align='center'><article style='color:black;font-size:42px'>
					
					<b><br>1) O estilo da redação respeita os padrões redacionais e está adequado ao gênero
'resumo de texto científico'?</b><br><br>";

	print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="primeira" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"

</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>2) O projeto é original e demonstra criatividade na questão que levanta?</b><br><br>";

                    print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="segunda" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>3) A definição do problema está clara e enfoca um problema relevante?</b><br><br>";

                    print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="terceira" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>4) As fases do trabalho ou procedimentos descritos são adequadas aos objetivos da
pesquisa?</b><br><br>";

                    print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="quarta" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>5) Os resultados estão claros e são suficientes para sustentar as conclusões?</b><br><br>";
                    
                    print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="quinta" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"

</article><br>";
				
					
					?>
					<br>
					<input type="submit" value="Finalizar Avaliação!" style="width: 500px;
	height: 80px;background-color: green;color: white;border:none;font-size:40px"><br><br></form>
				</ul>
				
				
				<div align="center">
				    
				    
<a href="avamain.php"><li style="width: 200px;
	height: 80px;line-height: 80px;background-color: #333;color: white;margin-top: 15px;box-sizing: border-box;list-style-type: none;font-size:25px">Cancelar</li></a>
</div>
			</nav>
			<section class="sec2">
				
	

			</section>
		</div>
	</body>
</html>
