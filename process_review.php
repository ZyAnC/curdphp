<?php
require_once 'db_connect.php';
header('Content-Type: application/json');
error_reporting(0); // 禁用错误输出
ini_set('display_errors', 0);
session_start();

if (!isset($_SESSION['email'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login first'
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $review_content = trim($_POST['comment'] ?? '');
        $email = $_SESSION['email'];
        $current_time = date('Y-m-d H:i:s'); // 获取当前时间

        // 验证输入
        if (empty($review_content)) {
            throw new Exception('Please write a review');
        }

        // 获取用户的 userid
        $userStmt = $conn->prepare("SELECT userid FROM users WHERE email = ?");
        if (!$userStmt) {
            throw new Exception("Database error: " . $conn->error);
        }

        $userStmt->bind_param("s", $email);
        if (!$userStmt->execute()) {
            throw new Exception("Error getting user info: " . $userStmt->error);
        }

        $userResult = $userStmt->get_result();
        if ($userResult->num_rows === 0) {
            throw new Exception("User not found");
        }

        $userData = $userResult->fetch_assoc();
        $userid = $userData['userid'];
        $userStmt->close();

        // 检查用户是否已经发表过评价
        $checkStmt = $conn->prepare("SELECT COUNT(*) as count FROM reviews WHERE userid = ?");
        if (!$checkStmt) {
            throw new Exception("Database error: " . $conn->error);
        }

        $checkStmt->bind_param("i", $userid);
        if (!$checkStmt->execute()) {
            throw new Exception("Error checking existing review: " . $checkStmt->error);
        }

        $result = $checkStmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['count'] > 0) {
            throw new Exception('You have already submitted a review. You can only submit one review.');
        }
        $checkStmt->close();

        // 在插入评价时添加评分
        $rating = intval($_POST['rating'] ?? 5);
        if ($rating < 1 || $rating > 5) {
            $rating = 5;
        }

        // 修改 INSERT 语句
        $stmt = $conn->prepare("INSERT INTO reviews (userid, review_content, time, rating) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Database error: " . $conn->error);
        }

        $stmt->bind_param("issi", $userid, $review_content, $current_time, $rating);
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to save review: " . $stmt->error);
        }

        echo json_encode([
            'success' => true,
            'message' => 'Review submitted successfully'
        ]);

    } catch (Exception $e) {
        error_log("Review error: " . $e->getMessage());
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    } finally {
        if (isset($stmt)) $stmt->close();
        if (isset($conn)) $conn->close();
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?> 