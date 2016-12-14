<html lang="pt-BR">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	  <meta charset="utf-8">
  <title>Lageli Go!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/main.css">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
  <?
  	include ("conecta_relatorio.php");

  	$primeira_visita = false;
  	if (isset($_GET["dados"])) {
  		
	  	//recupera o ID do qrcode
	  	$id = base64_decode($_GET["dados"]);
	  	$id = explode("lageli_crypty", $id);
	  	$id = $id[1];
	  	$id = base64_decode($id);
  		// $id = $_GET["dados"];
	  	$id = explode("qr_", $id);
	  	$id = $id[1];
      
	  	// select para saber se é primeira visita
	  	$sql_visitado = "select visitado from LageliGo2 where visitado = 0 and id = ".$id;
	  	?>
      <script type="text/javascript">console.log("<?=$sql_visitado?>");</script>
      <?
      if ($result = mssql_query($sql_visitado)) {

	  		if (mssql_num_rows($result) >= 1) {

	  			$primeira_visita = true;
	  			// update na tabela jogando visitado = 1
	  			$sql_update = "update LageliGo2 set visitado = 1, data_cadastro = getDate() where id = ".$id;
	  			mssql_query($sql_update);
	  		}
	  	}

      $sql_contador = "select ISNULL(contador,0) as contador from LageliGo2 where id = ".$id;
      if ($result = mssql_query($sql_contador)) {

        if ($row = mssql_fetch_array($result)) {

          // update na tabela incrementando o contador
          $sql_update = "update LageliGo2 set contador = " . ($row["contador"] + 1) . " where id = ".$id;
          mssql_query($sql_update);
        }
      }
  	}

  	echo $primeira_visita;
  	if ($primeira_visita === true) {
  		$imagem = "parabens";
  		# code...
  	} else{
  		$imagem = "premios";
  	}
  ?>

<img id="bg" class="bg" src="img/bg-parabens.jpg">
	<div class="center">
		<div class="itens">
			<img width="250" src="img/<?= $imagem ?>.png"><br>
		</div>
	</div>
</body>
</html>