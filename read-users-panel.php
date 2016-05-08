<?php include('include/header-admin.php') ?>

<?php $results5 = user::read_users_role("5"); ?> <!--Here are all the users displayed from the database where you can edit there roles or inactivate them-->
<?php if($results5){ ?>
<div class="container">
	<div class="row">
		<div class="container__panel panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Admins</h1></div>
				<div class="panel-body">
					<table class="panel__table table table-striped"> 
						<thead> 
							<tr> 
								<th>Actions</th>
								<th>Username</th> 
								<th>Email</th> 
								<th>Role</th>
								<th>Last Login</th> 
							</tr> </thead> 
							<tbody>
								<?php
								foreach ($results5 as $row) { //display the users with the role of 5 which are admins
									?>

									<tr> 
										<td>
											<a href="user-role.php?id=<?php echo $row['user_id']?>&role=<?php echo 'downgrade_to_user'; ?>"><span class="glyphicon glyphicon-arrow-down" id="table__admin" aria-hidden="true"></span></a>
											<a href="user-role.php?id=<?php echo $row['user_id']?>&role=<?php echo 'session_logout'; ?>"><span class='glyphicon glyphicon-off' aria-hidden='true'></span></a>
										</td>
										<td><?php echo $row["username"]?></td> 
										<td><?php echo $row["email"] ?></td> 
										<td><?php echo $row["role"] ?></td>
										<td><?php echo $row["lastlogin"] ?></td> 
									</tr>

									<?php }

									?>
								</tbody> 
							</table>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php $results1 = user::read_users_role("1"); ?> <!--display the users with the role of 1 which are ordinary users-->
				<?php if($results1){ ?>
				<div class="row">
					<div class="container__panel panel panel-default">
						<div class="panel-heading">
							<h1 class="panel-title">Active</h1></div>
							<div class="panel-body">
								<table class="panel__table table table-striped"> 
									<thead> 
										<tr> 
											<th>Actions</th>
											<th>Username</th> 
											<th>Email</th> 
											<th>Role</th>
											<th>Last Login</th> 
										</tr> </thead> 
										<tbody>
											<?php
											foreach ($results1 as $row) {
												?>

												<tr> 
													<td>
														<a href="user-role.php?id=<?php echo $row['user_id']?>&role=<?php echo 'upgrade_to_admin'; ?>"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a>
														<a href="user-role.php?id=<?php echo $row['user_id']?>&role=<?php echo 'ban_user'; ?>"><span class='glyphicon glyphicon-arrow-down' aria-hidden='true'></span></a>
														<a href="user-role.php?id=<?php echo $row['user_id']?>&role=<?php echo 'session_logout'; ?>"><span class='glyphicon glyphicon-off' aria-hidden='true'></span></a>
													</td>
													<td><?php echo $row["username"]?></td> 
													<td><?php echo $row["email"] ?></td> 
													<td><?php echo $row["role"] ?></td>
													<td><?php echo $row["lastlogin"] ?></td> 
												</tr>

												<?php }

												?>
											</tbody> 
										</table>
									</div>
								</div>
							</div>
							<?php } ?>

							<?php $results0 = user::read_users_role("0"); ?> <!--display the users with the role of 0 which are pending / banned-->
							<?php if($results0){ ?>
							<div class="row">
								<div class="container__panel panel panel-default">
									<div class="panel-heading">
										<h1 class="panel-title">Pending / Banned</h1></div>
										<div class="panel-body">
											<table class="panel__table table table-striped"> 
												<thead> 
													<tr> 
														<th>Actions</th>
														<th>Username</th> 
														<th>Email</th> 
														<th>Role</th>
														<th>Last Login</th> 
													</tr> </thead> 
													<tbody>
														<?php
														foreach ($results0 as $row) {
															?>

															<tr> 
																<td>
																<a href="user-role.php?id=<?php echo $row['user_id']?>&role=<?php echo 'upgrade_to_user'; ?>"><span class='glyphicon glyphicon-arrow-up' aria-hidden='true'></span></a>

																<a href="user-role.php?id=<?php echo $row['user_id']?>&role=<?php echo 'delete_banned'; ?>"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>
																</td>
																<td><?php echo $row["username"]?></td> 
																<td><?php echo $row["email"] ?></td> 
																<td><?php echo $row["role"] ?></td>
																<td><?php echo $row["lastlogin"] ?></td> 
															</tr>

															<?php }

															?>
														</tbody> 
													</table>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
		<?php include('include/footer-admin.php') ?>