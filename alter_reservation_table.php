<?php
require_once 'db_connect.php';

// 删除旧的外键约束
$conn->query("ALTER TABLE reservation DROP FOREIGN KEY IF EXISTS reservation_ibfk_1");

// 添加新字段（如果不存在）
$conn->query("ALTER TABLE reservation 
    ADD COLUMN IF NOT EXISTS name VARCHAR(255) AFTER reservation_id,
    ADD COLUMN IF NOT EXISTS phone VARCHAR(20) AFTER email
");

// 添加新的外键约束
$conn->query("ALTER TABLE reservation 
    ADD CONSTRAINT reservation_email_fk 
    FOREIGN KEY (email) REFERENCES users(email) 
    ON DELETE CASCADE
");

if ($conn->error) {
    echo "Error modifying table: " . $conn->error;
} else {
    echo "Reservation table modified successfully";
}

$conn->close();
?> 