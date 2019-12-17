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

	$sani = $db->prepare("INSERT INTO data (Username, Password) VALUES (:user, :hashpass)");
	$sani->bindParam(':user', $usernameInput);
	$sani->bindParam(':pass', $passwordInput);


	if ($sani->execute() === TRUE) {
		echo "<br>New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>