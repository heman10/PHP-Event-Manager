<?php

	$conn = mysqli_connect("localhost", "root", "", "assign", "3306");
	if(!$conn)
	{
		die("Connection Failed: ".mysql_connect_error());
	}
	
	$date = date('Y-M-d');
	
	$sql = "SELECT * FROM events WHERE date > CURDATE() ORDER BY 'datetime' ASC";
	$result = $conn->query($sql);	
	echo '
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12" align="center">
					<h3>UPCOMING EVENTS</h3>
					<hr>
				</div>';
	while($row=mysqli_fetch_assoc($result)){
		echo '
				<div class="col-lg-12 col-md-12 col-sm-12" align="center">
					<div class="col-lg-12 col-md-12 col-sm-12">
						'.$row['name'].'
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12"><i class="glyphicon glyphicon-time"></i> 
						'.$row['start_datetime'].'<hr>
					</div>
					<hr>
				</div>
				<br>
		';	
	}
	echo '</div>';