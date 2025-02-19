<?php
require_once 'db_connect.php';

$sql = "ALTER TABLE reservation 
        ADD COLUMN name VARCHAR(255) AFTER reservation_id,
        ADD COLUMN phone VARCHAR(20) AFTER email";

if ($conn->query($sql) === TRUE) {
    echo "Table modified successfully";
} else {
    echo "Error modifying table: " . $conn->error;
}

$conn->close();
?> 