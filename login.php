<?php
	session_start();
    $server = "localhost";
	$username = "root";
	$password = "RgthEpJFq6sQ";
	$db = "user_info";

	// create connection
	$conn = new mysqli($server, $username, $password, $db);

	if ($conn->connect_error) {
		die("Connection Failed: " . $conn->connection_error);
    }
    
    $sanitizer = $conn->prepare("SELECT passwordHash FROM account_credentials WHERE username = :user");

    $user = $_POST["username"];
	$password = $_POST["password"];
    $sanitizer->bind_param(':user', $user);

    $userdata = $sanitizer->execute();

    if password_verify($password, $userdata){
		$sanitizer = $conn->prepare("SELECT messageIDHash FROM account_credentials WHERE username = :user");
		$_SESSION['messageID'] = $conn->query("IF OBJECT_ID('account_credentials', 'u') IS NOT NULL");
		
	}
?>