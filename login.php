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
		header("Location: /PHP-Testing/messageboard.php");
		
		
	}
?>