<?php
require_once 'db_connect.php';
header('Content-Type: application/json');
session_start();

if (!isset($_SESSION['email'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login first'
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_id'])) {
    try {
        $reviewId = $_POST['review_id'];
        $email = $_SESSION['email'];

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

        // 确保用户只能删除自己的评价
        $stmt = $conn->prepare("DELETE FROM reviews WHERE review_id = ? AND userid = ?");
        if (!$stmt) {
            throw new Exception("Database error: " . $conn->error);
        }

        $stmt->bind_param("ii", $reviewId, $userid); // 注意这里用 ii 因为两个都是整数
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to delete review: " . $stmt->error);
        }

        if ($stmt->affected_rows === 0) {
            throw new Exception("Review not found or you don't have permission to delete it");
        }

        echo json_encode([
            'success' => true,
            'message' => 'Review deleted successfully'
        ]);

    } catch (Exception $e) {
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
        'message' => 'Invalid request'
    ]);
}
?> 