<?php
require_once 'db_connect.php';
header('Content-Type: application/json');

// 添加调试信息
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 检查是否是 POST 请求
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method',
        'debug' => 'Expected POST request'
    ]);
    exit;
}

// 检查数据库连接
if (!isset($conn) || $conn->connect_error) {
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed',
        'debug' => $conn->connect_error ?? 'Connection not established'
    ]);
    exit;
}

// 记录接收到的POST数据
$post_data = file_get_contents('php://input');
error_log("Raw POST data: " . $post_data);
error_log("POST array: " . print_r($_POST, true));

// 获取POST数据
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$security_question_1 = $_POST['securityQuestion1'] ?? '';
$security_question_2 = $_POST['securityQuestion2'] ?? '';

// 验证是否收到所有必需的数据
if (empty($email) || empty($password) || empty($security_question_1) || empty($security_question_2)) {
    echo json_encode([
        'success' => false, 
        'message' => 'Missing required fields',
        'received_data' => [
            'email' => !empty($email),
            'password' => !empty($password),
            'security_question_1' => !empty($security_question_1),
            'security_question_2' => !empty($security_question_2)
        ],
        'debug' => 'Some required fields are empty'
    ]);
    exit;
}

try {
    // 验证邮箱是否已存在
    $check_email = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_email);
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode([
            'success' => false, 
            'message' => 'Email already exists',
            'debug' => 'Duplicate email found'
        ]);
        exit;
    }
    $stmt->close();

    // 密码加密
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 插入数据
    $insert_query = "INSERT INTO users (email, password, security_question_1, security_question_2) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    if (!$stmt) {
        throw new Exception("Prepare insert failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $email, $hashed_password, $security_question_1, $security_question_2);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true, 
            'message' => 'Account created successfully',
            'debug' => 'Data inserted into database'
        ]);
    } else {
        throw new Exception("Insert failed: " . $stmt->error);
    }

} catch (Exception $e) {
    error_log("Registration error: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'Registration failed',
        'debug' => $e->getMessage()
    ]);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($conn)) {
        $conn->close();
    }
}
?> 