<?php
require_once 'db_connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $partySize = intval($_POST['guests'] ?? 0);
    
    try {
        // 检查选择的时间是否在营业时间内
        $stmt = $conn->prepare("
            SELECT COUNT(*) as count 
            FROM time_slots 
            WHERE ? BETWEEN time_start AND time_end
        ");
        $stmt->bind_param("s", $time);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['count'] == 0) {
            echo json_encode([
                'available' => false,
                'message' => 'Selected time is outside business hours'
            ]);
            exit;
        }
        
        // 检查该时间段的当前预约人数
        $datetime = date('Y-m-d H:i:s', strtotime("$date $time"));
        $stmt = $conn->prepare("
            SELECT SUM(party_size) as total_guests
            FROM reservations
            WHERE DATE(time) = DATE(?)
            AND HOUR(time) = HOUR(?)
            AND status != 'cancelled'
        ");
        $stmt->bind_param("ss", $datetime, $time);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $currentGuests = intval($row['total_guests'] ?? 0);
        $maxCapacity = 20; // 从 time_slots 表获取
        
        if (($currentGuests + $partySize) > $maxCapacity) {
            echo json_encode([
                'available' => false,
                'message' => 'Sorry, this time slot is fully booked'
            ]);
        } else {
            echo json_encode([
                'available' => true,
                'message' => 'Time slot is available'
            ]);
        }
        
    } catch (Exception $e) {
        echo json_encode([
            'available' => false,
            'message' => 'An error occurred'
        ]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode([
        'available' => false,
        'message' => 'Invalid request method'
    ]);
}
?> 