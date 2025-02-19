<?php
require_once 'db_connect.php';
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $email = $_SESSION['email'];
    
    try {
        // 确保只能取消自己的预约
        $stmt = $conn->prepare("DELETE FROM reservation WHERE reservation_id = ? AND email = ?");
        $stmt->bind_param("is", $id, $email);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false, 'message' => 'Reservation not found or not authorized'];
        }
        
        $stmt->close();
        $conn->close();
        
    } catch (Exception $e) {
        $response = ['success' => false, 'message' => 'An error occurred'];
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request'];
}

echo json_encode($response);
?> 