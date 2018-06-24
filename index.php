<?php
/**
 * index.php
 *
 *
 * @category   Web administration of ldap server.
 * @package    System Adminitsration
 * @author     Brendon
 * @copyright  2017 Brendon Hutchins
 * @license    MIT License
 * @version    2.0
 * @Date       2017   
 */
?>


<?php // Funtion to auto load classes dynamically
spl_autoload_register(function($class)
{
  require_once "classes/{$class}.php";

});

  require_once 'utility.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CS-Utils</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            @import "css/index.css";
        </style>
        <script type="text/javascript" src="button.js">
        </script>
    </head>
<body>

  <!-- Page Header -->
<nav class="header">
      <li>
          <form class="searchbox"action="search.php">
            <input type="text" size="33">
          </form>
      </li>
 <?php echo "<h1>CSC-Utils: " . $ldapServer ."</h1>"; 
      
  ?>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php">Add User</a></li>
      <li><a href="index.php">Remove User</a></li>
      <li><a href="index.php">Reports</a></li>
    </ul>  
</nav>
<!-- Main Content of Page -->

<?php
function ldapConnect($columns, $connection, $password, $username, $ldapServer)
{
  // Creating connection Object ldapConnection to our LDAP server
    $ldapConnection = ldap_connect($ldapServer,'389');
    if (FALSE === $ldapConnection){
    die ("<p>Failed to connect to the ldap SERVER". $ldapServer ."</p>");
  }

  // Setting the LDAP options
  ldap_set_option($ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
  ldap_set_option($ldapConnection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.

  // Error checking for a failed connection
  if (TRUE !== ldap_bind($ldapConnection, $username, $password))
  {
  die('<p>Failed to bind to LDAP server.</p>');
  }

  // Checking connection successfully connected
  if (TRUE == ldap_bind($ldapConnection, $username, $password))
  {
  echo "We are connected.!". "<br>";
  }
return $ldapConnection;
}

function ldapGetEntries($ldapConnection, $ldapBaseDN, $searchObjectFilter)
{
  $result = ldap_search($ldapConnection, $ldapBaseDN, $searchObjectFilter);
  $entries = ldap_get_entries($ldapConnection, $result);

  for ($i= 0; $i < $entries['count']; $i++) 
  { 
    echo $entries[$i]['cn'][0]. "<br>";
    echo $entries[$i]['description'][0]. "<br>";
    echo $entries[$i]['info'][0]. "<br>";
    echo "<br>";
  }
}

// Test of a dynamic table to hold our AD entries
$arrayName = array("Name", "Description", "Owner", "Owner Email");
$arrayData = array("Bob", "HR Officer", "HR", "email@example.com");

$Mktable = new TableClass(); 


$Mktable->head($arrayName);
$Mktable->closeHead();
$Mktable->tableData($arrayData);
$Mktable->foot();
// function ldapDisplay()
// {

// $Mktable = new Table();
// $Mktable->head($arrayName);
// $Mktable->closeHead();
// $Mktable->tableData($arrayData);
// $Mktable->foot();


// }


function ldapUnbind()
{
// Just closing off the connection and cleaning up after ourselves

}


function mysqlDatabaseConnection()
{

$serverName = "localhost";
$userNmae = "admin";
$password = "Password1";
$dbName = "database1"; 

//create the database connection

$mysqlConnection = new mysqli($serverName, $username, $password);

if ($mysqlDatabaseConnection->connect_error) 
  {
    die("Connection failed: " . $mysqlDatabaseConnection->connect_error);
  }
echo "We are connected MYSQL";

}
?>


<?php
$returnedLdapConnectionObject =  ldapConnect($ldapColumns, $ldapConnection, $ldapPassword, $ldapUsername, $ldapServer);

$returnedObjects = ldapGetEntries($returnedLdapConnectionObject, $ldapBaseDN, $searchObjectFilter);
/* ldapDisplay(); */
?>


<!-- Footer -->
<nav class="footer">
<article>
  <section>
  <p>Insert Footer here :)</p>
  </section>
</article>
</nav>
</body>
</html>
