<script language="javascript">
function purge(username,bank_account_number,package_amount,payee_username,payee_bank_account_number,datetime){
$('purgeModalLabel').html(payee_username);
$('#purgeModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">NO</button><button type="button" class="btn btn-primary" id="purge_payment">YES</button>');
$('#purgeModal').modal('show');
$('#purge_payment').click(function(){
$.ajax({
             type: 'GET',
			url: 'ajax/purge_payment.php?purge=1&username='+username+'&bank_account_number='+bank_account_number+'&package_amount='+package_amount+'&payee_username='+payee_username+'&payee_bank_account_number='+payee_bank_account_number+'&datetime='+datetime,
			dataType: 'html',
			success: function(html, textStatus) {
			$('#purgeModalLabel').html('');
			$('#purgeModalLabel').html(html);
			$('#purge_payment').click("");
			$('#purgeModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>');
			window.location.reload;
			},
			error: function(xhr, textStatus, errorThrown) {
			alert('An error occurred! ' + ( errorThrown ? errorThrown : xhr.status ));
			}
	});
	});
}


function confirm(username,bank_account_number,package_amount,payee_username,payee_bank_account_number){
$('simpleModalLabel').html(payee_username);
$('#simpleModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">NO</button><button type="button" class="btn btn-primary" id="confirm_payment">YES</button>');
$('#simpleModal').modal('show');
$('#confirm_payment').click(function(){
$.ajax({
             type: 'GET',
			url: 'ajax/confirm_payment.php?username='+username+'&bank_account_number='+bank_account_number+'&package_amount='+package_amount+'&payee_username='+payee_username+'&payee_bank_account_number='+payee_bank_account_number,
			dataType: 'html',
			success: function(html, textStatus) {
			$('#simpleModalLabel').html('');
			$('#simpleModalLabel').html(html);
			$('#confirm_payment').click("");
			$('#simpleModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>');
			window.location.reload;
			},
			error: function(xhr, textStatus, errorThrown) {
			alert('An error occurred! ' + ( errorThrown ? errorThrown : xhr.status ));
			}
	});
	});
}
</script>
<div id="content">
<?php require_once('../includes/config.php');?>
<?php /*if(mysql_num_rows(mysql_query("SELECT * FROM to_be_paid WHERE bank_account_number='".$_SESSION['bank_account_number']."' AND package_amount='".$_SESSION['package_amount']."'",$db))>0){
}*/

$qu=mysql_query("SELECT * FROM to_be_paid WHERE bank_account_number='".$_SESSION['bank_account_number']."'",$db);
?>
<section class="style-default-bright">
					<div class="section-body">
				<div class="alert alert-callout alert-success" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>
						<h2 class="text-primary">Confirmation Page</h2>
						
						<p>
							People <code>that</code> will pay you <code></code>.
						</p>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Pix</th>
									<th>User Name</th>
									<th>Account Number</th>
									<th>Package</th>
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr><?php if(mysql_num_rows($qu)>0):
									while($rw=mysql_fetch_array($qu,MYSQL_ASSOC)):
								?>
									<td><img class="img-circle width-1" src="assets/img/avatar2.jpg?1404026449" alt="" /></td>
									<td><?php echo $rw['payee_username'];?></td>
									<td><?php echo $rw['payee_bank_account_number'];?></td>
									<td><?php echo $rw['payee_package_number'];?></td>
									<td class="text-center">										<button type="button" class="btn ink-reaction btn-floating-action btn-primary" data-target="#simpleModal" data-toggle="tooltip modal" data-placement="top" data-original-title="Confirm Payment" onclick="javascript:confirm('<?php echo $rw['username'];?>','<?php echo $rw['bank_account_number'];?>','<?php echo $rw['package_amount'];?>','<?php echo $rw['payee_username'];?>','<?php echo $rw['payee_bank_account_number'];?>')"><i class="fa fa-check"></i></button>
									
									<button type="button" class="btn ink-reaction btn-primary" data-target="#simpleModal" data-toggle="tooltip modal" data-placement="top" data-original-title="Remove Payer" onclick="javascript:purge('<?php echo $rw['username'];?>','<?php echo $rw['bank_account_number'];?>','<?php echo $rw['package_amount'];?>','<?php echo $rw['payee_username'];?>','<?php echo $rw['payee_bank_account_number'];?>','<?php echo $rw['datetime'];?>')">PURGE</button>
									</td>
								</tr>
								<?php endwhile; 
								else:
									echo '<tr><td>You have no pending confirmations.</td></tr>';
								endif;?>
								<?php ?>
								<?php ?>
							</tbody>
						</table>
					</div><!--end .section-body -->
				</section>
				</div>
<div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="simpleModalLabel">Confirmation</h3>
			</div>
			<div class="modal-body">
				<p><h1>Do you want to confirm he has paid you?</h1></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
				<button type="button" class="btn btn-primary" id="confirm_payment">YES</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="purgeModal" tabindex="-1" role="dialog" aria-labelledby="purgeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="purgeModalLabel">Deleting</h3>
			</div>
			<div class="modal-body">
				<p><h1>Do you want to delete?</h1></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
				<button type="button" class="btn btn-primary" id="confirm_purge">YES</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
