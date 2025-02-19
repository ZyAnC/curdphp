<?php
error_reporting(0);
ini_set('display_errors', 0);

$servername = "localhost";
$username = "zheng23001";
$password = "56X9VqV9";
$dbname = "wp_zheng23001";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode([
        'success' => false,
        'message' => 'Database connection failed'
    ]));
}
?> 
