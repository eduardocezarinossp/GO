<?
   //1� passo - Conecta ao servidor SQL Server
   //if(!($id = odbc_connect("LocalServer", "web", "123"))) {
   //   echo "N�o foi poss�vel estabelecer uma conex�o com o Banco de Dados. Favor Contactar o Administrador.";
   //   exit;
   //}

   //Conecta ao servidor MySQL
//  $dbname="technowaresoft"; // Indique o nome do banco de dados que ser� aberto
//   $usuario="technowaresoft"; // Indique o nome do usu�rio que tem acesso
//   $password="tech359"; // Indique a senha do usu�rio

   $dbname="relatorios"; // Indique o nome do banco de dados que ser� aberto
   $usuario="sa"; // Indique o nome do usu�rio que tem acesso
   $password="light"; // Indique a senha do usu�rio
 
 
   	
   $servidor='189.51.193.222';

   if(!($id = mssql_connect($servidor,$usuario,$password))) {
      echo "Recarregue sua p�gina";
      exit;
   }
   
   if(!($con= mssql_select_db($dbname,$id))) {
      echo "Recarregue sua p�gina";
      exit;
   }
?>
