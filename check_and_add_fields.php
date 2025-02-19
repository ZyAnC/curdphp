<?php
require_once 'db_connect.php';

// 检查字段是否存在
$result = $conn->query("SHOW COLUMNS FROM reservation LIKE 'name'");
$nameExists = $result->num_rows > 0;

$result = $conn->query("SHOW COLUMNS FROM reservation LIKE 'phone'");
$phoneExists = $result->num_rows > 0;

// 如果字段不存在，添加它们
if (!$nameExists || !$phoneExists) {
    $sql = "ALTER TABLE reservation ";
    if (!$nameExists) {
        $sql .= "ADD COLUMN name VARCHAR(255) AFTER reservation_id" . 
                ($phoneExists ? "" : ",");
    }
    if (!$phoneExists) {
        $sql .= "ADD COLUMN phone VARCHAR(20) AFTER email";
    }
    
    if ($conn->query($sql) === TRUE) {
        echo "Fields added successfully";
    } else {
        echo "Error adding fields: " . $conn->error;
    }
}

$conn->close();
?> 