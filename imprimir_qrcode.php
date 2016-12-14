<?
	//Header para evitar cahe
	header("Content-type: text/html; charset=iso-8859-1");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
	header("Access-Control-Max-Age:1728000");
	header("Access-Control-Allow-Origin:*");
	header("Access-Control-Allow-Methods:*");
	header("Access-Control-Allow-Headers:Content-MD5, X-Alt-Referer");
	header("Access-Control-Allow-Credentials:true");
	header("Set-Cookie:1");
	
	include("conecta_relatorio.php");    
	include("json.php");    

?>

<html lang="pt-BR">
<head>
	<title>Lageli</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
	<meta charset="utf-8">
	<style type="text/css">
		@media print {
		  footer {page-break-after: always;}
		}
	</style>
</head>
<body>
	<?
		$sql = " select id from LageliGo1 order by id ";
		
		if ($res = mssql_query($sql, $id)) {
		  
		  $array = array();  	
			while($row = mssql_fetch_array($res)){

				array_push($array, base64_encode("lageli_crypty".base64_encode($row["id"])));

				echo "Ponto: ".$row["id"]." <div id='qr_".$row["id"]."'></div>";
				echo "<hr>";
				echo "<footer></footer>";
			}
    }

    $array = json_encode($array);
	?>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/qrcode.min.js"></script>
	<script type="text/javascript">
		
		$("div").each(function() {

			let qrcode = new QRCode(document.getElementById(this.id), {
				width : 1000,
				height : 1000
			});

			qrcode.makeCode("http://sistema.duzani.com.br/lageli/go/dados.php?dados="+btoa("lageli_crypty"+btoa(this.id)));
			console.log("http://sistema.duzani.com.br/lageli/go/dados.php?dados="+btoa("lageli_crypty"+btoa(this.id)));
		});

	</script>
</body>