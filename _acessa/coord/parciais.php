<?php
	//session_start();
	include('../../../_autentica/coord/verifycoord.php');
	
include_once("../../../_autentica/proj/conexao.php");  //2


$sql = "select * from projetos";


$consulta = mysqli_query($conexao2, $sql);

$IP=array();$IC=array();$DT=array();$DC=array();$ED=array();$FD=array();$WS=array();

while($todos = mysqli_fetch_array($consulta)){
    switch($todos[2]){
        case 'IP' : array_push($IP,$todos);
        break;
        case 'IC' : array_push($IC,$todos);
        break;
        case 'DT' : array_push($DT,$todos);
        break;
        case 'DC' : array_push($DC,$todos);
        break;
        case 'FD' : array_push($FD,$todos);
        break;
        case 'ED' : array_push($ED,$todos);
        break;
        case 'WS' : array_push($WS,$todos);
        break;
    }
}

$IPFILTRO=array();
for($x=0;$x<count($IP);$x++){
   $contIP=6;
   $resT = ($IP[$x][7]+$IP[$x][8]+$IP[$x][9])/3;
   if($IP[$x][17]){
      $resT = $resT+(8.3);
   }
   $notaT = ($IP[$x][11]+$IP[$x][12]+$IP[$x][13])/3;
   $xxx = ($resT+$notaT)/2;
   if($IP[$x][7]!=0){
       $contIP--;
   }if($IP[$x][8]!=0){
       $contIP--;
   }if($IP[$x][9]!=0){
       $contIP--;
   }if($IP[$x][11]!=0){
       $contIP--;
   }if($IP[$x][12]!=0){
       $contIP--;
   }if($IP[$x][13]!=0){
       $contIP--;
   }
   $newElement = array($IP[$x][1],$xxx,$contIP);
   array_push($IPFILTRO,$newElement);
}

usort($IPFILTRO, function ($a, $b) {
  $a_val = (float) $a[1];
  $b_val = (float) $b[1];

  if($a_val > $b_val) return -1;
  if($a_val < $b_val) return 1;
  return 0;
});

$ICFILTRO=array();
for($x=0;$x<count($IC);$x++){
   $contIC=6;        
   $resT = ($IC[$x][7]+$IC[$x][8]+$IC[$x][9])/3;
   if($IC[$x][17]){
      $resT = $resT+(8.3);
   }
   $notaT = ($IC[$x][11]+$IC[$x][12]+$IC[$x][13])/3;
   $xxx = ($resT+$notaT)/2;
   if($IC[$x][7]!=0){
       $contIC--;
   }if($IC[$x][8]!=0){
       $contIC--;
   }if($IC[$x][9]!=0){
       $contIC--;
   }if($IC[$x][11]!=0){
       $contIC--;
   }if($IC[$x][12]!=0){
       $contIC--;
   }if($IC[$x][13]!=0){
       $contIC--;
   }
   $newElement = array($IC[$x][1],$xxx,$contIC);
   array_push($ICFILTRO,$newElement);
}

usort($ICFILTRO, function ($a, $b) {
  $a_val = (float) $a[1];
  $b_val = (float) $b[1];

  if($a_val > $b_val) return -1;
  if($a_val < $b_val) return 1;
  return 0;
});

$DCFILTRO=array();
for($x=0;$x<count($DC);$x++){
    $contDC=6;
   $resT = ($DC[$x][7]+$DC[$x][8]+$DC[$x][9])/3;
   if($DC[$x][17]){
      $resT = $resT+(8.3);
   }
   $notaT = ($DC[$x][11]+$DC[$x][12]+$DC[$x][13])/3;
   $xxx = ($resT+$notaT)/2;
   if($DC[$x][7]!=0){
       $contDC--;
   }if($DC[$x][8]!=0){
       $contDC--;
   }if($DC[$x][9]!=0){
       $contDC--;
   }if($DC[$x][11]!=0){
       $contDC--;
   }if($DC[$x][12]!=0){
       $contDC--;
   }if($DC[$x][13]!=0){
       $contDC--;
   }
   $newElement = array($DC[$x][1],$xxx,$contDC);
   array_push($DCFILTRO,$newElement);
}

usort($DCFILTRO, function ($a, $b) {
  $a_val = (float) $a[1];
  $b_val = (float) $b[1];

  if($a_val > $b_val) return -1;
  if($a_val < $b_val) return 1;
  return 0;
});

$DTFILTRO=array();
for($x=0;$x<count($DT);$x++){
    $contDT=6; 
   $resT = ($DT[$x][7]+$DT[$x][8]+$DT[$x][9])/3;
   if($DT[$x][17]){
      $resT = $resT+(8.3);
   }
   $notaT = ($DT[$x][11]+$DT[$x][12]+$DT[$x][13])/3;
   $xxx = ($resT+$notaT)/2;
   if($DT[$x][7]!=0){
       $contDT--;
   }if($DT[$x][8]!=0){
       $contDT--;
   }if($DT[$x][9]!=0){
       $contDT--;
   }if($DT[$x][11]!=0){
       $contDT--;
   }if($DT[$x][12]!=0){
       $contDT--;
   }if($DT[$x][13]!=0){
       $contDT--;
   }
   $newElement = array($DT[$x][1],$xxx,$contDT);
   array_push($DTFILTRO,$newElement);
}

usort($DTFILTRO, function ($a, $b) {
  $a_val = (float) $a[1];
  $b_val = (float) $b[1];

  if($a_val > $b_val) return -1;
  if($a_val < $b_val) return 1;
  return 0;
});

$FDFILTRO=array();
for($x=0;$x<count($FD);$x++){
    $contFD=6;
   $resT = ($FD[$x][7]+$FD[$x][8]+$FD[$x][9])/3;
   if($FD[$x][17]){
      $resT = $resT+(8.3);
   }
   $notaT = ($FD[$x][11]+$FD[$x][12]+$FD[$x][13])/3;
   $xxx = ($resT+$notaT)/2;
   if($FD[$x][7]!=0){
       $contFD--;
   }if($FD[$x][8]!=0){
       $contFD--;
   }if($FD[$x][9]!=0){
       $contFD--;
   }if($FD[$x][11]!=0){
       $contFD--;
   }if($FD[$x][12]!=0){
       $contFD--;
   }if($FD[$x][13]!=0){
       $contFD--;
   }
   $newElement = array($FD[$x][1],$xxx,$contFD);
   array_push($FDFILTRO,$newElement);
}

usort($FDFILTRO, function ($a, $b) {
  $a_val = (float) $a[1];
  $b_val = (float) $b[1];

  if($a_val > $b_val) return -1;
  if($a_val < $b_val) return 1;
  return 0;
});

$EDFILTRO=array();
for($x=0;$x<count($ED);$x++){
    $contED=6;
   $resT = ($ED[$x][7]+$ED[$x][8]+$ED[$x][9])/3;
   if($ED[$x][17]){
      $resT = $resT+(8.3);
   }
   $notaT = ($ED[$x][11]+$ED[$x][12]+$ED[$x][13])/3;
   $xxx = ($resT+$notaT)/2;
   if($ED[$x][7]!=0){
       $contED--;
   }if($ED[$x][8]!=0){
       $contED--;
   }if($ED[$x][9]!=0){
       $contED--;
   }if($ED[$x][11]!=0){
       $contED--;
   }if($ED[$x][12]!=0){
       $contED--;
   }if($ED[$x][13]!=0){
       $contED--;
   }
   $newElement = array($ED[$x][1],$xxx,$contED);
   array_push($EDFILTRO,$newElement);
}

usort($EDFILTRO, function ($a, $b) {
  $a_val = (float) $a[1];
  $b_val = (float) $b[1];

  if($a_val > $b_val) return -1;
  if($a_val < $b_val) return 1;
  return 0;
});

$WSFILTRO=array();
for($x=0;$x<count($WS);$x++){
    $contWS=6;
   $resT = ($WS[$x][7]+$WS[$x][8]+$WS[$x][9])/3;
   if($WS[$x][17]){
      $resT = $resT+(8.3);
   }
   $notaT = ($WS[$x][11]+$WS[$x][12]+$WS[$x][13])/3;
   $xxx = ($resT+$notaT)/2;
   if($WS[$x][7]!=0){
       $contWS--;
   }if($WS[$x][8]!=0){
       $contWS--;
   }if($WS[$x][9]!=0){
       $contWS--;
   }if($WS[$x][11]!=0){
       $contWS--;
   }if($WS[$x][12]!=0){
       $contWS--;
   }if($WS[$x][13]!=0){
       $contWS--;
   }
   $newElement = array($WS[$x][1],$xxx,$contWS);
   array_push($WSFILTRO,$newElement);
}

usort($WSFILTRO, function ($a, $b) {
  $a_val = (float) $a[1];
  $b_val = (float) $b[1];

  if($a_val > $b_val) return -1;
  if($a_val < $b_val) return 1;
  return 0;
});

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
	</head>
	<body>
		<div class="container">
			<nav><br><a href="coordmain.php"><img src="../../y2.png" style="margin-left: 12px;"></a>
				<br><br>
				<ul class="menu">
					
					<br><b>CADASTRO</b><img src="icons/a.png" style="margin-left:45px;margin-right:-80px;margin-bottom:-4px"><br><br>
					<a href="../../_add/proj/addproj.php"><li>Projeto</li></a>
					<a href="../../_add/user/adduserA.php"><li>Usuário</li></a><br>
				</ul>
				<ul class="menu">
					<br><b>CONSULTAS</b><img src="icons/b.png" style="margin-left:45px;margin-right:-80px;margin-bottom:-4px"><br><br>
					<a href="../../_visualiza/proj/consulta.php"><li>Projetos</li></a>
					<a href="../../_visualiza/user/consultaUser.php" disabled><li>Usuários</li></a><br>	

				</ul>
				<ul class="menu">
					<br><b>LINKS</b><img src="icons/c.png" style="margin-left:65px;margin-right:-100px;margin-bottom:-4px"><br><br>
					<a href="../../_links/resumo/linkres.php"><li>Resumo</li></a>
					<a href="../../_links/apresentação/linkapr.php" disabled><li>Apresentação</li></a><br>	

				</ul>
				<ul class="menu">
					<br><b>AVALIAÇÕES</b><img src="icons/d.png" style="margin-left:45px;margin-right:-70px;margin-bottom:-4px"><br><br>
					<a href="../../_cruza/resumo/cruzares.php"><li>Resumo</li></a>
					<a href="../../_cruza/apresentação/cruzaapr.php" disabled><li>Apresentação</li></a><br>	

				</ul>
				
				<ul class="menu" style="background-color:#2a578b;border-style: solid;border-color:#333">
				    <br><b>RESULTADOS</b><img src="icons/e.png" style="margin-left:45px;margin-right:-70px;margin-bottom:-5px"><br><br>
				<a href="parciais.php"><li style="background-color: #333;width:254px">Parciais</li></a>
				<a href="gerais.php"><li style="background-color: #333;width:254px">Gerais</li></a><br>
	            </ul>
	
	<a href="../../_edita/killemall.php"><li style="width: 260px;
	height: 50px;line-height: 50px;background-color: #e34f4f;color: white;margin-top: 5px;box-sizing: border-box;padding-left: 10px;text-align:center;margin-left: 10px;list-style-type: none;">Encerrar Sessão</li></a><br>
			</nav>
			<section>
				<h1>Parciais</h1>
			<hr>
				<h2 style="color:#444">Visualize aqui os 10 mais bem votados projetos de cada categoria até então!</h2>
				<h2 style="color:red;font-size:12px">Atenção, esses dados são momentâneos e não devem ser utilizados <br>como critério de classificação final até que todas as avaliações sejam realizadas.</h2>
				
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:darkred;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:darkred'>INICIAÇÃO À PESQUISA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<10;$y++){
				        if($IPFILTRO[$y][1]!=0){
				            switch($IPFILTRO[$y][2]){
				                 case '6' : print'<img src="progress/0.jpg"><br>';
                                 break;
                                 case '5' : print'<img src="progress/1.jpg"><br>';
                                 break;
                                 case '4' : print'<img src="progress/2.jpg"><br>';
                                 break;
                                 case '3' : print'<img src="progress/3.jpg"><br>';
                                 break;
                                 case '2' : print'<img src="progress/4.jpg"><br>';
                                 break;
                                 case '1' : print'<img src="progress/5.jpg"><br>';
                                 break;
                                 case '0' : print'<img src="progress/6.jpg"><br>';
                                 break;
                             }
                             print"<b>$z";print"º: ";echo$IPFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Parcial: ";echo$IPFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }$z++;
				    }
				    print"</article>";
				    
				    ?>
				    
				</div>
				
			<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:deeppink;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:deeppink'>INCENTIVO À PESQUISA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<10;$y++){
				        if($ICFILTRO[$y][1]!=0){
				             switch($ICFILTRO[$y][2]){
				                 case '6' : print'<img src="progress/0.jpg"><br>';
                                 break;
                                 case '5' : print'<img src="progress/1.jpg"><br>';
                                 break;
                                 case '4' : print'<img src="progress/2.jpg"><br>';
                                 break;
                                 case '3' : print'<img src="progress/3.jpg"><br>';
                                 break;
                                 case '2' : print'<img src="progress/4.jpg"><br>';
                                 break;
                                 case '1' : print'<img src="progress/5.jpg"><br>';
                                 break;
                                 case '0' : print'<img src="progress/6.jpg"><br>';
                                 break;
                             }
                             print"<b>$z";print"º: ";echo$ICFILTRO[$y][0];print"</b><br><i>(Nota Parcial: ";echo$ICFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }$z++;
				    }
				    print"</article>";
				
				    ?>
				    
				</div>
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:darkblue;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:darkblue'>DIVULGAÇÃO CIENTÍFICA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<10;$y++){
				        if($DCFILTRO[$y][1]!=0){
				            switch($DCFILTRO[$y][2]){
				                 case '6' : print'<img src="progress/0.jpg"><br>';
                                 break;
                                 case '5' : print'<img src="progress/1.jpg"><br>';
                                 break;
                                 case '4' : print'<img src="progress/2.jpg"><br>';
                                 break;
                                 case '3' : print'<img src="progress/3.jpg"><br>';
                                 break;
                                 case '2' : print'<img src="progress/4.jpg"><br>';
                                 break;
                                 case '1' : print'<img src="progress/5.jpg"><br>';
                                 break;
                                 case '0' : print'<img src="progress/6.jpg"><br>';
                                 break;
                             }
                             print"<b>$z";print"º: ";echo$DCFILTRO[$y][0];print"</b><br><i>(Nota Parcial: ";echo$DCFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }$z++;
				    }
				    print"</article>";
				
				    ?>
				    
				</div>
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:darkmagenta;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:darkmagenta'>DESENVOLVIMENTO TECNOLÓGICO</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<10;$y++){
				        if($DTFILTRO[$y][1]!=0){
				             switch($DTFILTRO[$y][2]){
				                 case '6' : print'<img src="progress/0.jpg"><br>';
                                 break;
                                 case '5' : print'<img src="progress/1.jpg"><br>';
                                 break;
                                 case '4' : print'<img src="progress/2.jpg"><br>';
                                 break;
                                 case '3' : print'<img src="progress/3.jpg"><br>';
                                 break;
                                 case '2' : print'<img src="progress/4.jpg"><br>';
                                 break;
                                 case '1' : print'<img src="progress/5.jpg"><br>';
                                 break;
                                 case '0' : print'<img src="progress/6.jpg"><br>';
                                 break;
                             }
                             print"<b>$z";print"º: ";echo$DTFILTRO[$y][0];print"</b><br><i>(Nota Parcial: ";echo$DTFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }$z++;
				    }
				    print"</article>";
				
				    ?>
				    
				</div>
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:darkgreen;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:darkgreen'>TALENTOS INTERNACIONAIS</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<10;$y++){
				        if($FDFILTRO[$y][1]!=0){
				            switch($FDFILTRO[$y][2]){
				                 case '6' : print'<img src="progress/0.jpg"><br>';
                                 break;
                                 case '5' : print'<img src="progress/1.jpg"><br>';
                                 break;
                                 case '4' : print'<img src="progress/2.jpg"><br>';
                                 break;
                                 case '3' : print'<img src="progress/3.jpg"><br>';
                                 break;
                                 case '2' : print'<img src="progress/4.jpg"><br>';
                                 break;
                                 case '1' : print'<img src="progress/5.jpg"><br>';
                                 break;
                                 case '0' : print'<img src="progress/6.jpg"><br>';
                                 break;
                             }
                             print"<b>$z";print"º: ";echo$FDFILTRO[$y][0];print"</b><br><i>(Nota Parcial: ";echo$FDFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }$z++;
				    }
				    print"</article>";
				
				    ?>
				    
				</div>
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:#916e1b;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:#916e1b'>EDUCAÇÃO CIENTÍFICA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<10;$y++){
				        if($EDFILTRO[$y][1]!=0){
				            switch($EDFILTRO[$y][2]){
				                 case '6' : print'<img src="progress/0.jpg"><br>';
                                 break;
                                 case '5' : print'<img src="progress/1.jpg"><br>';
                                 break;
                                 case '4' : print'<img src="progress/2.jpg"><br>';
                                 break;
                                 case '3' : print'<img src="progress/3.jpg"><br>';
                                 break;
                                 case '2' : print'<img src="progress/4.jpg"><br>';
                                 break;
                                 case '1' : print'<img src="progress/5.jpg"><br>';
                                 break;
                                 case '0' : print'<img src="progress/6.jpg"><br>';
                                 break;
                             }
                             print"<b>$z";print"º: ";echo$EDFILTRO[$y][0];print"</b><br><i>(Nota Parcial: ";echo$EDFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }$z++;
				    }
				    print"</article>";
				
				    ?>
				    
				</div>
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:#e66700;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:#e66700'>WORKSHOP QUÍMICA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<10;$y++){
				        switch($WSFILTRO[$y][2]){
				                 case '6' : print'<img src="progress/0.jpg"><br>';
                                 break;
                                 case '5' : print'<img src="progress/1.jpg"><br>';
                                 break;
                                 case '4' : print'<img src="progress/2.jpg"><br>';
                                 break;
                                 case '3' : print'<img src="progress/3.jpg"><br>';
                                 break;
                                 case '2' : print'<img src="progress/4.jpg"><br>';
                                 break;
                                 case '1' : print'<img src="progress/5.jpg"><br>';
                                 break;
                                 case '0' : print'<img src="progress/6.jpg"><br>';
                                 break;
                             }
				        if($WSFILTRO[$y][1]!=0){
                             print"<b>$z";print"º: ";echo$WSFILTRO[$y][0];print"</b><br><i>(Nota Parcial: ";echo$WSFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }$z++;
				    }
				    print"</article>";
				
				    ?>
				    
				</div>
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div>
				<br>
				
			</section>
		</div>
	</body>
</html>