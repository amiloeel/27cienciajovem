<?php
	//session_start();
	include('../../../_autentica/coord/verifycoord.php');
	
include_once("../../../_autentica/proj/conexao.php");  //2


$sql = "select * from projetos where res1!=0 and res2!=0 and res3!=0 and nota1!=0 and nota2!=0 and nota3!=0";
$sql2="select codigo from projetos";


$consulta = mysqli_query($conexao2, $sql);
$consulta2 = mysqli_query($conexao2, $sql2);

$feitos = mysqli_num_rows($consulta);
$tudo = mysqli_num_rows($consulta2);
//print$todos;

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
   $newElement = array($IP[$x][1],$xxx);
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
   $newElement = array($IC[$x][1],$xxx);
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
   $newElement = array($DC[$x][1],$xxx);
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
   $newElement = array($DT[$x][1],$xxx);
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
   $newElement = array($FD[$x][1],$xxx);
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
   $newElement = array($ED[$x][1],$xxx);
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
   $newElement = array($WS[$x][1],$xxx);
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
				<h1>Resultados Gerais</h1>
			<hr>
				<h2 style="color:#444">Visualize aqui a classificação final dos projetos</h2>
				
				 
				
<?php
date_default_timezone_set("America/Recife");
$date = date("d/m/y");
$time = date("H");
$tudos = $time . "h" . date("i") . "min";
print'<h2 style="color:#444;font-size:13px">Última atualização às '.$tudos.' em '.$date.'</h2>';
print'<div align=center style="margin-top:-15px;margin-bottom:20px"><a href="gerais.php"><input type="button" value="ATUALIZAR" style="border:none;background-color:#2a578b;padding:5px;color:whitesmoke;font-size:12px"></a></div>';

?>



				
				
				<div align=center style="margin-right:10px">
				    <?php
				    
				    $um=($feitos/$tudo)*100;
				    $dois=($um/100)*500;
				    $tres=500-$dois;
				    $novoum = substr($um,0,4);
				    print"<article style='font-size:13px;background-color:#666;width:600px;border:none'><h5 style='font-size:16px;margin-bottom:5px;color:whitesmoke;font-weight:normal'>Progresso Total: <b>$novoum%</b></h5><hr><br>";
				    
				    
				    
				    print"<input type=button style='width:{$dois}px;background: linear-gradient(to right,darkgreen, green);color:white;border:none;height:30px;font-size:12px'>";
				    print"<input type=button style='width:{$tres}px;background: linear-gradient(to right,#444,#222);color:white;border:none;height:30px;font-size:12px'>";
				    
				    
				    
				    print"<h3 style='color:whitesmoke;font-size:13px;font-weight:normal;margin-top:10px'><b>$feitos</b> projetos com avaliação concluída</h3>";
				    
				    $falta=$tudo-$feitos;
				    print"<h3 style='color:whitesmoke;font-size:13px;margin-top:-30px;font-weight:normal;margin-bottom:10px'><b>$falta</b> projetos a concluir</h3>";			    print"</article>";
				    ?>
				    
				</div>
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:darkred;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:darkred'>INICIAÇÃO À PESQUISA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<5;$y++){
				        if(isset($IPFILTRO[$y][1])){
				        if($IPFILTRO[$y][1]!=0){
				            
				            if($y==0){
				                print"<img src='icons/1ip.png'>";print"<h3 style='color:#333; margin-bottom:3px'>";echo$IPFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$IPFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>"; 
				            }
				            else if($y==1){
				                print"<br><img src='icons/2ip.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$IPFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$IPFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==2){
				                print"<br><img src='icons/3ip.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$IPFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$IPFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==3){
                             print"<br><b>4º Lugar: ";echo$IPFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$IPFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }else if($y==4){
                             print"<br><b>5º Lugar: ";echo$IPFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$IPFILTRO[$y][1];print")</i><br><br>";     				        
				        }
				            
				        }$z++;
				    }}                
				    print"</article>";
				    ?>
				    
				</div>
				
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:deeppink;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:deeppink'>INCENTIVO À PESQUISA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<5;$y++){
				        if(isset($ICFILTRO[$y][1])){
				        if($ICFILTRO[$y][1]!=0){ if($y==0){
				                print"<img src='icons/1ic.png'>";print"<h3 style='color:#333; margin-bottom:3px'>";echo$ICFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$ICFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>"; 
				            }
				            else if($y==1){
				                print"<br><img src='icons/2ic.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$ICFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$ICFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==2){
				                print"<br><img src='icons/3ic.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$ICFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$ICFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==3){
                             print"<br><b>4º Lugar: ";echo$ICFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$ICFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }else if($y==4){
                             print"<br><b>5º Lugar: ";echo$ICFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$ICFILTRO[$y][1];print")</i><br><br>";     				        
				        }		        
				        }$z++;
				    }}
				    print"</article>";
				
				    ?>
				    
				</div>
				
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:darkblue;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:darkblue'>DIVULGAÇÃO CIENTÍFICA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<5;$y++){
				        if(isset($DCFILTRO[$y][1])){
				        if($DCFILTRO[$y][1]!=0){
				            
				            if($y==0){
				                print"<img src='icons/1dc.png'>";print"<h3 style='color:#333; margin-bottom:3px'>";echo$DCFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$DCFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>"; 
				            }
				            else if($y==1){
				                print"<br><img src='icons/2dc.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$DCFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$DCFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==2){
				                print"<br><img src='icons/3dc.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$DCFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$DCFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==3){
                             print"<br><b>4º Lugar: ";echo$DCFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$DCFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }else if($y==4){
                             print"<br><b>5º Lugar: ";echo$DCFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$DCFILTRO[$y][1];print")</i><br><br>";     				        
				        }
				        }$z++;
				    }}
				    print"</article>";
				
				    ?>
				    
				</div>
				
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:darkmagenta;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:darkmagenta'>DESENVOLVIMENTO TECNOLÓGICO</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<5;$y++){
				        if(isset($DTFILTRO[$y][1])){
				        if($DTFILTRO[$y][1]!=0){
				            
				            if($y==0){
				                print"<img src='icons/1dt.png'>";print"<h3 style='color:#333; margin-bottom:3px'>";echo$DTFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$DTFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>"; 
				            }
				            else if($y==1){
				                print"<br><img src='icons/2dt.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$DTFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$DTFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==2){
				                print"<br><img src='icons/3dt.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$DTFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$DTFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==3){
                             print"<br><b>4º Lugar: ";echo$DTFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$DTFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }else if($y==4){
                             print"<br><b>5º Lugar: ";echo$DTFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$DTFILTRO[$y][1];print")</i><br><br>";     				        
				        }
				        }$z++;
				    }}
				    print"</article>";
				
				    ?>
				    
				</div>
				
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:darkgreen;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:darkgreen'>TALENTOS INTERNACIONAIS</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<5;$y++){
				        if(isset($FDFILTRO[$y][1])){
				        if($FDFILTRO[$y][1]!=0){
				            
				            if($y==0){
				                print"<img src='icons/1fd.png'>";print"<h3 style='color:#333; margin-bottom:3px'>";echo$FDFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$FDFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>"; 
				            }
				            else if($y==1){
				                print"<br><img src='icons/2fd.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$FDFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$FDFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==2){
				                print"<br><img src='icons/3fd.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$FDFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$FDFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==3){
                             print"<br><b>4º Lugar: ";echo$FDFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$FDFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }else if($y==4){
                             print"<br><b>5º Lugar: ";echo$FDFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$FDFILTRO[$y][1];print")</i><br><br>";     				        
				        }
				        }$z++;
				    }}
				    print"</article>";
				
				    ?>
				    
				</div>
				
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:#916e1b;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:#916e1b'>EDUCAÇÃO CIENTÍFICA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<5;$y++){
				        if(isset($EDFILTRO[$y][1])){
				        if($EDFILTRO[$y][1]!=0){
				            
				            if($y==0){
				                print"<img src='icons/1ed.png'>";print"<h3 style='color:#333; margin-bottom:3px'>";echo$EDFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$EDFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>"; 
				            }
				            else if($y==1){
				                print"<br><img src='icons/2ed.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$EDFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$EDFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==2){
				                print"<br><img src='icons/3ed.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$EDFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$EDFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==3){
                             print"<br><b>4º Lugar: ";echo$EDFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$EDFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }else if($y==4){
                             print"<br><b>5º Lugar: ";echo$EDFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$EDFILTRO[$y][1];print")</i><br><br>";     				        
				        }
				        }$z++;
				    }}
				    print"</article>";
				
				    ?>
				    
				</div>
				
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>
				
				<div align=center style="background-color:#e66700;margin-right:10px">
				    <?php
				    print"<article style='font-size:13px'><h5 style='font-size:16px;margin-bottom:5px;color:#e66700'>WORKSHOP QUÍMICA</h5><hr><br>";
				    $z = 1;
				    for($y=0;$y<5;$y++){
				        if(isset($WSFILTRO[$y][1])){
				        
				        if($WSFILTRO[$y][1]!=0){
				            
				            if($y==0){
				                print"<img src='icons/1.png'>";print"<h3 style='color:#333; margin-bottom:3px'>";echo$WSFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$WSFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>"; 
				            }
				            else if($y==1){
				                print"<br><img src='icons/2.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$WSFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$WSFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==2){
				                print"<br><img src='icons/3.png' >";print"<h3 style='color:#333; margin-bottom:3px'>";echo$WSFILTRO[$y][0];print"</h3>";
                     
                             print"<i>          (Nota Final: ";echo$WSFILTRO[$y][1];print")</i>";                 
                             print"
                             <br><br><hr>";
				            }
				            else if($y==3){
                             print"<br><b>4º Lugar: ";echo$WSFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$WSFILTRO[$y][1];print")</i><br><br><hr>";    				        
				        }else if($y==4){
                             print"<br><b>5º Lugar: ";echo$WSFILTRO[$y][0];print"</b>";
                     
                             print"<br><i>(Nota Final: ";echo$WSFILTRO[$y][1];print")</i><br><br>";     				        
				        }
				        }$z++;
				    }}
				    print"</article>";
				
				    ?>
				    
				</div>
				
				<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div>
				<br>
				
			</section>
		</div>
	</body>
</html>