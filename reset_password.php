<?php
require_once 'db_connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $securityAnswer1 = trim($_POST['securityAnswer1'] ?? '');
    $securityAnswer2 = trim($_POST['securityAnswer2'] ?? '');
    $newPassword = $_POST['newPassword'] ?? '';
    
    try {
        // 验证邮箱和安全问题答案
        $stmt = $conn->prepare("SELECT userid FROM users WHERE email = ? AND security_question_1 = ? AND security_question_2 = ?");
        $stmt->bind_param("sss", $email, $securityAnswer1, $securityAnswer2);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row['userid'];
            
            // 更新密码
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt->close();
            
            $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE userid = ?");
            $updateStmt->bind_param("si", $hashedPassword, $userId);
            $updateStmt->execute();
            
            if ($updateStmt->affected_rows > 0) {
                $response = [
                    'success' => true,
                    'message' => 'Password has been reset successfully'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Password update failed'
                ];
            }
            $updateStmt->close();
        } else {
            $response = [
                'success' => false,
                'message' => 'Invalid security answers or email'
            ];
        }
    } catch (Exception $e) {
        $response = [
            'success' => false,
            'message' => 'An error occurred while resetting password'
        ];
    }
    
    if (isset($conn)) {
        $conn->close();
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Invalid request method'
    ];
}

echo json_encode($response);
?> 