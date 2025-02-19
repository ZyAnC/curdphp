<?php
require_once 'db_connect.php';

header('Content-Type: application/json');

try {
    // 获取POST数据
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 查询用户
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // 验证密码
        if (password_verify($password, $user['password'])) {
            // 获取邮箱@前的部分作为显示名
            $username = explode('@', $user['email'])[0];
            
            // 启动会话并存储用户信息
            session_start();
            $_SESSION['user_id'] = $user['userid'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['display_name'] = $username;
            
            echo json_encode([
                'success' => true, 
                'message' => 'Login successful',
                'username' => $username
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found']);
    }

} catch(Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Login failed: ' . $e->getMessage()]);
}

$stmt->close();
$conn->close();
?> 