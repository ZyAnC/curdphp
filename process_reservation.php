<?php
// 确保在任何输出之前设置这些头部
ob_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db_connect.php';
session_start();

// 清除任何已有的输出缓冲
ob_clean();

if (!isset($_SESSION['email'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login first'
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // 记录接收到的数据
        error_log("Received data: " . print_r($_POST, true));
        
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $date = $_POST['date'] ?? '';
        $time = $_POST['time'] ?? '';
        $partySize = $_POST['guests'] ?? '';
        $note = $_POST['special-requests'] ?? '';
        
        if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($time) || empty($partySize)) {
            throw new Exception('Please fill in all required fields');
        }
        
        $datetime = date('Y-m-d H:i:s', strtotime("$date $time"));
        
        // 检查数据库表结构
        $checkTable = $conn->query("DESCRIBE reservation");
        if (!$checkTable) {
            throw new Exception("Table structure error: " . $conn->error);
        }
        
        $stmt = $conn->prepare("INSERT INTO reservation (name, email, phone, time, party_size, note) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $bindResult = $stmt->bind_param("ssssss", $name, $email, $phone, $datetime, $partySize, $note);
        if ($bindResult === false) {
            throw new Exception("Bind failed: " . $stmt->error);
        }
        
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        echo json_encode([
            'success' => true,
            'message' => 'Reservation successful'
        ]);
        
    } catch (Exception $e) {
        error_log("Reservation error: " . $e->getMessage());
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
        if (isset($conn)) {
            $conn->close();
        }
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
exit;
?> 