<?php

	$conn = mysqli_connect("localhost", "root", "", "assign", "3306");
	if(!$conn)
	{
		die("Connection Failed: ".mysql_connect_error());
	}
	$sql = '';
	if(isset($_GET['month'])){
		$month = sprintf("%02d", $_GET['month']);
		$day = sprintf("%02d", $_GET['date']);
		$date = ''.date('Y').'-'.$month.'-'.$day.'';
		$sql .= "SELECT * FROM events WHERE date = '$date' ORDER BY `time` ASC";
	}
	else{
		$sql .= "SELECT * FROM events ORDER BY `start_datetime` ASC";
	}
	$result = $conn->query($sql);	
	$counter = 0;
	
	
	echo '	
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12" align="center">
						<h2>FULL YEAR TIMELINE</h2>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<ul class="timeline">';
	while($row=mysqli_fetch_assoc($result)){	
								
						if($counter%2 == 0){	
							echo'
									<li>
									  <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
									  <div class="timeline-panel">
											<div class="timeline-heading">
											<a  href="'.$_SERVER['PHP_SELF'].'/event_id='.$row['id'].'" id="a" rel="'.$row['id'].'"> 
												  <h4 class="timeline-title">'.$row['name'].'</h4></a>
												  <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> '.$row['start_datetime'].'</small> - <small class="text-muted"><i class="glyphicon glyphicon-time"></i> '.$row['end_datetime'].'</small></p>	
											</a>
											</div>
											<div class="timeline-body">
												  <p>'.$row['description'].'</p>
											</div>
						      		  	</div>
									</li>';
						}
						else if($counter%2 != 0){
							echo '
									<li class="timeline-inverted">
									  <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
									  <div class="timeline-panel">
									  		<div class="timeline-heading">
											<a  href="'.$_SERVER['PHP_SELF'].'/event_id='.$row['id'].'" id="a" rel="'.$row['id'].'"> 
												  <h4 class="timeline-title">'.$row['name'].'</h4></a>
												  <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> '.$row['start_datetime'].'</small> - <small class="text-muted"><i class="glyphicon glyphicon-time"></i> '.$row['end_datetime'].'</small></p>	
											</a>
											</div>
											<div class="timeline-body">
												  <p>'.$row['description'].'</p>
											</div>
									  </div>
									</li>';
						}
						$counter++;

	}
						echo '
									</ul>
								</div>
							</div>';	