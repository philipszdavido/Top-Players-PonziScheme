<?php
ob_start();
session_start();
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


mysql_query("INSERT INTO test(datetime) VALUES(NOW())",$db);

print("waiting....");
exit;
?>