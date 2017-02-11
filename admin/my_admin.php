<div class="row">
<br />
</div>
<div id="content">
<section>
						<div class="row">

							<!-- BEGIN LAYOUT LEFT SIDEBAR -->
							<div class="section-body">
								<div class="card tabs-left style-default-light">
									<ul class="card-head nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#members">MEMBERS</a></li>
										<li><a href="#payment_queue">PAYMENT QUEUE</a></li>
										<li><a href="#payment_list">PAYMENT LISTS</a></li>
										<li><a href="#messages">MESSAGES</a></li>
										<li><a href="#mem_packages">MEMBERS WITH PACKAGES</a></li>
									</ul>
									<div class="card-body tab-content style-default-bright">
									<div class="tab-pane" id="members">
									<div class="card-body">
										<h1><i class="fa fa-fw fa-clock-o text-accent"></i>MEMBERS</h1>
										<ul class="list" data-sortable="true">
										<?php $mem=mysql_query("SELECT * FROM user",$db);
									while($u=mysql_fetch_array($mem,MYSQL_ASSOC)):?>
											<li class="tile">
												<div class="checkbox checkbox-styled tile-text">
													<label>
														<input type="checkbox" checked>
														<span><?php echo $u['username'];?></span>
													</label>
												</div>
												<a class="btn btn-flat ink-reaction btn-default" onclick="javascript:delete_user('<?php echo $u['username'];?>','<?php echo $u['phone_number'];?>','<?php echo $u['bank_account_number'];?>')">
													<i class="md md-delete"></i>
												</a>
											</li><?php endwhile;?>
										</ul></div>
										</div>
										<div class="tab-pane" id="payment_queue"><div class="card-body">
											<h1><i class="fa fa-fw fa-clock-o text-accent"></i>PAYMENT QUEUE</h1>
										<ul class="list"><?php $pay_queue=mysql_query("SELECT * FROM payment_queue",$db);
										while($r=mysql_fetch_array($pay_queue,MYSQL_ASSOC)):?>
											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-text">
														<?php echo $r['username'];?>
														<small>
															#<?php echo $r['package_amount'];?>
														</small>
													</div>
												</a>
												<a class="btn btn-flat ink-reaction" onclick="javascript:delete_pay_queue('<?php echo $r['username'];?>','<?php echo $r['package_amount'];?>','<?php echo $r['bank_account_number'];?>')">
													<i class="fa fa-pencil"></i>
												</a>
											</li><?php endwhile;?>
											</ul></div>
								</div>
										<div class="tab-pane" id="payment_list"><div class="card-body">
										<h1><i class="fa fa-fw fa-clock-o text-accent"></i>PAYMENT LIST</h1><p><table class="table table-hover">
							<thead>
								<tr>
									<th>Pix</th>
									<th>User Name</th>
									<th>Account Number</th>
									<th>Package</th>
									<th>Payer</th>
									<th>Time Remaining</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody><tr>
							<?php $pay_list=mysql_query("SELECT * FROM to_be_paid",$db);
										while($pl=mysql_fetch_array($pay_list,MYSQL_ASSOC)):?>
							<td><img class="img-circle width-1" src="assets/img/avatar2.jpg?1404026449" alt="" /></td>
							<td><?php echo $pl['username'];?></td>
							<td><?php echo $pl['bank_account_number'];?></td>
							<td><?php echo $pl['package_amount'];?></td>
							<td><?php echo $pl['payee_username'];?></td>
							<td></td>
							<td><button type="button" class="btn ink-reaction btn-primary" data-target="#simpleModal" data-toggle="tooltip modal" data-placement="top" data-original-title="Remove Payer" onclick="javascript:delete_pay_list('<?php echo $pl['username'];?>','<?php echo $pl['bank_account_number'];?>','<?php echo $pl['package_amount'];?>','<?php echo $pl['payee_username'];?>','<?php echo $pl['payee_bank_account_number'];?>','<?php echo $pl['datetime'];?>)">REMOVE</button></td>
							<?php endwhile;?>
							</tr>
							</tbody>
							</table>
						</p>			
										</div></div>
										<div class="tab-pane" id="messages">
										<h1><i class="fa fa-fw fa-clock-o text-accent"></i>MESSAGES</h1>
										
										</div>
										<div class="tab-pane" id="mem_packages"><div class="card-body">
											<h1><i class="fa fa-fw fa-clock-o text-accent"></i>ACTIVE USERS</h1>
											<?php $active_users=mysql_query("SELECT * FROM package",$db);?>
										<ul class="list"><?php while($au=mysql_fetch_array($active_users,MYSQL_ASSOC)):?>
											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-text">
														<?php echo $au['username'];?>
														<small>
															#<?php echo $au['package_amount'];?>
														</small>
													</div>
												</a>
												<a class="btn btn-flat ink-reaction" onclick="javascript:delete_user_package('<?php echo $au['username'];?>','<?php echo $au['package_amount'];?>','<?php echo $au['bank_account_number'];?>')">
													<i class="fa fa-pencil"></i>
												</a>
											</li>
											
											<?php endwhile;?></ul></div>
											</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Admin as <code><?php echo $_SESSION['username'];?></code></em>
							</div><!--end .col -->
							<!-- END LAYOUT LEFT SIDEBAR -->

</div>
</section>
</div>