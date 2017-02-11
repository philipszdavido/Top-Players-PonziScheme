<?php include_once('includes/config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php //mysql_query("INSERT INTO test(datetime) VALUES(NOW())",$db);?>
<?php $dr=mysql_fetch_array(mysql_query("SELECT * FROM test",$db),MYSQL_ASSOC);
//mysql_query("INSERT INTO user(role,username,fullname,password,phone_number,bank_account_number,bank_account_name,bank_name) VALUES('non-admin','D.Trump','Donald Trump','".md5("trump")."','08034566','67890','Donald Trump','UBA')",$db);
?>
<?php echo date('d.m.Y H:i:s',strtotime($dr['datetime'])); echo strtotime(date('Y-m-d H:i:s'));

?>
<body>
</body>
</html>
