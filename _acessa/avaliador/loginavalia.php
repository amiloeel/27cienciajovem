<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Cadastro</title>
		<link rel="stylesheet" href="../../_css/estilo.css">
		<script type="text/javascript">
    const isMobile = navigator.userAgentData.mobile;
</script>
	</head>
	<body>
		<div class="containerlog" style="margin: auto;
	width:850px;
	margin-top: 10px;
float:center;
	height: auto">
			<nav class="navega" style="width: 850px;
	height: auto;
	background-color: #444;
	float: center;
	box-sizing: border-box;
	                        "><br><div align="center"><img src="../../rosa2.png" id="x" style="width:300px">
	                         <script type="text/javascript">
                                    if(isMobile){
                                        document.getElementById("x").style.width = "650px";
                                        document.getElementById("x").style.margin = "20px";
                                    }
                                </script>
				</div><br>	
				<h2 id="xx"style="font-size:20px">MODO AVALIADOR</h2>
				<script type="text/javascript">
                                    if(isMobile){
                                        document.getElementById("xx").style.fontSize = "60px";
                                        document.write("<br>");
                                    }
                                </script><br>
				<div class = "nueva" align="center">
					<form method="post" action="loginavaliaX.php">
					<a><input id="xxbtn" type="button" value="Login" class="btnx" style="background-color:#783d5c;" blocked>
					<script type="text/javascript">
                                    if(isMobile){
                                       
                                        document.getElementById("xxbtn").value = "LOGIN";
                                        document.getElementById("xxbtn").style.fontSize = "40px";
                                        document.getElementById("xxbtn").style.width = "600px";
                                        document.getElementById("xxbtn").style.height = "80px";
                                        document.write("<br>");
                                    }
                                </script>
					
					
					
					
					<input id="xxbtn2" type="text" name="nick" class="campo2" maxlength="20" required autofocus></a>
					<script type="text/javascript">
                                    if(isMobile){
                                        document.write("<br><br>");
                                        document.getElementById("xxbtn2").style.fontSize = "40px";
                                        document.getElementById("xxbtn2").style.width = "600px";
                                        document.getElementById("xxbtn2").style.height = "80px";
                                        document.getElementById("xxbtn2").style.backgroundColor = "#999";
                                    }
                                </script>
					
					
					
					
					
					
					<br><br><a><input id="xxbtn3" type="button" value="Senha" class="btnx" style="background-color:#783d5c;" blocked>
					
					<script type="text/javascript">
                                    if(isMobile){
                                       
                                        document.getElementById("xxbtn3").value = "SENHA";
                                        document.getElementById("xxbtn3").style.fontSize = "40px";
                                        document.getElementById("xxbtn3").style.width = "600px";
                                        document.getElementById("xxbtn3").style.height = "80px";
                                        document.write("<br>");
                                    }
                                </script>
					
					
					
					<input type="password" id="etcetak" name="passw" class="campo2" maxlength="20" required></a>
					<br><br><br>

                                	<script type="text/javascript">
                                    if(isMobile){
                                        document.write("<br><br>");
                                        document.getElementById("etcetak").style.fontSize = "40px";
                                        document.getElementById("etcetak").style.width = "600px";
                                        document.getElementById("etcetak").style.height = "80px";
                                        document.getElementById("etcetak").style.backgroundColor = "#999";
                                    }
                                </script>


						<input type="hidden" name="tipo" value="ava">
						<input type="submit" id="ahah" value="ACESSAR" name="go" class="btny" style="background-color:#783d5c;"><br>
						<script type="text/javascript">
                                    if(isMobile){
                                        document.write("<br>");
                                    
                                        document.getElementById("ahah").style.fontSize = "40px";
                                        document.getElementById("ahah").style.width = "380px";
                                        document.getElementById("ahah").style.height = "145px";
                                        
                                    }
                                </script>
					
						
						
						<a href="../../index.php"><input type="button" id="jjjs" value="VOLTAR" class="btnyz"></a>
						<script type="text/javascript">
                                    if(isMobile){
                                        
                                    
                                        document.getElementById("jjjs").style.fontSize = "30px";
                                        document.getElementById("jjjs").style.width = "200px";
                                        document.getElementById("jjjs").style.height = "100px";
                                        document.write("<br>");
                                    }
                                </script>

						
						<br><br>
						<?php
						if(isset($_SESSION['nao_autenticado'])):
							?>
							<input type="button" id="xxbtn4" value="LOGIN OU SENHA INCORRETOS" name="nulo" class="btnkill" style="background-color:#red;">	
								<script type="text/javascript">
                                    if(isMobile){
                                       
                                        
                                        document.getElementById("xxbtn4").style.fontSize = "30px";
                                        document.getElementById("xxbtn4").style.width = "600px";
                                        document.getElementById("xxbtn4").style.height = "100px";
                                        document.write("<br><br><br><br>");
                                    }
                                </script>
							<?php
						endif;
						unset($_SESSION['nao_autenticado']);
						?>
						
					</form>

					</div>
			</nav>
		</div>
	</body>
</html>
