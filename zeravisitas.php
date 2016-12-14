<html lang="pt-BR">
<head>
	<title>Lageli GO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
</head>
<body>
  <?
  	if (isset($_GET["login"])) {
  	
  		if (($_GET["login"] == "admin@lageli.com.br") && ($_GET["senha"] == "01adminlageli")) {

		  	include ("conecta_relatorio.php");

		  	$sql_update = "update LageliGo2 set visitado = 0, contador = 0";
		  	if (mssql_query($sql_update)) {
		  		echo "zerado";
		  	}
		  }	
  	}
  ?>
</body>
</html>