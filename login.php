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
    
    $sanitizer = $db->prepare("SELECT * FROM data WHERE Username = :user");

    $user = $_POST["username"];
    $sanitizer->bindParam(':user', $user);

    $userdata = $sanitizer->execute();
    echo $userdata;
?>