
<?php
	//start session
    if(!isset($_SESSION))
     {
         session_start();
    }
    else{
         session_destroy();
         session_start();
	}

	// connect to database
	$conn=mysqli_connect("localhost","root","","project");

	if(!$conn){
		echo 'Connection error: ' . mysqli_connect_error();
		//die(mysqli_error($conn));
	}

 ?>