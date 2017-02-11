<?php
ob_start();
session_start();
/*if(fopen('../admin/password.php','r')){
}
else{
header('Location: ../admin/install.php');
exit;
}*/
//database credentials
global $db;
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','top player');

//$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db = mysql_connect(DBHOST,DBUSER,'');
mysql_select_db(DBNAME,$db);


//set timezone
date_default_timezone_set('Europe/London');

//load classes as needed
function __autoload($class) {
   
   $class = strtolower($class);

	//if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 	
	
	//if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}
	
	//if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';

   if ( file_exists($classpath)) {
      require_once $classpath;
	} 		
	
}

$post = new Post($db);
$user = new User($db); 
?>