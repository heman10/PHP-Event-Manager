<?php

	$conn = mysqli_connect("localhost", "root", "", "assign", "3306");
	if(!$conn)
	{
		die("Connection Failed: ".mysql_connect_error());
	}
	
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
	$start_date = filter_input(INPUT_POST, 'start_date', FILTER_SANITIZE_STRING);
	$start_time = filter_input(INPUT_POST, 'start_time', FILTER_SANITIZE_STRING);
	$end_date = filter_input(INPUT_POST, 'end_date', FILTER_SANITIZE_STRING);
	$end_time = filter_input(INPUT_POST, 'end_time', FILTER_SANITIZE_STRING);	
	$start_date = new DateTime($start_date);
	$start_date = $start_date->format('Y.m.d');
	$start_time .= ':00';
	$start_datetime = ''.$start_date.' '.$start_time.'';
	
	$end_date = new DateTime($end_date);
	$end_date = $end_date->format('Y.m.d');
	$end_time .= ':00';
	$end_datetime = ''.$end_date.' '.$end_time.'';
	
	//$sql = "INSERT INTO events (name, description, start_datetime, end_datetime, date, time) VALUES ('$name', '$description', '$start_datetime', '$end_datetime', '$date', '$time')";
	//$result = $conn->query($sql);
	//header("Location: ../index.php?event=added");
	
	mysqli_close($conn);