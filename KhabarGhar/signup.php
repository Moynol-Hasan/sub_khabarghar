<?php


		$name = $_POST['name'];
		$email = $_POST['email'];
        $address= $_POST['address'];
        $number=$_POST['number'];
		$password = $_POST['password'];
		$con_password = $_POST['con_password'];

		if($password!=$con_password)
		{
			die("Password did not match"); // IF both password and confirm password did not match 
			                               // while signup then it show password didnot match.
		}


	$connection= mysqli_connect('localhost','root','','khabarghar'); //connecting the phpmyadmin database.

	if(!$connection)
	{
		die("failed". mysqli_error($connection));
	}

	$query = "INSERT INTO signup VALUES ('$name', '$email', '$address','$number','$password')"; //Inserting values to the database.

	$final=mysqli_query($connection,$query);
	if($final){
		//echo"Registration Successful..."; //If everything filled correctly then output shows registration successful.
		$html = file_get_contents('successfull.html');
		echo $html;
	
	}
	else{
		echo"Email already in used.";  // While registration the mail user entered is already used by someone else then it shows 
									   // email already in used.
	}

?>