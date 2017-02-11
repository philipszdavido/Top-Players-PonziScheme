<br />
<br />
<section class="full-bleed">
					<div class="section-body style-default-dark force-padding text-shadow">
						<div class="img-backdrop" style="background-image: url('assets/img/img16.jpg')"></div>
						<div class="overlay overlay-shade-top stick-top-left height-3"></div>
						<div class="row">
							<div class="col-md-3 col-xs-5">
								<img class="img-circle border-white border-xl img-responsive auto-width" src="assets/img/avatar1.jpg?1403934956" alt="" />
								<br/><h1><?php echo $_SESSION['username'];?></h1><small>Profile</small></h3>
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
					<div class="section-body no-margin">
						<div class="row">
							<div class="col-md-12">

								<!-- BEGIN ENTER MESSAGE ->
								<form class="form">
									<div class="card no-margin">
										<div class="card-body">
											<div class="form-group floating-label">
												<textarea name="status" id="status" class="form-control autosize" rows="1"></textarea>
												<label for="status">What's on your mind?</label>
											</div>
										</div><!--end .card-body ->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<div class="pull-left">
													<a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-camera-alt"></i></a>
													<a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-location-on"></i></a>
													<a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-attach-file"></i></a>
												</div>
												<a href="javascript:void(0);" class="btn btn-flat btn-accent ink-reaction">Post</a>
											</div><!--end .card-actionbar-row ->
										</div><!--end .card-actionbar ->
									</div><!--end .card ->
								</form>-->

								<!-- BEGIN ENTER MESSAGE -->

								<!-- BEGIN MESSAGE ACTIVITY -->
								<div class="tab-pane" id="activity">
									<ul class="timeline collapse-lg timeline-hairline">
									<?php $prof=mysql_query("SELECT * FROM user WHERE username='".$_SESSION['username']."' AND bank_account_number='".$_SESSION['bank_account_number']."'",$db);
									$p=mysql_fetch_array($prof,MYSQL_ASSOC);?>
										<li class="timeline-inverted">
											<div class="timeline-circ circ-xl style-primary"><i class="md md-event"></i></div>
											<div class="timeline-entry">
												<div class="card style-default-light">
													<div class="card-body small-padding">
														<span class="text-medium"><a class="text-primary" href="#">Username</a><span class="text-primary"></span></span><br/>
														<span class="opacity-50">
															<?php echo $p['username'];?>
														</span>
													</div>
												</div>
											</div><!--end .timeline-entry -->
										</li><?php //endwhile;?>
										<li>
											<div class="timeline-circ circ-xl style-primary-dark"><i class="md md-access-time"></i></div>
											<div class="timeline-entry">
												<div class="card style-default-light">
													<div class="card-body small-padding">
														<p>
															<span class="text-medium">Bank Account Number<span class="text-primary"></span></span><br/>
															<span class="opacity-50">
																<?php echo $p['bank_account_number'];?>
															</span>
														</p>
														
													</div>
												</div>
											</div><!--end .timeline-entry -->
										</li>
										<li>
											<div class="timeline-circ circ-xl style-primary"><i class="md md-location-on"></i></div>
											<div class="timeline-entry">
												<div class="card style-default-light">
													<div class="card-body small-padding">
														<img class="img-circle img-responsive pull-left width-1" src="../../assets/img/avatar2.jpg?1404026449" alt="" />
														<span class="text-medium">Meeting in the <span class="text-primary">conference room</span></span><br/>
														<span class="opacity-50">
															Saturday, Juli 29, 2014
														</span>
													</div>
													<div class="card-body">
														<p><em>Walked all the way home...</em></p>
														<img class="img-responsive" src="../../assets/img/img14.jpg?1404589160" alt="" />
													</div>
												</div>
											</div><!--end .timeline-entry -->
										</li>
									</ul>
								</div><!--end #activity -->
							</div><!--end .col -->
							<!-- END MESSAGE ACTIVITY -->

						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
