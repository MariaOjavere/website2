<?php
$url = parse_url(getenv("JAWSDB_URL"));

$server = $url["host"];         
$username = $url["user"];        
$password = $url["pass"];        
$db = substr($url["path"], 1);  

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>