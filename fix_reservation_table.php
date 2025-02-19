<?php
require_once 'db_connect.php';

// 先删除旧的外键约束
$conn->query("ALTER TABLE reservation DROP FOREIGN KEY IF EXISTS reservation_ibfk_1");

// 重新创建预约表
$sql = "CREATE TABLE IF NOT EXISTS reservation (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    time DATETIME NOT NULL,
    party_size INT NOT NULL,
    note TEXT,
    FOREIGN KEY (email) REFERENCES users(email) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Reservation table modified successfully";
} else {
    echo "Error modifying table: " . $conn->error;
}

$conn->close();
?> 