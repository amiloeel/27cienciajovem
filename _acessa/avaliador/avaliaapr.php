<?php

	include('../../../_autentica/avaliador/verifyava.php');
	include('../../../_autentica/cruza/conexao.php');
    
    $code=$_POST['code'];
    $nomeia=$_POST['nome'];

	$sqlres="select id,projeto,fim from apr where id='$code'";
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
					
					<br><b><div align="center" style="font-size:45px"><?php $firstName = substr($nomeia,0,strpos($nomeia," "));print $firstName; ?> avaliando apresentação:</div><br></b>
				
					<?php
					
					$getCat = "select cat from projetos where codigo='$code'";
					$doCat = mysqli_query($conexao,$getCat);
					$cat = mysqli_fetch_array($doCat)[0];
					//print"$cat";
					
				
				    $code=$res[0];
				    $proj=$res[1];
				    $go=$res[2];
				    
				    $p1 = "O trabalho é adequado à categoria para a qual se inscreve?";
				    $p2 = "A apresentação oral foi clara e explicita o objetivo, procedimento e conclusões do trabalho?";
				    $p3 = "Os alunos entendem e estão aptos a explicar os diferentes aspectos do projeto?";
				    $p4 = "O projeto é original e demonstra criatividade na questão levantada?";
				    $p5 = "A determinação do problema e o objetivo da pesquisa estão claros?";
				    $p6 = "O projeto enfoca um problema relevante?";
				    $p7 = "Os procedimentos são adequados aos objetivos da pesquisa?";
				    $p8 = "Os dados levantados são suficientes?";
				    $p9 = "A explicação do projeto apresentada em vídeo é simples e de fácil entendimento?";
				    $p10 = "O vídeo do projeto esclarece as etapas metodológicas e resultados de maneira clara e objetiva?";
				    
				    if($cat=='ED'){
				        $p1 = "O trabalho especifica o contexto que gerou o tema?";
    				    $p2 = "Considera o conhecimento dos alunos na elaboração do processo de ensino-aprendizagem?";
    				    $p3 = "O professor possui domínio conceitual dos conteúdos trabalhados?";
    				    $p4 = "Especifica os modos como o problema foi estudado?";
    				    $p5 = "Adota uma perspectiva formativa no processo de ensino-aprendizagem?";
    				    $p6 = "Estimula as atividades de pesquisa pelos alunos em sala de aula?";
    				    $p7 = "Desenvolve e/ou propõe estratégias de intervenção na realidade com base no conhecimento produzido?";
    				    $p8 = "Utiliza recursos materiais e didáticos de modo a possibilitar uma aprendizagem mais significativa pelos alunos?";
				    }
				    if($cat=='DT'){
				        $p4 = "A solução é inovadora?";
    				    $p5 = "Foi construído algum produto e/ou equipamento/protótipo funcional?";
    				    $p6 = "A solução teria aplicação e/ou viabilidade comercial?";
    				    $p7 = "A solução foi testada em escala de laboratórios, ambientes ou situações reais?";
    				    $p8 = "O produto parte demanda advinda de uma necessidade social?";
				    }
				
				    
				    print"
				    <div align='center' style='margin-bottom:20px'><article style='width:750px;font-size:40px;height:auto;background-color:#333'>";
				    
				    print"$proj";
				    
				    
				    
				    print"</article></div>";
				    
				    print'<form method="post" action="finalizaX.php" id="666">
				    <input type="hidden" name="code" value="'.$code.'">
				    <input type="hidden" name="nome" value="'.$nomeia.'">
				    <input type="hidden" name="proj" value="'.$proj.'">';
				    
				
					
					print"<div align='center'><article style='color:black;font-size:42px'>
					
					<b><br>1) $p1</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="primeira" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"

</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>2) $p2</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="segunda" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>3) $p3</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="terceira" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
					
					
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>4) $p4</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="quarta" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>5) $p5</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="quinta" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>6) $p6</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="sexta" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>7) $p7</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="setima" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>8) $p8</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="oitava" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>9) $p9</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="nona" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>10) $p10</b><br><br>";
					
					print'<img src="down.png" style="margin-bottom:-20px;margin-right:15px"><input type="range" min="10" max="50" value="30" step="10" class="slider" id="myRange" name="decima" ><img src="up.png" style="margin-bottom:-20px;margin-left:15px"><br><img src="class.png"><br>';print"
</article><br>";
					
					print"<article style='color:black;font-size:42px'>
					
					<b><br>11) Faça um breve comentário sobre o projeto avaliado:</b><br><br>

<div align=center >
                    
                    <textarea form='666' name='onzima' maxlength='290' rows='5' required style='font-size:40px; width:700px; '></textarea>
					
					</div><br></article><br>";
					
					
					
				
					
					?>
					<br>
					<input type="submit" value="Finalizar Avaliação!" style="width: 500px;
	height: 80px;background-color: green;color: white;border:none;font-size:40px"><br><br></form>
				</ul>
				
				
				<div align="center">
				    
				    
<a href="avamain.php"><li style="width: 200px;
	height: 80px;line-height: 80px;background-color: #333;color: white;margin-top: 15px;box-sizing: border-box;list-style-type: none;font-size:20px">Cancelar</li></a>
</div>
			</nav>
			<section class="sec2">
				
	

			</section>
		</div>
	</body>
</html>
