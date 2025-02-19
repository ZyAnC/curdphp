<?php
require_once 'db_connect.php';

// 删除评分字段
$sql = "ALTER TABLE reviews DROP COLUMN IF EXISTS rating";

if ($conn->query($sql) === TRUE) {
    echo "Rating column removed successfully";
} else {
    echo "Error removing rating column: " . $conn->error;
}

$conn->close();
?> 