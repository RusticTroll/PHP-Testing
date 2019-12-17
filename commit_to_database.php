<?php
	$server = "localhost";
	$username = "root";
	$password = "C9zOG2X9HhFwimjx";
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

	$sani = $db->prepare("INSERT INTO login_data (Username, Password) VALUES (:user, :hashpass)");
	$sani->bindParam(':user', $usernameInput);
	$sani->bindParam(':pass', $passwordInput);

	$conn->close();

	header("/PHP-Testing/login.html");
?>