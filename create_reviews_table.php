<?php
require_once 'db_connect.php';

// 先删除旧表（如果存在的话）
$conn->query("DROP TABLE IF EXISTS reviews");

// 创建新的 reviews 表
$sql = "CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (email) REFERENCES users(email) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Reviews table created successfully";
} else {
    echo "Error creating table: " . $conn->error . "\nSQL: " . $sql;
}

// 显示表结构以验证
$result = $conn->query("DESCRIBE reviews");
if ($result) {
    echo "\n\nTable structure:\n";
    while ($row = $result->fetch_assoc()) {
        echo print_r($row, true) . "\n";
    }
}

$conn->close();
?> 