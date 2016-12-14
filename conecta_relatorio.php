<?
   //1º passo - Conecta ao servidor SQL Server
   //if(!($id = odbc_connect("LocalServer", "web", "123"))) {
   //   echo "Não foi possível estabelecer uma conexão com o Banco de Dados. Favor Contactar o Administrador.";
   //   exit;
   //}

   //Conecta ao servidor MySQL
//  $dbname="technowaresoft"; // Indique o nome do banco de dados que será aberto
//   $usuario="technowaresoft"; // Indique o nome do usuário que tem acesso
//   $password="tech359"; // Indique a senha do usuário

   $dbname="relatorios"; // Indique o nome do banco de dados que será aberto
   $usuario="sa"; // Indique o nome do usuário que tem acesso
   $password="light"; // Indique a senha do usuário
 
 
   	
   $servidor='189.51.193.222';

   if(!($id = mssql_connect($servidor,$usuario,$password))) {
      echo "Recarregue sua página";
      exit;
   }
   
   if(!($con= mssql_select_db($dbname,$id))) {
      echo "Recarregue sua página";
      exit;
   }
?>
