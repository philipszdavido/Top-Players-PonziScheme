<?php require_once('../includes/config.php');
?>
<?php  $match_found_error=NULL;
$r=mysql_query("SELECT * FROM package WHERE username='".$_SESSION['username']."' AND bank_account_number='".$_SESSION['bank_account_number']."'",$db);
if(mysql_num_rows($r)>0){

while($row=mysql_fetch_array($r,MYSQL_ASSOC)):
	
	if(mysql_num_rows(mysql_query(" SELECT * FROM package WHERE username='".$row['username']."' AND bank_account_number='".$row['bank_account_number']."' AND package_amount='".$row['package_amount']."'",$db))>0 
	and mysql_num_rows(mysql_query("SELECT * FROM payment_queue WHERE username='".$row['username']."' AND bank_account_number='".$row['bank_account_number']."' AND package_amount='".$row['package_amount']."'",$db))==0 
	and mysql_num_rows(mysql_query("SELECT * FROM to_be_paid WHERE payee_username='".$row['username']."' AND payee_bank_account_number='".$row['bank_account_number']."' AND package_amount='".$row['package_amount']."'",$db))==0)
	{
		//you have not been matched, try to match now
		if(mysql_num_rows($pay=mysql_query("SELECT * FROM payment_queue WHERE package_amount='".$row['package_amount']."' ORDER BY datetime ASC",$db))>0)
			{
				$fa=mysql_fetch_array($pay,MYSQL_ASSOC);
				if(mysql_num_rows(mysql_query("SELECT * FROM assign WHERE bank_account_number='".$fa['bank_account_number']."' AND package_amount='".$fa['package_amount']."'",$db))>0)
				 {
					//add it to to_be_paid table
					mysql_query("INSERT INTO to_be_paid(username,bank_account_number,package_amount,payee_username,payee_bank_account_number,payee_package_number,datetime) VALUES('".$fa['username']."','".$fa['bank_account_number']."','".$fa['package_amount']."','".$row['username']."','".$row['bank_account_number']."','".$fa['package_amount']."',NOW())",$db);
					//delete person to be paid from payment_queue table
					mysql_query("DELETE FROM payment_queue WHERE bank_account_number='".$fa['bank_account_number']."' AND package_amount='".$fa['package_amount']."'",$db);
					//delete person to be paid from assign table
					mysql_query("DELETE FROM assign WHERE bank_account_number='".$fa['bank_account_number']."' AND package_amount='".$fa['package_amount']."'",$db);
				
				}
			   else
				{
					//add it to to_be_paid table
					mysql_query("INSERT INTO to_be_paid(username,bank_account_number,package_amount,payee_username,payee_bank_account_number,payee_package_number,datetime) VALUES('".$fa['username']."','".$fa['bank_account_number']."','".$fa['package_amount']."','".$row['username']."','".$row['bank_account_number']."','".$row['package_amount']."',NOW())",$db);
					//add to assign table
					mysql_query("INSERT INTO assign(username,bank_account_number,package_amount,payee_username,payee_bank_account_number) VALUES('".$fa['username']."','".$fa['bank_account_number']."','".$fa['package_amount']."','".$row['username']."','".$row['bank_account_number']."')",$db);
				
				}
		}else{
	$match_found_error.='<tr><td><td>Cannot be matched for your package #'.$row['package_amount'].'. Please check back later.</td></td></tr>';
	}
	
	}

endwhile;	
}
?>

<div id="content">
<section class="style-default-bright">
					<div class="section-body">
										<div class="section-body">
									<div class="alert alert-callout alert-success" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>

						<h2 class="text-primary">Pending Payments Page</h2>
						<p>
							People <code>that</code> you will have to pay <code></code>.
						</p>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Pix</th>
									<th>User Name</th>
									<th>Account Number</th>
									<th>Package</th>
									<th>Time Remaining</th>
									
								</tr>
							</thead>
							<tbody>
							<?php if($match_found_error != NULL){
							echo $match_found_error;
							}?>
							<?php $dg=mysql_query("SELECT * FROM to_be_paid WHERE payee_bank_account_number='".$_SESSION['bank_account_number']."' AND payee_username='".$_SESSION['username']."'",$db);while($res=mysql_fetch_array($dg,MYSQL_ASSOC)):?>
								<tr>
									<td><img class="img-circle width-1" src="/assets/img/avatar2.jpg?1404026449" alt="" /></td>
									<td><?php echo $res['username'];?></td>
									<td><?php echo $res['bank_account_number'];?></td>
									<td><?php echo $res['package_amount'];?></td>
									<td><?php //echo round(date()-strtotime($res['datetime']));?></td>
								</tr>
								<?php endwhile;?>
							</tbody>
						</table>
					</div><!--end .section-body -->
				</section>
				</div>