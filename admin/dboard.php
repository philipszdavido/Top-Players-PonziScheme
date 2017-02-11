<script language="javascript">
window.addEventListener("load",chg);
function chg(){
$('#msgDangerModal').modal('show');
}
function signup_alert(package_amount,user,bank_account_number)
{
var htm='Package: ';
$('#simpleModalLabel').html(htm+'#'+package_amount);
$('#simpleModalBody').html('Username:'+user+'   <p>Bank Account Number:'+bank_account_number+'</p>');
$('#simpleModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">NO</button><button type="button" class="btn btn-primary" id="signup_package">YES</button>');
$('#simpleModal').modal('show');
$('#signup_package').click(function(){
//alert('Username:'+user+'   <p>Bank Account Number:'+bank_account_number+'</p>');
$.ajax({
             type: 'GET',
			url: 'ajax/signup_package.php?username='+user+'&bank_account_number='+bank_account_number+'&package_amount='+package_amount,
			dataType: 'html',
			success: function(html, textStatus) {
			$('#simpleModalLabel').html('');
			$('#simpleModalLabel').html(html);
			$('#simpleModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>');
			$('#signup_package').click(function(){});
			},
			error: function(xhr, textStatus, errorThrown) {
			alert('An error occurred! ' + ( errorThrown ? errorThrown : xhr.status ));
			}
	});

});
}
</script>
<div id="content">
			<section class="full-bleed">
					<div class="section-body style-default-dark force-padding text-shadow">
						<div class="img-backdrop" style="background-image: url('assets/img/img16.jpg')"></div>
						<div class="overlay overlay-shade-top stick-top-left height-3"></div>
						<div class="row">
							<div class="col-md-3 col-xs-5">
								<img class="img-circle border-white border-xl img-responsive auto-width" src="assets/img/avatar1.jpg?1403934956" alt="" />
								<br/><h1><?php echo $_SESSION['username'];?></h1><small>Work Place</small></h3>
							</div><!--end .col -->
							<div class="col-md-9 col-xs-7">
								<div class="width-3 text-center pull-right">
									<strong class="text-xl">643</strong><br/>
									<span class="text-light opacity-75">followers</span>
								</div>
								<div class="width-3 text-center pull-right">
									<strong class="text-xl">108</strong><br/>
									<span class="text-light opacity-75">following</span>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
							<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Contact me"><i class="fa fa-envelope"></i></a>
							<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Follow me"><i class="fa fa-twitter"></i></a>
							<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Personal info"><i class="fa fa-facebook"></i></a>
						</div>
					</div><!--end .section-body -->
				</section>
				<section>
					<h2 class="text-primary">Stats</h2>
					<div class="section-body">
						<div class="row">

							<!-- BEGIN ALERT - REVENUE -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-info no-margin">
											<strong class="pull-right text-success text-lg"><?php echo mysql_num_rows(mysql_query("SELECT * FROM to_be_paid WHERE username='".$_SESSION['username']."' AND bank_account_number='".$_SESSION['bank_account_number']."'",$db));?><i class="md md-done"></i></strong>
											<strong class="text-xl">Confirmations</strong><br/>
											<span class="opacity-50">Dashboard</span>
											<div class="stick-bottom-left-right">
												<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
											</div>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - REVENUE -->

							<!-- BEGIN ALERT - VISITS -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-warning no-margin">
											<strong class="pull-right text-warning text-lg"><?php echo mysql_num_rows(mysql_query("SELECT * FROM to_be_paid WHERE payee_username='".$_SESSION['username']."' AND payee_bank_account_number='".$_SESSION['bank_account_number']."'",$db));?><i class="md md-swap-vert"></i></strong>
											<strong class="text-xl">Pending Payments</strong><br/>
											<span class="opacity-50">Dashboard</span>
											<div class="stick-bottom-right">
												<div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
											</div>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - VISITS -->

							<!-- BEGIN ALERT - BOUNCE RATES -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-danger no-margin">
											<strong class="pull-right text-danger text-lg"><?php echo mysql_num_rows(mysql_query("SELECT * FROM package WHERE username='".$_SESSION['username']."' AND bank_account_number='".$_SESSION['bank_account_number']."'",$db));?><i class="md md-folder"></i></strong>
											<strong class="text-xl">Packages</strong><br/>
											<span class="opacity-50">Dashboard</span>
											<div class="stick-bottom-left-right">
												<div class="progress progress-hairline no-margin">
													<div class="progress-bar progress-bar-danger" style="width:43%"></div>
												</div>
											</div>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - BOUNCE RATES -->

							<!-- BEGIN ALERT - TIME ON SITE -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-success no-margin">
											<h1 class="pull-right text-success">100<i class="md md-email"></i></h1>
											<strong class="text-xl">Messsages</strong><br/>
											<span class="opacity-50">Dashboard</span>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - TIME ON SITE -->

						</div><!--end .row -->
						<h2 class="text-primary">Packages Lists</h2>
						<div class="row">
						<?php $arr=array('Amatuer'=>'10,000','Beginner'=>'20,000','Professional'=>'50,000','Top Player'=>'100,000','Jackpot'=>'200,000');?>
						<?php foreach($arr as $key=>$value):?>
								<div class="col-sm-3">
									<div class="card card-type-pricing text-center">
										<div class="card-body style-gray">
											<h2 class="text-light"><?php echo $key;?></h2>
											<div class="price">
												<span class="text-xxxl">#</span><h2><span class="text-xxl">
												<?php echo $value;?>
												</span></h2> <span></span>
											</div>
											<br/>
											<p class="opacity-50"><em><!-- sth was here--></em></p>
										</div><!--end .card-body -->
										<div class="card-body no-padding">
											<ul class="list-unstyled">
												<li>2:1 Matrix</li>
												<li>x2 Profit</li>
												<li>Forced Matching</li>
												<li>24/7 Customer Support</li>
											</ul>
										</div><!--end .card-body -->
										<div class="card-body">
											<a class="btn btn-default" onclick="javascript:signup_alert('<?php echo $value;?>','<?php echo $_SESSION['username'];?>','<?php echo $_SESSION['bank_account_number'];?>')">GET STARTED</a>
										</div><!--end .card-body -->
									</div><!--end .card -->
								</div><?php endforeach;?><!--end .col --><!--
								<div class="col-md-3">
									<div class="card card-type-pricing text-center">
										<div class="card-body style-gray">
											<h2 class="text-light">Standard</h2>
											<div class="price">
												<span class="text-lg">$</span><h2><span class="text-xxxl">15</span></h2> <span>/mo</span>
											</div>
											<br/>
											<p class="opacity-50"><em>Rame aute irure dolor in reprehenderit pariatur.</em></p>
										</div><!--end .card-body ->
										<div class="card-body no-padding">
											<ul class="list-unstyled">
												<li>40 Pages</li>
												<li>200 GB Bandwidth</li>
												<li>2 GB Storage</li>
												<li>24/7 Customer Support</li>
											</ul>
										</div><!--end .card-body ->
										<div class="card-body">
											<a class="btn btn-default">Sign up</a>
										</div><!--end .card-body ->
									</div><!--end .card ->
								</div><!--end .col ->
								<div class="col-md-3">
									<div class="card card-type-pricing text-center">
										<div class="card-body style-primary">
											<h2 class="text-light">Pro</h2>
											<div class="price">
												<span class="text-lg">$</span><h2><span class="text-xxxl">28</span></h2> <span>/mo</span>
											</div>
											<br/>
											<p class="opacity-50"><em>Rame aute irure dolor in reprehenderit pariatur.</em></p>
										</div><!--end .card-body ->
										<div class="card-body no-padding">
											<ul class="list-unstyled">
												<li>Unlimited</li>
												<li>500 GB Bandwidth</li>
												<li>6 GB Storage</li>
												<li>24/7 Customer Support</li>
											</ul>
										</div><!--end .card-body ->
										<div class="card-body">
											<a class="btn btn-primary">Sign up</a>
										</div><!--end .card-body ->
									</div><!--end .card ->
								</div><!--end .col ->
								<div class="col-md-3">
									<div class="card card-type-pricing text-center">
										<div class="card-body style-gray">
											<h2 class="text-light">Enterprise</h2>
											<div class="price">
												<span class="text-lg">$</span><h2><span class="text-xxxl">56</span></h2> <span>/mo</span>
											</div>
											<br/>
											<p class="opacity-50"><em>Rame aute irure dolor in reprehenderit pariatur.</em></p>
										</div><!--end .card-body ->
										<div class="card-body no-padding">
											<ul class="list-unstyled">
												<li>Unlimited</li>
												<li>1 TB Bandwidth</li>
												<li>10 GB Storage</li>
												<li>24/7 Customer Support</li>
											</ul>
										</div><!--end .card-body ->
										<div class="card-body">
											<a class="btn btn-default">Sign up</a>
										</div><!--end .card-body ->
									</div><!--end .card ->
								</div><!--end .col -->
							</div><!--end .row -->
						
					</div><!--end .section-body -->
				</section>
			</div>
<div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="simpleModalLabel">Package</h3>
			</div>
			<div class="modal-body" id="simpleModalBody">
				<p><h1>Do you want to confirm he has paid you?</h1></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
				<button type="button" class="btn btn-primary" id="signup_package">YES</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="msgDangerModal" tabindex="-1" role="dialog" aria-labelledby="msgDangerModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="msgDangerModalLabel">WARNING</h3>
			</div>
			<div class="modal-body" id="msgDangerModalBody">
				<p><h1>Admin has no license of whatever fraud you may encounter.</h1></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				<!--<button type="button" class="btn btn-primary" id="signup_package">YES</button>-->
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

