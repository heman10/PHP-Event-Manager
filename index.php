<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event Manager</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/calender.css" rel="stylesheet" type="text/css">
<link href="bootstrap-datetimepicker.js" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="padding-top: 70px">
    <div class="container-fluid">
    
    <?php include 'scripts/navbar.php';?>
    
        <div class="row">
        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" id="style-1" style="height:100%;overflow-y:scroll;position:absolute;">
                <?php  include 'scripts/calendar.php';?>
            </div>
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-4 col-xs-12 col-xs-offset-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php
						$link = urldecode($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
						if(!isset($_GET['month'])){		
							echo '						
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<div class="row">
											<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-sm-6 col-md-offset-3">
												<h2>EVENT MANAGER</h2>
											</div>
											<div class="col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2 col-sm-2 col-md-offset-1" align="center">
												<span class="glyphicon glyphicon-home"></span><a href="index.php" style="text-decoration:none;"> Home</a>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-lg-12">
											<div class="panel with-nav-tabs">
												<div class="panel-heading">
														<ul class="nav nav-tabs">
															<li class="active"><a href="#tab1" data-toggle="tab">TIMELINE</a></li>
															<li><a href="#tab2" data-toggle="tab">REMINDER</a></li>
														</ul>
												</div>
												<div class="panel-body">
													<div class="tab-content">
														<div class="tab-pane fade in active" id="tab1">';
							include 'scripts/timeline.php';
							echo'
														</div>
														<div class="tab-pane fade" id="tab2">';
							include 'scripts/html-form.php';
							echo '						
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							';	
						}
						
						else{
							$conn = mysqli_connect("localhost", "root", "", "assign", "3306");
							if(!$conn)
							{
								die("Connection Failed: ".mysql_connect_error());
							}
							$date = ''.date('Y').'-'.$_GET['month'].'-'.$_GET['date'].'';
							$sql = "SELECT * FROM events WHERE date = '$date' ORDER BY `time` ASC";
							$result = $conn->query($sql);

							echo '						
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<div class="row">
											<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-sm-6 col-md-offset-3">
												<h2>EVENT MANAGER</h2>
											</div>
											<div class="col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2 col-sm-2 col-md-offset-1" align="center">
												<span class="glyphicon glyphicon-home"></span><a href="index.php" style="text-decoration:none;"> Home</a>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12 col-lg-12">
											<div class="panel with-nav-tabs">
												<div class="panel-heading">
													<ul class="nav nav-tabs">
														<li class="active"><a href="#tab1" data-toggle="tab">TIMELINE</a></li>
													</ul>
												</div>
												<div class="panel-body">
													<div class="tab-content">
														<div class="tab-pane fade in active" id="tab1">
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-12" align="center">
																	<h2>EVENTS for '.$date.'</h2>
																</div>
																<div class="col-lg-12 col-md-12 col-sm-12">
																	<ul class="timeline">';
							
							while($row=mysqli_fetch_assoc($result)){
													
								if($counter%2 == 0){	
									echo'
											<li>
											  <div class="timeline-badge">'.$row['time'].'</div>
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
											  <div class="timeline-badge">'.$row['time'].'</div>
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
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>';	
						}
						
						
					?>
                    	</div>  
                	</div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                	<?php  include 'scripts/events.php';?>
            	</div>
            </div>
        </div> 
        <div class="container">
          <div class="row">
          <hr>
            <div class="col-lg-12">
              <div class="col-md-8">
                <a href="#">Terms of Service</a> | <a href="#">Privacy</a>    
              </div>
              <div class="col-md-4">
                <p class="muted pull-right">© 2017 Company Name. All rights reserved</p>
              </div>
            </div>
          </div>
        </div>
    </div>
     
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script> 
<script>
if(window.Notification && Notification.permission !== "denied") {
	Notification.requestPermission(function(status) {
		<?php
			$sql = "SELECT * FROM events";
			$result = $conn->query($sql);
			
			while($row=mysqli_fetch_assoc($result)){	
				$d1 = new DateTime($row['date']);;
				$d2 = ''.date('Y').'-'.date('M').'-'.date('d').'';
				$d2 = new DateTime($d2);
				if($d1 == $d2){
					echo '
						var n = new Notification("'.$row['name'].'", { 
							body: "'.$row['description'].'"
						}); 
					';	
				}
			}
		mysqli_close($conn);
		?>
	});
}
</script>
</body>
</html>