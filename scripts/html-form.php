<?php
	echo '	<form action="scripts/form.php" method="POST">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<h4>Reminder Name</h4>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8">
								<input class="form-control" type="text" name="name">
							</div>
						</div>
					<br>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<h4>Reminder Description</h4>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8">
								<input class="form-control" type="text" name="description">
							</div>
						</div>
					<br>
					</div>';
		
	echo'	<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
								<h4>Reminder Start Date</h4>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<input class="form-control" type="date" name="start_date">
						</div>
					</div>
				<br>
				</div>';		
	echo '		<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<h4>Reminder Start Time</h4>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<input class="form-control" type="time" name="start_time">
						</div>
					</div>
				<br>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
								<h4>Reminder End Date</h4>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<input class="form-control" type="date" name="end_date">
						</div>
					</div>
				<br>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<h4>Reminder End Time</h4>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<input class="form-control" type="time" name="end_time">
						</div>
					</div>
				<br>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offet-4 col-sm-4">
							<input type="submit" class="btn btn-primary" value="Set Reminder"></button>
						</div>
					</div>
				<br>
				</div>
			</div>
			</form>';