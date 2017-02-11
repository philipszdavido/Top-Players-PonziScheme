<?php
require_once('../../includes/config.php');

if(isset($_GET['username']) and isset($_GET['bank_account_number']) and isset($_GET['package_amount']) and isset($_GET['payee_username']) and isset($_GET['payee_bank_account_number'])){


mysql_query("DELETE FROM to_be_paid WHERE username='".$_GET['username']."' AND bank_account_number='".$_GET['bank_account_number']."' AND package_amount='".$_GET['package_amount']."' AND payee_username='".$_GET['payee_username']."' AND payee_bank_account_number='".$_GET['payee_bank_account_number']."'",$db);


mysql_query("DELETE FROM assign WHERE username='".$_GET['username']."' AND bank_account_number='".$_GET['bank_account_number']."' AND package_amount='".$_GET['package_amount']."' AND payee_username='".$_GET['payee_username']."' AND payee_bank_account_number='".$_GET['payee_bank_account_number']."'",$db);
if(mysql_num_rows(mysql_query("SELECT * FROM payment_queue WHERE username='".$_GET['username']."' AND bank_account_number='".$_GET['bank_account_number']."' AND package_amount='".$_GET['package_amount']."'",$db))==0){
		mysql_query("INSERT INTO payment_queue(username,bank_account_number,package_amount,datetime) VALUES('".$_GET['username']."','".$_GET['bank_account_number']."','".$_GET['package_amount']."','".$_GET['datetime']."')",$db);

}
echo "DELETED";

}
?>