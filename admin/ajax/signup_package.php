<?php 
require("../../includes/config.php");
if(isset($_GET['username']) and isset($_GET['bank_account_number']) and isset($_GET['package_amount'])){

//check if the user has an already account
if(mysql_num_rows(mysql_query("SELECT * FROM package WHERE username='".$_GET['username']."' AND package_amount='".$_GET['package_amount']."' AND bank_account_number='".$_GET['bank_account_number']."'",$db))==0){

//add person PHing to package table
mysql_query("INSERT INTO package(username,bank_account_number,package_amount) VALUES('".$_GET['username']."','".$_GET['bank_account_number']."','".$_GET['package_amount']."')",$db);

//parse the payment_queue table to select person to pay based on package amount
if(mysql_num_rows($res=mysql_query("SELECT * FROM  payment_queue WHERE package_amount='".$_GET['package_amount']."' ORDER BY datetime ASC",$db))>0){
$row=mysql_fetch_array($res);
}
else{
	echo "Please, wait to be matched. Thanks";
	exit;
}

if(mysql_num_rows(mysql_query("SELECT * FROM assign WHERE bank_account_number='".$row['bank_account_number']."' AND package_amount='".$row['package_amount']."'",$db))>0)
{
	//add it to to_be_paid table
	mysql_query("INSERT INTO to_be_paid(username,bank_account_number,package_amount,payee_username,payee_bank_account_number,payee_package_number,datetime) VALUES('".$row['username']."','".$row['bank_account_number']."','".$row['package_amount']."','".$_GET['username']."','".$_GET['bank_account_number']."','".$_GET['package_number']."',NOW())",$db);
	//delete person to be paid from payment_queue table
	mysql_query("DELETE FROM payment_queue WHERE bank_account_number='".$row['bank_account_number']."' AND package_amount='".$row['package_amount']."'",$db);
	//delete person to be paid from assign table
	mysql_query("DELETE FROM assign WHERE bank_account_number='".$row['bank_account_number']."' AND package_amount='".$row['package_amount']."'",$db);

}else
{
	//add it to to_be_paid table
	mysql_query("INSERT INTO to_be_paid(username,bank_account_number,package_amount,payee_username,payee_bank_account_number,payee_package_number,datetime) VALUES('".$row['username']."','".$row['bank_account_number']."','".$row['package_amount']."','".$_GET['username']."','".$_GET['bank_account_number']."','".$row['package_amount']."',NOW())",$db);
	//add to assign table
	mysql_query("INSERT INTO assign(username,bank_account_number,package_amount,payee_username,payee_bank_account_number) VALUES('".$row['username']."','".$row['bank_account_number']."','".$row['package_amount']."','".$_GET['username']."','".$_GET['bank_account_number']."')",$db);

}


echo "You have been added to package #".$_GET['package_amount'].". Please, pay up on time. Go to your pending payments page to see your matching status Thanks";
//exit;
}else{
echo "package already exist, choose another";

}
exit;

}
?>