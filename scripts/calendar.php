<?php
				$conn = mysqli_connect("localhost", "root", "", "assign", "3306");
				if(!$conn)
				{
					die("Connection Failed: ".mysql_connect_error());
				}
				if((date('Y')/4) == 0){
					$feb = 29;
				}
				else{
					$feb = 28;
				}
				
				$month_array = array(array("January",31),array("February",$feb),array("March",31),array("April",30),array("May",31),array("June",30),array("July",31),array("August",31),array("September",30),array("october",31),array("November",30),array("December",31));
				$month[6][7] = array();
				echo '
				<div class="col-lg-12" align="center">
					<h3>CALENDER</h3>
				</div>';
				for ($i=0; $i<count($month_array); $i++){
					
					echo '	<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">      
								<div class="month">
									<ul style="list-style-type:none;">
										<li style="text-align:center">
										'.$month_array[$i][0].'<br>
										<span style="font-size:18px">'.date('Y').'</span>
										</li>
									</ul>
								</div>
								
								<ul class="weekdays">
									<li>S</li>
									<li>M</li>
									<li>T</li>
									<li>W</li>
									<li>T</li>
									<li>F</li>
									<li>S</li>
								</ul>
									
								<ul class="days">';	
								
					$month_nos = sprintf("%02d", ($i+1));
					$day = date('D', strtotime(''.date('Y').'-'.$month_nos.'-01'));
					
					if($day == 'Sun'){ $day_no = 0;}
					else if($day == 'Mon'){ $day_no = 1;}
					else if($day == 'Tue'){ $day_no = 2;}
					else if($day == 'Wed'){ $day_no = 3;}
					else if($day == 'Thu'){ $day_no = 4;}
					else if($day == 'Fri'){$day_no = 5;} 
					else { $day_no = 6;}
					
					$check = 0;
					$days=1;
					$counter = $day_no;
					
					for($m=0; $m<6; $m++){
						for($n=0; $n<7; $n++){
							$sql = "SELECT * FROM events ORDER BY `time` ASC";
							$result = $conn->query($sql);
							
							$num_rows = mysqli_num_rows($result);
							$dae = '';
							$attr ;
							
							if($day_no > $n && $counter > 0){
								$month[$m][$n]="";
								$counter--;	
								echo '<li>'.$month[$m][$n].'</li>';
							}
							else{
								if($days <= $month_array[$i][1]){
									$dae .= ''.date('Y').'-'.($i+1).'-'.$days.'';
									$month[$m][$n]=$days;
									echo '<li';
									for($a=0; $a<$num_rows; $a++){
										while($row = mysqli_fetch_assoc($result)){
											$d1 = new DateTime($dae);
											$d2 = new DateTime($row['date']);
											if($d1 == $d2){
												echo ' style="border-radius: 70%;background-color:#1abc9c;"';
												break;
											}
										}
										
									}
										
									echo '><a href="'.$_SERVER['PHP_SELF'].'?month='.($i+1).'&date='.$month[$m][$n].'">'.$month[$m][$n].'</a></li>';
									$days++;
								}
								else{
									break;
								}
							}
						}
						
					}	

					echo '			</ul>
						  		</div>
							</div>
							<hr>';
				}