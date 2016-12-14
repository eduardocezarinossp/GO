<html lang="pt-BR">
<head>
	<title>Lageli GO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
</head>
<body>
	<table width="500px">
		<thead>
			<tr>
				<th align="left">Código</th>
				<th align="left">Cidade</th>
				<th align="left">Visitado</th>
				<th align="left">Visitas</th>
			</tr>
		</thead>
		<tbody>

		  <?
		  	include ("conecta_relatorio.php");

		  	$sql = "select cod_fk, cid_nome, cid_estado, (case when visitado = 1 then 'sim' else 'nao' end) as visitado, ISNULL(contador, 0) as contador 
		  	from LageliGo2 lageligo 
		  	inner join tab_cidades tab_cidades 
		  	on lageligo.cid_codigo = tab_cidades.cid_codigo";

		  	if ($result = mssql_query($sql)) {
		  		
		  		while ($row = mssql_fetch_array($result)) {

		  			echo "<tr>";
							echo "<td>" . $row["cod_fk"] . "</td>";
							echo "<td>" . $row["cid_nome"] . "/" . $row["cid_estado"] . "</td>";
							echo "<td>" . $row["visitado"] . "</td>";
							echo "<td>" . $row["contador"] . "</td>";
						echo "</tr>";
		  		}
		  	}
		  ?>

		</tbody>
	</table>
</body>
</html>