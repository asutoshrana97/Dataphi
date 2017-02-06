<?php
	include('connection.php');

	if(isset($_GET['submit'])){
		$firstname 	= $_GET["first_name"] ;
		$lastname 	= $_GET["last_name"] ;
		$age 		= $_GET["age1"] ;
		$dob 		= $_GET["DOB"];
		$gender 	= $_GET["gender"] ;
		$contact 	= $_GET["phone"] ;
		$desc 		= $_GET["desc"] ;
	
	
		
		if (!$connect) {
			echo "Connection failed!";
		} 
		$db_check = "CREATE database if not exists dataphi";
		if(!mysqli_query($connect, $db_check)){
			echo "Error creating DATABASE";
		}
		$table_check = "CREATE TABLE `patients` (
						  `id` int(11) PRIMARY KEY NOT NULL,
						  `firstname` varchar(20) NOT NULL,
						  `lastname` varchar(20) NOT NULL,
						  `age` int(11) NOT NULL,
						  `dob` date NOT NULL,
						  `gender` varchar(10) NOT NULL,
						  `phone` bigint(20) NOT NULL,
						  `desp` text NOT NULL
						) if not exists `patients`";

		/*if(!mysqli_query($connect, $table_check)){
			echo "Error creating table";
		}*/

		$sql = "INSERT INTO patients ( `firstname`, `lastname`, `age`, `dob`, `gender`, `phone`, `desp`) VALUES (\"$firstname\", \"$lastname\", $age, \"$dob\", \"$gender\", $contact, \"$desc\")";

		echo $sql;
		if(!mysqli_query($connect, $sql)){
			echo "Error inserting data";
		}

		header("Location:index.html");
	}
	//echo "hello";
?>