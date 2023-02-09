<?php

include("../db.php");

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);
	$sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);

	if($count == 1) {
		echo "login_success";
				
		echo "<script> location.href='index.php'; </script>";
	} else {
		echo "<script>alert('Info Not found')</script>";
	}
	
}

?>
