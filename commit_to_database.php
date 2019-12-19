<?php
	$server = "localhost";
	$username = "root";
	$password = "RgthEpJFq6sQ";
	$db = "user_info";

	// create connection
	$conn = new mysqli($server, $username, $password, $db);

	if ($conn->connect_error) {
		die("Connection Failed");
	}

	$sani = $conn->prepare("INSERT INTO account_credentials (username, password, email) VALUES (?, ?, ?)");

	$sani->bind_param("sss", $usernameInput, $hashedPass, $emailInput);

	$usernameInput = $_POST["username"];
	$passwordInput = $_POST["password"];
	$emailInput = $_POST["email"];

	$hashedPass = password_hash($passwordInput, PASSWORD_DEFAULT);

	$conn->close();

	header("Location: /PHP-Testing/login.html");
?>