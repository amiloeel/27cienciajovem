<?php
	//session_start();
	include('../../../_autentica/coord/verifycoord.php');
	
include_once("../../../_autentica/proj/conexao.php");  //2

include_once("../../../_autentica/cruza/conexao.php"); //0

include_once("../../../_autentica/user/conexaoUser.php"); //3

$sql = "select cat,pre,pais,estado from projetos";
$sql2 = "select a,b,c from apr";
$sql3 = "select a,b,c from res";
$sql4 = "select id,comp1,comp2,comp3,comp4,comp5 from avaliadores";
$sql5 = "select id from coord";



$consulta = mysqli_query($conexao2, $sql);
$consulta2 = mysqli_query($conexao, $sql2);
$consulta3 = mysqli_query($conexao, $sql3);
$consulta4 = mysqli_query($conexao3, $sql4);
$consulta5 = mysqli_query($conexao3, $sql5);

$contaproj = mysqli_num_rows($consulta);


$contava = mysqli_num_rows($consulta4);

$contacoord = mysqli_num_rows($consulta5);
$coord = mysqli_fetch_array($consulta5);


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
				<div align=center><img src="bar.jpg" style="float:left;margin-right:-220px;margin-top:17px"><h1>Painel do Coordenador</h1><img src="bar2.jpg" style="float:right;margin-right:10px;margin-top:-35px"></div>
				<hr>
				<h2 style="margin-bottom:0px;color:#2a578b">Seja bem vind@ <?php $firstName = substr($_SESSION['nome'],0,strpos($_SESSION['nome']," "));print $firstName . "!"; 
				    print"<br><div align=center><h5 style='font-size:12px;margin-top:5px'>Para acessar esse painel basta clicar no logotipo da Ciência Jovem no canto superior esquerdo do site!</h5></div>";
				?></h2>
				<br>
				
				<?php
				$contares=mysqli_num_rows($consulta3)*3;
				$contaapr=mysqli_num_rows($consulta2)*3;
				$resx=0;
				$aprx=0;
				
				while($res = mysqli_fetch_array($consulta3)){
				    if($res[0]==0){
				        $resx++;
				    }if($res[1]==0){
				        $resx++;
				    }if($res[2]==0){
				        $resx++;
				    }
				}
				
				while($apr = mysqli_fetch_array($consulta2)){
				    if($apr[0]==0){
				        $aprx++;
				    }if($apr[1]==0){
				        $aprx++;
				    }if($apr[2]==0){
				        $aprx++;
				    }
				}
				
				$ip=0;$dt=0;$dc=0;$fd=0;$ic=0;$ed=0;$ws=0;
				$pre=0;
				$estados=[['Pernambuco','0'],['Acre','0'],['Alagoas','0'],['Amapá','0'],['Amazonas','0'],['Bahia','0'],['Ceará','0'],['Espírito Santo','0'],['Goiás','0'],['Maranhão','0'],['Mato Grosso','0'],['Mato Grosso do Sul','0'],['Minas Gerais','0'],['Pará','0'],['Paraíba','0'],['Paraná','0'],['Piauí','0'],['Rio de Janeiro','0'],['Rio Grande do Norte','0'],['Rio Grande do Sul','0'],['Rondônia','0'],['Roraima','0'],['Santa Catarina','0'],['São Paulo','0'],['Sergipe','0'],['Tocantins','0'],['Distrito Federal','0'],['Erro','0']];
				$mex=0;$col=0;$tur=0;$par=0;$arg=0;
				
				while($proj=mysqli_fetch_array($consulta)){
				    $no=0;
                    if($proj[0]=="IP"){
                        $ip++;
                    }else if($proj[0]=="IC"){
                        $ic++;
                    }else if($proj[0]=="DT"){
                        $dt++;
                    }else if($proj[0]=="DC"){
                        $dc++;
                    }else if($proj[0]=="FD"){
                        $fd++;
                        $no=1;
                    }else if($proj[0]=="ED"){
                        $ed++;
                    }else if($proj[0]=="WS"){
                        $ws++;
                    }
                    
                    if($proj[1]=="1"){
                        $pre++;
                    }
                    
                    if($no=="0"){
                       switch ($proj[3]){
                           case "Pernambuco":if(!isset($estados[0][0])){
                               $estados[0][0]=$proj[3];
                               $estados[0][1]=1;}else{
                                   $estados[0][1]=($estados[0][1])+1;
                               }break;
                           case "Acre":if(!isset($estados[1][0])){
                               $estados[1][0]=$proj[3];
                               $estados[1][1]=1;}else{
                                   $estados[1][1]=($estados[1][1])+1;
                               }break;
                               case "Alagoas":if(!isset($estados[2][0])){
                               $estados[2][0]=$proj[3];
                               $estados[2][1]=1;}else{
                                   $estados[2][1]=($estados[2][1])+1;
                               }break;
                               case "Amapá":if(!isset($estados[3][0])){
                               $estados[3][0]=$proj[3];
                               $estados[3][1]=1;}else{
                                   $estados[3][1]=($estados[3][1])+1;
                               }break;
                               case "Amazonas":if(!isset($estados[4][0])){
                               $estados[4][0]=$proj[3];
                               $estados[4][1]=1;}else{
                                   $estados[4][1]=($estados[4][1])+1;
                               }break;
                               case "Bahia":if(!isset($estados[5][0])){
                               $estados[5][0]=$proj[3];
                               $estados[5][1]=1;}else{
                                   $estados[5][1]=($estados[5][1])+1;
                               }break;
                               case "Ceará":if(!isset($estados[6][0])){
                               $estados[6][0]=$proj[3];
                               $estados[6][1]=1;}else{
                                   $estados[6][1]=($estados[6][1])+1;
                               }break;
                               case "Espírito Santo":if(!isset($estados[7][0])){
                               $estados[7][0]=$proj[3];
                               $estados[7][1]=1;}else{
                                   $estados[7][1]=($estados[7][1])+1;
                               }break;
                               case "Goiás":if(!isset($estados[8][0])){
                               $estados[8][0]=$proj[3];
                               $estados[8][1]=1;}else{
                                   $estados[8][1]=($estados[8][1])+1;
                               }break;
                               case "Maranhão":if(!isset($estados[9][0])){
                               $estados[9][0]=$proj[3];
                               $estados[9][1]=1;}else{
                                   $estados[9][1]=($estados[9][1])+1;
                               }break;
                               case "Mato Grosso":if(!isset($estados[10][0])){
                               $estados[10][0]=$proj[3];
                               $estados[10][1]=1;}else{
                                   $estados[10][1]=($estados[10][1])+1;
                               }break;
                               case "Mato Grosso do Sul":if(!isset($estados[11][0])){
                               $estados[11][0]=$proj[3];
                               $estados[11][1]=1;}else{
                                   $estados[11][1]=($estados[11][1])+1;
                               }break;
                               case "Minas Gerais":if(!isset($estados[12][0])){
                               $estados[12][0]=$proj[3];
                               $estados[12][1]=1;}else{
                                   $estados[12][1]=($estados[12][1])+1;
                               }break;
                               case "Pará":if(!isset($estados[13][0])){
                               $estados[13][0]=$proj[3];
                               $estados[13][1]=1;}else{
                                   $estados[13][1]=($estados[13][1])+1;
                               }break;
                               case "Paraíba":if(!isset($estados[14][0])){
                               $estados[14][0]=$proj[3];
                               $estados[14][1]=1;}else{
                                   $estados[14][1]=($estados[14][1])+1;
                               }break;
                               case "Paraná":if(!isset($estados[15][0])){
                               $estados[15][0]=$proj[3];
                               $estados[15][1]=1;}else{
                                   $estados[15][1]=($estados[15][1])+1;
                               }break;
                               case "Piauí":if(!isset($estados[16][0])){
                               $estados[16][0]=$proj[3];
                               $estados[16][1]=1;}else{
                                   $estados[16][1]=($estados[16][1])+1;
                               }break;
                               case "Rio de Janeiro":if(!isset($estados[17][0])){
                               $estados[17][0]=$proj[3];
                               $estados[17][1]=1;}else{
                                   $estados[17][1]=($estados[17][1])+1;
                               }break;
                               case "Rio Grande do Norte":if(!isset($estados[18][0])){
                               $estados[18][0]=$proj[3];
                               $estados[18][1]=1;}else{
                                   $estados[18][1]=($estados[18][1])+1;
                               }break;
                               case "Rio Grande do Sul":if(!isset($estados[19][0])){
                               $estados[19][0]=$proj[3];
                               $estados[19][1]=1;}else{
                                   $estados[19][1]=($estados[19][1])+1;
                               }break;
                               case "Rondônia":if(!isset($estados[20][0])){
                               $estados[20][0]=$proj[3];
                               $estados[20][1]=1;}else{
                                   $estados[20][1]=($estados[20][1])+1;
                               }break;
                               case "Roraima":if(!isset($estados[21][0])){
                               $estados[21][0]=$proj[3];
                               $estados[21][1]=1;}else{
                                   $estados[21][1]=($estados[21][1])+1;
                               }break;
                               case "Santa Catarina":if(!isset($estados[22][0])){
                               $estados[22][0]=$proj[3];
                               $estados[22][1]=1;}else{
                                   $estados[22][1]=($estados[22][1])+1;
                               }break;
                               case "São Paulo":if(!isset($estados[23][0])){
                               $estados[23][0]=$proj[3];
                               $estados[23][1]=1;}else{
                                   $estados[23][1]=($estados[23][1])+1;
                               }break;
                               case "Sergipe":if(!isset($estados[24][0])){
                               $estados[24][0]=$proj[3];
                               $estados[24][1]=1;}else{
                                   $estados[24][1]=($estados[24][1])+1;
                               }break;
                               case "Tocantins":if(!isset($estados[25][0])){
                               $estados[25][0]=$proj[3];
                               $estados[25][1]=1;}else{
                                   $estados[25][1]=($estados[25][1])+1;
                               }break;
                               case "Distrito Federal":if(!isset($estados[26][0])){
                               $estados[26][0]=$proj[3];
                               $estados[26][1]=1;}else{
                                   $estados[26][1]=($estados[26][1])+1;
                               }break;
                               default:if(!isset($estados[27][0])){
                               $estados[27][0]=$proj[3];
                               $estados[27][1]=1;}else{
                                   $estados[27][1]=($estados[27][1])+1;
                               }
                       }
                    }
                    
                    if($no=="1"){
                        switch ($proj[2]){
                            case "México": $mex++;
                            break;
                            case "Paraguai": $par++;
                            break;
                            case "Colômbia": $col++;
                            break;
                            case "Argentina": $arg++;
                            break;
                            case "Turquia": $tur++;
                            break;
                        }
                    }
                    
                    $xxx=0;$numest=0;
                    while($xxx!=26){
                        if(($estados[$xxx][1])!="0"){
                            $numest++;
                        }$xxx++;
                    }
                    
                    }
                    
                    $dif=round(($pre/$contaproj)*100);
                    $difip=round(($ip/$contaproj)*100);
                    $dific=round(($ic/$contaproj)*100);
                    $difdt=round(($dt/$contaproj)*100);
                    $difdc=round(($dc/$contaproj)*100);
                    $diffd=round(($fd/$contaproj)*100);
                    $difed=round(($ed/$contaproj)*100);
                    $difws=round(($ws/$contaproj)*100);
                
                    
                    
				print"<article>";
				print "<div align=center style='font-size:18px;color:#333'><b>Estatísticas das Avaliações</b></div>";
				
				
date_default_timezone_set("America/Recife");
$date = date("d/m/y");
$time = date("H");
$tudos = $time . "h" . date("i") . "min";
print'<h2 style="color:#444;font-size:13px">Última atualização às '.$tudos.' em '.$date.'</h2>';
print'<div align=center style="margin-top:-15px;margin-bottom:20px"><a href="coordmain.php"><input type="button" value="ATUALIZAR" style="border:none;background-color:#2a578b;padding:5px;color:whitesmoke;font-size:12px"></a><br><br><hr></div>';


				
				$resY = substr(strval(100-($resx*100)/$contares),0,4);
				
				$aprY = substr(strval(100-($aprx*100)/$contaapr),0,4);
				
				$cinza=((($resx/$contares)*100)/100)*420;
				$verde=420-$cinza;
				
				$cinza2=((($aprx/$contaapr)*100)/100)*420;
				$verde2=420-$cinza2;
				
				
				
				print"<div align=center>
				    <b>$resx</b> de <b>$contares</b> avaliações de <b><i>Resumos</b></i> pendentes<b>
				    <div align=center>
				    <input type='button' style='background:linear-gradient(to right, darkgreen,green);width:{$verde}px;border:none;margin-top:5px;margin-bottom:-12px;margin-right:-5px'>
				    <input type='button' style='background:linear-gradient(to right, #666,#222);width:{$cinza}px;border:none;margin-top:5px;margin-bottom:-12px;margin-left:0px'>
				        
				    </div>
				    <br>$resY%</b> concluído<br><br><hr><br>
				    <b>$aprx</b> de <b>$contaapr</b> avaliações de <b><i>Apresentações</b></i> pendentes<b>
				    <div align=center>
				    <input type='button' style='background:linear-gradient(to right, darkgreen,green);width:{$verde2}px;border:none;margin-top:5px;margin-bottom:-12px;margin-right:-5px'>
				    <input type='button' style='background:linear-gradient(to right, #666,#222);width:{$cinza2}px;border:none;margin-top:5px;margin-bottom:-12px;margin-left:0px'>
				        
				    </div>
				    <br>$aprY%</b> concluído<br><br>
				</div>";
				print"</article>";
                    
                print"<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>";    
                    
				print"<article style='height:600px'>";
				print "<div align=center style='font-size:18px;color:#333'><b>Estatísticas dos Projetos</b></div>";
				
				print "<div align=center>";
				print"<br><b>$contaproj</b> projetos inscritos";
				print"<br>Número de projetos que realizaram pré-inscrição: <b>$pre</b> <i>($dif%)</i><br><br>";
				
					print"<hr>";
				print"<br><a href='/_visualiza/proj/IP.php'><input type=button style='width:260px;background:linear-gradient(to right,#580202,darkred,#580202);color:white;border:none;height:30px;font-size:12px;margin-bottom:5px;float:left;margin-right:5px' value='Iniciação à Pesquisa: $ip projetos'></a>";
				print"<a href='/_visualiza/proj/IC.php'><input type=button style='width:260px;background:linear-gradient(to right,#b90063,deeppink,#b90063);color:white;border:none;height:30px;font-size:12px;margin-bottom:5px;float:left;margin-right:5px' value='Incentivo à Pesquisa: $ic projetos'></a>";
				print"<a href='/_visualiza/proj/DC.php'><input type=button style='width:260px;background:linear-gradient(to right,#000045,darkblue,#000045);color:white;border:none;height:30px;font-size:12px;margin-bottom:5px;float:left' value='Divulgação Científica: $dc projetos'><br></a>";
				print"<a href='/_visualiza/proj/DT.php'><input type=button style='width:260px;background:linear-gradient(to right,#510151,darkmagenta,#510151);color:white;border:none;height:30px;font-size:12px;margin-bottom:5px;float:left;margin-right:5px' value='Desenvolvimento Tecnológico: $dt projetos'></a>";
				print"<a href='/_visualiza/proj/FD.php'><input type=button style='width:260px;background:linear-gradient(to right,#004800,darkgreen,#004800);color:white;border:none;height:30px;font-size:12px;margin-bottom:5px;float:left;margin-right:5px' value='Talentos Internacionais: $fd projetos'></a>";
				print"<a href='/_visualiza/proj/ED.php'><input type=button style='width:260px;background:linear-gradient(to right,#4d3600,#916e1b,#4d3600);color:white;border:none;height:30px;font-size:12px;margin-bottom:5px;float:left' value='Educação Científica: $ed projetos'></a>";
				print"<a href='/_visualiza/proj/WS.php'><input type=button style='margin-left:265px;width:260px;background:linear-gradient(to right,#9c4600,#e66700,#9c4600);color:white;border:none;height:30px;font-size:12px;margin-bottom:5px;float:left;margin-right:5px' value='Workshop Química: $ws projetos'></a><br><br><br><br><br>";
			
				print "<hr><br><div align=center style='font-size:18px;color:#333'><b>Gráfico Percentual</b></div><br>";
				print"<div align=center >";
				$grafip=0;$grafic=0;$grafdt=0;$grafdc=0;$graffd=0;$grafed=0;$grafws=0;
                
                    
                if($ip!=0){
                    $grafip = ($difip/100)*790;
                    }
                    if($ic!=0){
                    $grafic=($dific/100)*790;
                    }
                    if($dt!=0){
                    $grafdt=($difdt/100)*790;
                        }
                    if($dc!=0){
                    $grafdc=($difdc/100)*790;
                        
                    }
                    if($fd!=0){
                    $graffd=($diffd/100)*790;
                        
                    }
                    if($ed!=0){
                    $grafed=($difed/100)*790;
                        
                    }
                    if($ws!=0){
                    $grafws=($difws/100)*790;
                        
                    }
                    
                    $ops=200-$grafip;
                    $ops2=200-$grafic;
                    $ops3=200-$grafdt;
                    $ops4=200-$grafdc;
                    $ops5=200-$graffd;
                    $ops6=200-$grafed;
                    $ops7=200-$grafws;
                    
                    $grafs = array(array($grafip,"IP"),array($grafic,"IC"),array($grafdt,"DT"),array($grafdc,"DC"),array($graffd,"FD"),array($grafed,"ED"),array($grafws,"WS"));
                    
                    rsort($grafs);
                    
                    $xx=sizeof($grafs);
                    $x=0;
                    print"<img src='icons/ruler.png' style='float:left;margin-top:-80px;margin-left:150px'><div align=center style='margin-top:80px;margin-bottom:50px;margin-left:200px'>";
                    while($x!=$xx){
                        if($grafs[$x][0]!=0){
                            
                            switch($grafs[$x][1]){
                                case "IP": print"<div align=center style='font-size:9px;background:linear-gradient(to bottom,#340000,darkred);color:white;width:40px;height:{$grafip}px;float:left;margin-top:{$ops}px;margin-right:10px;margin-left:10px'><br>IP<br>$difip%</div>";
                                break;
                                case "IC": print"<div align=center style='font-size:9px;background:linear-gradient(to bottom,#630036,deeppink);color:white;width:40px;height:{$grafic}px;float:left;margin-top:{$ops2}px;margin-right:10px;margin-left:10px'><br>IC<br>$dific%</div>";
                                break;
                                case "DT":print"<div align=center style='font-size:9px;background:linear-gradient(to bottom,#250025,darkmagenta);color:white;width:40px;height:{$grafdt}px;float:left;margin-top:{$ops3}px;margin-right:10px;margin-left:10px'><br>DT<br>$difdt%</div>";
                                break;
                                case "DC":print"<div align=center style='font-size:9px;background:linear-gradient(to bottom,#000020,darkblue);color:white;width:40px;height:{$grafdc}px;float:left;margin-top:{$ops4}px;margin-right:10px;margin-left:10px'><br>DC<br>$difdc%</div>";
                                break;
                                case "FD":print"<div align=center style='font-size:9px;background:linear-gradient(to bottom,#003900,darkgreen);color:white;width:40px;height:{$graffd}px;float:left;margin-top:{$ops5}px;margin-right:10px;margin-left:10px'>FD<br>$diffd%</div>";
                                break;
                                case "ED":print"<div align=center style='font-size:9px;background:linear-gradient(to bottom,#352500,#916e1b);color:white;width:40px;height:{$grafed}px;float:left;margin-top:{$ops6}px;margin-right:10px;margin-left:10px'><br>ED<br>$difed%</div>";
                                break;
                                case "WS":print"<div align=center style='font-size:9px;background:linear-gradient(to bottom,#5f2a00,#e66700);color:white;width:40px;height:{$grafws}px;float:left;margin-top:{$ops7}px;margin-right:10px;margin-left:10px'><br>WS<br>$difws%</div>";
                                break;
                            }
                        }
                        $x++;
                    }print"</div>";
                    
                    
                   
                    
                    
                    
                    
                    
                    
				print"</div></article>";
				
				print"<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>";
				
				print"<article><div align=center style='font-size:18px;color:#333'><b>Estatísticas Internacionais</b></div>
				<br><b><div align=center >$fd</b> projetos internacionais<br><b>5</b> países participantes<br><br><hr>";
				
				print'<br><div class = "nueva" align="center" style="margin-bottom:8px"><img src="flags/mex.jpg"> México: <b>'.$mex.'</b> projetos <img src="flags/tur.jpg" style="margin-left:20px"> Turquia: <b>'.$tur.'</b> projetos <img src="flags/arg.jpg" style="margin-left:20px"> Argentina: <b>'.$arg.'</b> projetos </div>';
				print'<br><div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/col.jpg"> Colômbia: <b>'.$col.'</b> projetos <img src="flags/par.jpg" style="margin-left:20px"> Paraguai: <b>'.$par.'</b> projetos </div>';
				
				print"</article>";
				
				print"<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>";
				
				print"<article>";
				print "<div align=center style='font-size:18px;color:#333'><b>Estatísticas Nacionais</b></div>";
				
				$pe=$estados[0][1];
				$pex = ($contaproj-$fd)-$pe;
				$peporc = round((100*$pe)/$contaproj);
				$estporc = round((100*$numest)/27);
				$demporc = round((100*$pex)/($contaproj-$fd));
				
				$ac=$estados[1][1];$al=$estados[2][1];$ap=$estados[3][1];$am=$estados[4][1];$ba=$estados[5][1];$ce=$estados[6][1];$es=$estados[7][1];$go=$estados[8][1];$ma=$estados[9][1];$mt=$estados[10][1];$ms=$estados[11][1];$mg=$estados[12][1];$pa=$estados[13][1];$pb=$estados[14][1];$pr=$estados[15][1];$pi=$estados[16][1];$rj=$estados[17][1];$rn=$estados[18][1];$rs=$estados[19][1];$ro=$estados[20][1];$rr=$estados[21][1];$sc=$estados[22][1];$sp=$estados[23][1];$se=$estados[24][1];$to=$estados[25][1];$df=$estados[26][1];
				
				$acporc=(100*$ac)/$contaproj;
				$acporc = substr(strval($acporc),0,3);
				$alporc=((100*$al)/$contaproj);
				$alporc = substr(strval($alporc),0,3);
				$apporc=((100*$ap)/$contaproj);
				$apporc = substr(strval($apporc),0,3);
				$amporc=((100*$am)/$contaproj);
				$amporc = substr(strval($amporc),0,3);
				$baporc=((100*$ba)/$contaproj);
				$baporc = substr(strval($baporc),0,3);
				$ceporc=((100*$ce)/$contaproj);
				$ceporc = substr(strval($ceporc),0,3);
				$esporc=((100*$es)/$contaproj);
				$esporc = substr(strval($esporc),0,3);
				$goporc=((100*$go)/$contaproj);
				$goporc = substr(strval($goporc),0,3);
				$maporc=((100*$ma)/$contaproj);
				$maporc = substr(strval($maporc),0,3);
				$mtporc=((100*$mt)/$contaproj);
				$mtporc = substr(strval($mtporc),0,3);
				$msporc=((100*$ms)/$contaproj);
				$msporc = substr(strval($msporc),0,3);
				$paporc=((100*$pa)/$contaproj);
				$paporc = substr(strval($paporc),0,3);
				$piporc=((100*$pi)/$contaproj);
				$piporc = substr(strval($piporc),0,3);
				$seporc=((100*$se)/$contaproj);
				$seporc = substr(strval($seporc),0,3);
				$mgporc=((100*$mg)/$contaproj);
				$mgporc = substr(strval($mgporc),0,3);
				$pbporc=((100*$pb)/$contaproj);
				$pbporc = substr(strval($pbporc),0,3);
				$prporc=((100*$pr)/$contaproj);
				$prporc = substr(strval($prporc),0,3);
				$rjporc=((100*$rj)/$contaproj);
				$rjporc = substr(strval($rjporc),0,3);
				$rnporc=((100*$rn)/$contaproj);
				$rnporc = substr(strval($rnporc),0,3);
				$roporc=((100*$ro)/$contaproj);
				$roporc = substr(strval($roporc),0,3);
				$rsporc=((100*$rs)/$contaproj);
				$rsporc = substr(strval($rsporc),0,3);
				$rrporc=((100*$rr)/$contaproj);
				$rrporc = substr(strval($rrporc),0,3);
				$scporc=((100*$sc)/$contaproj);
				$scporc = substr(strval($scporc),0,3);
				$spporc=((100*$sp)/$contaproj);
				$spporc = substr(strval($spporc),0,3);
				$toporc=((100*$to)/$contaproj);
				$toporc = substr(strval($toporc),0,3);
				$dfporc=((100*$df)/$contaproj);
				$dfporc = substr(strval($dfporc),0,3);
				
				
				print"<br><b><div align=center >$pe</b> projetos Pernambucanos <i>($peporc%)</i><br><b>$pex</b> projetos dos demais estados <i>($demporc%)</i><br><b>$numest</b> estados participantes <i>($estporc% dos estados brasileiros)</i><br><br><hr><br></div>";
				
				print'<div align="center" style="font-size:13px">';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/ce.png"> Ceará: <b>'.$ce.'</b> projetos <i>('.$ceporc.'%)</i><img src="flags/es.png" style="margin-left:20px"> Espírito Santo: <b>'.$es.'</b> projetos <i>('.$esporc.'%)</i><img src="flags/go.png" style="margin-left:20px"> Goiás: <b>'.$go.'</b> projetos <i>('.$goporc.'%)</i></div>';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/pe.png" > Pernambuco: <b>'.$pe.'</b> projetos <i>('.$peporc.'%)</i> <img src="flags/ac.png" style="margin-left:20px"> Acre: <b>'.$ac.'</b> projetos <i>('.$acporc.'%)</i><img src="flags/al.png" style="margin-left:20px"> Alagoas: <b>'.$al.'</b> projetos <i>('.$alporc.'%)</i></div>';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/ma.png"> Maranhão: <b>'.$ma.'</b> projetos <i>('.$maporc.'%)</i><img src="flags/mt.png" style="margin-left:20px"> Mato Grosso: <b>'.$mt.'</b> projetos <i>('.$mtporc.'%)</i><img src="flags/pa.png" style="margin-left:20px"> Pará: <b>'.$pa.'</b> projetos <i>('.$paporc.'%)</i></div>';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/sc.png"> Santa Catarina: <b>'.$sc.'</b> projetos <i>('.$scporc.'%)</i><img src="flags/am.png" style="margin-left:20px"> Amazonas: <b>'.$am.'</b> projetos <i>('.$amporc.'%)</i><img src="flags/ba.png" style="margin-left:20px"> Bahia: <b>'.$ba.'</b> projetos <i>('.$baporc.'%)</i></div>';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/ms.png"> Mato Grosso do Sul: <b>'.$ms.'</b> projetos <i>('.$msporc.'%)</i><img src="flags/pi.png" style="margin-left:20px"> Piauí: <b>'.$pi.'</b> projetos <i>('.$piporc.'%)</i><img src="flags/se.png" style="margin-left:20px"> Sergipe: <b>'.$se.'</b> projetos <i>('.$seporc.'%)</i></div>';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/rs.png"> Rio Grande do Sul: <b>'.$rs.'</b> projetos <i>('.$rsporc.'%)</i><img src="flags/rr.png" style="margin-left:20px"> Roraima: <b>'.$rr.'</b> projetos <i>('.$rrporc.'%)</i><img src="flags/ap.png"style="margin-left:20px"> Amapá: <b>'.$ap.'</b> projetos <i>('.$apporc.'%)</i></div>';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px">	<img src="flags/rn.png"> Rio Grande do Norte: <b>'.$rn.'</b> projetos <i>('.$rnporc.'%)</i><img src="flags/pb.png" style="margin-left:20px"> Paraíba: <b>'.$pb.'</b> projetos <i>('.$pbporc.'%)</i><img src="flags/pr.png" style="margin-left:20px"> Paraná: <b>'.$pr.'</b> projetos <i>('.$prporc.'%)</i></div>';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/sp.png"> São Paulo: <b>'.$sp.'</b> projetos <i>('.$spporc.'%)</i><img src="flags/to.png" style="margin-left:20px"> Tocantins: <b>'.$to.'</b> projetos <i>('.$toporc.'%)</i><img src="flags/df.png" style="margin-left:20px"> Distrito Federal: <b>'.$df.'</b> projetos <i>('.$dfporc.'%)</i></div>';
				
				print'<div class = "nueva" align="center" style="margin-bottom:15px"><img src="flags/rj.png"> Rio de Janeiro: <b>'.$rj.'</b> projetos <i>('.$rjporc.'%)</i><img src="flags/mg.png"style="margin-left:20px"> Minas Gerais: <b>'.$mg.'</b> projetos <i>('.$mgporc.'%)</i><img src="flags/ro.png" style="margin-left:20px"> Rondônia: <b>'.$ro.'</b> projetos <i>('.$roporc.'%)</i></div>';
				
				print'</div>';
				
				print"</article>";
				
				print"<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>";
				
			    $materias = [['matematica','0'],['tecnologia','0'],['fisica','0'],['historia','0'],['linguagem','0'],['biologia','0'],['quimica','0'],['geografia','0'],['sociologia','0'],['pedagogia','0']];
				while($ava = mysqli_fetch_array($consulta4)){
				    switch($ava[1]){
				        case 'matematica': $materias[0][1] = $materias[0][1]+1;
				        break;
				        case 'tecnologia': $materias[1][1] = $materias[1][1]+1;
				        break;
				         case 'fisica': $materias[2][1] = $materias[2][1]+1;
				        break;
				         case 'historia': $materias[3][1] = $materias[3][1]+1;
				        break;
				         case 'linguagem': $materias[4][1] = $materias[4][1]+1;
				        break;
				         case 'biologia': $materias[5][1] = $materias[5][1]+1;
				        break;
				         case 'quimica': $materias[6][1] = $materias[6][1]+1;
				        break;
				         case 'geografia': $materias[7][1] = $materias[7][1]+1;
				        break;
				         case 'sociologia': $materias[8][1] = $materias[8][1]+1;
				        break;
				         case 'pedagogia': $materias[9][1] = $materias[9][1]+1;
				        break;
				    }switch($ava[2]){
				        case 'matematica': $materias[0][1] = $materias[0][1]+1;
				        break;
				        case 'tecnologia': $materias[1][1] = $materias[1][1]+1;
				        break;
				         case 'fisica': $materias[2][1] = $materias[2][1]+1;
				        break;
				         case 'historia': $materias[3][1] = $materias[3][1]+1;
				        break;
				         case 'linguagem': $materias[4][1] = $materias[4][1]+1;
				        break;
				         case 'biologia': $materias[5][1] = $materias[5][1]+1;
				        break;
				         case 'quimica': $materias[6][1] = $materias[6][1]+1;
				        break;
				         case 'geografia': $materias[7][1] = $materias[7][1]+1;
				        break;
				         case 'sociologia': $materias[8][1] = $materias[8][1]+1;
				        break;
				         case 'pedagogia': $materias[9][1] = $materias[9][1]+1;
				        break;
				    }switch($ava[3]){
				        case 'matematica': $materias[0][1] = $materias[0][1]+1;
				        break;
				        case 'tecnologia': $materias[1][1] = $materias[1][1]+1;
				        break;
				         case 'fisica': $materias[2][1] = $materias[2][1]+1;
				        break;
				         case 'historia': $materias[3][1] = $materias[3][1]+1;
				        break;
				         case 'linguagem': $materias[4][1] = $materias[4][1]+1;
				        break;
				         case 'biologia': $materias[5][1] = $materias[5][1]+1;
				        break;
				         case 'quimica': $materias[6][1] = $materias[6][1]+1;
				        break;
				         case 'geografia': $materias[7][1] = $materias[7][1]+1;
				        break;
				         case 'sociologia': $materias[8][1] = $materias[8][1]+1;
				        break;
				         case 'pedagogia': $materias[9][1] = $materias[9][1]+1;
				        break;
				    }switch($ava[4]){
				        case 'matematica': $materias[0][1] = $materias[0][1]+1;
				        break;
				        case 'tecnologia': $materias[1][1] = $materias[1][1]+1;
				        break;
				         case 'fisica': $materias[2][1] = $materias[2][1]+1;
				        break;
				         case 'historia': $materias[3][1] = $materias[3][1]+1;
				        break;
				         case 'linguagem': $materias[4][1] = $materias[4][1]+1;
				        break;
				         case 'biologia': $materias[5][1] = $materias[5][1]+1;
				        break;
				         case 'quimica': $materias[6][1] = $materias[6][1]+1;
				        break;
				         case 'geografia': $materias[7][1] = $materias[7][1]+1;
				        break;
				         case 'sociologia': $materias[8][1] = $materias[8][1]+1;
				        break;
				         case 'pedagogia': $materias[9][1] = $materias[9][1]+1;
				        break;
				    }switch($ava[5]){
				        case 'matematica': $materias[0][1] = $materias[0][1]+1;
				        break;
				        case 'tecnologia': $materias[1][1] = $materias[1][1]+1;
				        break;
				         case 'fisica': $materias[2][1] = $materias[2][1]+1;
				        break;
				         case 'historia': $materias[3][1] = $materias[3][1]+1;
				        break;
				         case 'linguagem': $materias[4][1] = $materias[4][1]+1;
				        break;
				         case 'biologia': $materias[5][1] = $materias[5][1]+1;
				        break;
				         case 'quimica': $materias[6][1] = $materias[6][1]+1;
				        break;
				         case 'geografia': $materias[7][1] = $materias[7][1]+1;
				        break;
				         case 'sociologia': $materias[8][1] = $materias[8][1]+1;
				        break;
				         case 'pedagogia': $materias[9][1] = $materias[9][1]+1;
				        break;
				    }
				}
				
				 $mata = ($materias[0][1]);
				       $teca = ($materias[1][1]);
				       $fisa= ($materias[2][1]);
				       $hisa = ($materias[3][1]);
				       $lina= ($materias[4][1]);
				       $bioa = ($materias[5][1]);
				       $quia = ($materias[6][1]);
				       $geoa = ($materias[7][1]);
				       $soca = ($materias[8][1]);
				       $peda = ($materias[9][1]);
				
				
				       $mat = ($materias[0][1])*5; $mat2 = 300-$mat;
				       $tec = ($materias[1][1])*5; $tec2 = 300-$tec;
				       $fis= ($materias[2][1])*5;$fis2 = 300-$fis;
				       $his = ($materias[3][1])*5;$his2 = 300-$his;
				       $lin= ($materias[4][1])*5;$lin2 = 300-$lin;
				       $bio = ($materias[5][1])*5;$bio2 = 300-$bio;
				       $qui = ($materias[6][1])*5;$qui2 = 300-$qui;
				       $geo = ($materias[7][1])*5;$geo2 = 300-$geo;
				       $soc = ($materias[8][1])*5;$soc2 = 300-$soc;
				       $ped = ($materias[9][1])*5;$ped2 = 300-$ped;
				
				$tudo=$contava+$contacoord;
				print"<article style='height:950px'><div align=center style='font-size:18px;color:#333'><b>Estatísticas dos Usuários</b></div><br>
				<div align=center><b>$tudo</b> usuários cadastrados no sistema<br>
				<h5><b>$contava</b> avaliadores / 
				<b>$contacoord</b> coordenadores</h5>
				<br><hr><br>
				
				<div align=center style='font-size:18px;color:#333'><b>Gráfico de Competências</b></div>
				
				<div align=center style='margin-left:-40%'>
				<br><b>Matemática:</b> $mata avaliadores<br>
				<b>Tecnologia:</b> $teca avaliadores<br>
				<b>Física:</b> $fisa avaliadores<br>
				<b>História:</b> $hisa avaliadores<br>
				<b>Linguagem:</b> $lina avaliadores<br>
				</div>
				<div align=center style='margin-top:-90px;margin-left:40%'>
				<b>Biologia:</b> $bioa avaliadores<br>
				<b>Química:</b> $quia avaliadores<br>
				<b>Geografia:</b> $geoa avaliadores<br>
				<b>Sociologia:</b> $soca avaliadores<br>
				<b>Pedagogia:</b> $peda avaliadores<br>
				</div><img src='barn.png' style='float:left;margin-top:38px;margin-left:100px'><br><hr style='width:600px;margin-left:-58px;float:left'>
				<div align=center style='margin-left:180px;margin-top:350px'>
				    
                        <div style='height:{$mat}px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$mat2}px;margin-right:10px' value='Mat'><h5 style='color:whitesmoke;padding:5px'>MAT</h5></div>
                        <div style='height:{$tec}px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$tec2}px;margin-right:10px' value='Tec'><h5 style='color:whitesmoke;padding:5px'>TEC</h5></div>
                        <div style='height:{$fis}px;margin-right:10px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$fis2}px' value='Fis'><h5 style='color:whitesmoke;padding:5px'>FIS</h5></div>
                        <div style='height:{$his}px;margin-right:10px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$his2}px' value='His'><h5 style='color:whitesmoke;padding:5px'>HIS</h5></div>
                        <div style='height:{$lin}px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$lin2}px;margin-right:10px' value='Lin'><h5 style='color:whitesmoke;padding:5px'>LIN</h5></div>
				   
				    <div style='height:{$bio}px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$bio2}px;margin-right:10px' value='Bio'><h5 style='color:whitesmoke;padding:5px'>BIO</h5></div>
                        <div style='height:{$qui}px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$qui2}px;margin-right:10px' value='Qui'><h5 style='color:whitesmoke;padding:5px'>QUI</h5> </div>
                        <div style='height:{$geo}px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$geo2}px;margin-right:10px' value='Geo'> <h5 style='color:whitesmoke;padding:5px'>GEO</h5></div>
                        <div style='height:{$soc}px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$soc2}px;margin-right:10px' value='Soc'> <h5 style='color:whitesmoke;padding:5px'>SOC</h5></div>
                        <div style='height:{$ped}px;float:left;background:linear-gradient(to bottom,#002147,#2a578b);margin-top:{$ped2}px;margin-right:10px' value='Ped'> <h5 style='color:whitesmoke;padding:5px'>PED</h5></div>
				   
				</div>
				
				
				</div><br></article>";
				
				print"<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>";
				
				print"<article>";
				print "<div align=center style='font-size:18px;color:#333'><b>Últimos Registros</b></div><br>";
				
				$sqlreg = "SELECT * FROM register WHERE id > (SELECT MAX(id) - 20 FROM register) order by id desc";
				$doreg = mysqli_query($conexao, $sqlreg);
				
				
				while($getreg = mysqli_fetch_array($doreg)){
				    
				    if($getreg[1]!="LL"){
				    $ano = substr($getreg[5],0,4);
				    $mes = substr($getreg[5],5,2);
				    $dia = substr($getreg[5],8,2);
				    $hora = substr($getreg[5],10,3);
				    $min = substr($getreg[5],13,3);
				    $action;
				    
				    if($hora<3){
				        switch($hora){
				            case 2: $hora = 23;
				            break;
				            case 1: $hora = 22;
				            break;
				            case 0: $hora = 21;
				        }
				    }else{
				        $hora = $hora - 3;
				    }
				    
				    if($hora<10){
				        $hora = strval($hora);
				        $hora = "0" . $hora;
				    }
				    
				    print "<div align=center><b><i>$getreg[1]</i></b> -  ";
				    switch($getreg[2]){
				        case "IS LOGGED": $action = "Acessou o Sistema";
				        break;
				        case "ADD PROJ": $action = "Adicionou o Projeto";
				        break;
				        case "ADD COO": $action = "Adicionou o Cordenador";
				        break;
				        case "ADD AVA": $action = "Adicionou o Avaliador";
				        break;
				        case "DELETE": $action = "<b>Removeu</b> o Projeto";
				        break;
				        case "TRY LOG": $action = "Tentou acessar o Sistema";
				        break;
				        case "RES LINK": $action = "Atribuiu Link de Resumo a";
				        break;
				        case "RES UNLINK": $action = "Removeu Link de Resumo de";
				        break;
				        case "APR LINK": $action = "Atribuiu Link de Apresentação a";
				        break;
				        case "APR UNLINK": $action = "Removeu Link de Apresentação de";
				        break;
				        case "RES ASSIGN": $action = "Atribuiu Avaliador de Resumo";
				        break;
				        case "RES UNASGN": $action = "Removeu Avaliador de Resumo";
				        break;
				        case "APR ASSIGN": $action = "Atribuiu Avaliador de Apresentação";
				        break;
				        case "APR UNASGN": $action = "Removeu Avaliador de Apresentação";
				        break;
				        case "RES ON": $action = "<b>ATIVOU</b> avaliação do Resumo";
				        break;
				        case "RES OFF": $action = "DESATIVOU avaliação do Resumo";
				        break;
				        case "APR ON": $action = "<b>ATIVOU</b> avaliação da Apresentação";
				        break;
				        case "APR OFF": $action = "DESATIVOU avaliação da Apresentação";
				        break;
				        case "KILLED": $action = "<b>EXCLUIU</b> o usuário";
				        break;
				        case "EDITED": $action = "Modificou o projeto";
				        break;
				        case "AVA RES": $action = "<b>AVALIOU o resumo</b>";
				        break;
				        case "AVA APR": $action = "<b>AVALIOU a apresentação</b>";
				        break;
				        case "entrou par": $action = "Entrou pro time!";
				        break;
				        default : $action=$getreg[2];
				        
				    }print "$action";
				    if($getreg[3]){
				        $short = substr($getreg[3],0,12);
				        print" [$short...]";
				    }if($getreg[4]){
				        $short2 = substr($getreg[4],0,12);
				        print" -> [$short2...]";
				    }
				    print " em $dia/$mes às $hora$min<br></div>";
				}
				
				}
				print"<br></article>";
				print"<div align=center><img src='bottombar.jpg' style='margin-right:15px'></div><br>";
				?>
				

			</section>
		</div>
	</body>
</html>