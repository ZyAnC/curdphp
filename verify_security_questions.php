<?php
require_once 'db_connect.php';

header('Content-Type: application/json');

try {
    // 获取POST数据
    $email = $_POST['email'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];

    // 查询用户
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND security_question_1 = ? AND security_question_2 = ?");
    $stmt->execute([$email, $answer1, $answer2]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Security questions verified']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid answers']);
    }

} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Verification failed: ' . $e->getMessage()]);
}

$conn = null;
?> 