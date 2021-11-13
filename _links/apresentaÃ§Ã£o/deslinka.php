<?php 

include('../../../_autentica/coord/verifycoord.php');
	$type = $_SESSION['tipo'];

include_once("../../../_autentica/cruza/conexao.php");

$codigo = $_POST['codigo'];
$link = $_POST['link'];
$origem = $_POST['origem'];
$nome = $_POST['nome'];

$sql = "update apr set link=NULL where id='$codigo'";

$usuario = $_SESSION['nick'];

$registro = "insert into register (fulano, fez, com) values ('$usuario', 'APR UNLINK', '$nome')";
$fazRegistro = mysqli_query($conexao, $registro);

$consulta = mysqli_query($conexao, $sql);

switch($origem){
    case 'ip': header("Location: IP.php");break;
    case 'ic': header("Location: IC.php");break;
    case 'dt': header("Location: DT.php");break;
    case 'dc': header("Location: DC.php");break;
    case 'fd': header("Location: FD.php");break;
    case 'ed': header("Location: ED.php");break;
    default:  header("Location: linkapr.php");
}


?>