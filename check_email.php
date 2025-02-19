<?php
require_once 'db_connect.php';

header('Content-Type: application/json');

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    
    try {
        // 使用 mysqli 而不是 PDO
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];
        
        echo json_encode([
            'exists' => $count > 0,
            'message' => $count > 0 ? 'This email is already registered' : 'Email is available'
        ]);
    } catch (Exception $e) {
        echo json_encode([
            'error' => true,
            'message' => 'Database error occurred'
        ]);
    }
} else {
    echo json_encode([
        'error' => true,
        'message' => 'No email provided'
    ]);
}

// 关闭数据库连接
if (isset($stmt)) {
    $stmt->close();
}
if (isset($conn)) {
    $conn->close();
}
?> 