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
	$emailInput = $_POST["email"];

	$hashedPass = password_hash($passwordInput, PASSWORD_DEFAULT);
	echo "hashed";

	$sani = $db->prepare("INSERT INTO login_data (username, password, email) VALUES (:user, :hashpass, :email)");
	echo "perpared";

	$sani->bindParam(':user', $usernameInput);
	$sani->bindParam(':hashpass', $passwordInput);
	$sani->bindParam(':email', $emailInput);

	echo "we are here";
	echo $sani->execute();

	$conn->close();

	header("Location: http://3.216.36.237/PHP-Testing/login.html");
?>