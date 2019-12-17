<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "user_info";

	// create connection
	$conn = new mysqli($server, $username, $password, $db);

	if ($conn->connect_error) {
		die("Connection Failed: " . $conn->connection_error);
	}
	echo "We did it<br>";

	$usernameInput = $_POST["username"];
	$passwordInput = $_POST["password"];

	$hashedPass = password_hash($passwordInput, PASSWORD_DEFAULT);
		
	echo $hashedPass;

	if (password_verify($passwordInput, $hashedPass)){
		echo "<br>This is it, chief!";
	}
	else {
		echo "<br>oh noes";
	}

	$sql = "INSERT INTO data (Username, Password) VALUES ('$usernameInput', '$hashedPass')";

	if ($conn->query($sql) === TRUE) {
		echo "<br>New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>