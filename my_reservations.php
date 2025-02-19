<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 如果用户未登录，重定向到登录页面
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations - Delish Bistro</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .reservations-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }
        
        .reservation-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .reservation-time {
            font-size: 1.2em;
            color: #9c8354;
            margin-bottom: 10px;
        }
        
        .reservation-details {
            color: #666;
        }
        
        .no-reservations {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        .cancel-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        
        .cancel-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header class="home-header">
        <?php include 'header.php'; ?>
    </header>

    <main>
        <div class="reservations-container">
            <h2>My Reservations</h2>
            <?php
            require_once 'db_connect.php';
            
            $email = $_SESSION['email'];
            
            // 准备查询语句
            $query = "SELECT * FROM reservation WHERE email = ? ORDER BY time DESC";
            $stmt = $conn->prepare($query);
            
            if ($stmt === false) {
                echo '<div class="no-reservations">';
                echo '<p>Error preparing statement: ' . $conn->error . '</p>';
                echo '</div>';
            } else {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="reservation-card">';
                        echo '<div class="reservation-time">' . date('F j, Y g:i A', strtotime($row['time'])) . '</div>';
                        echo '<div class="reservation-details">';
                        echo '<p>Party Size: ' . htmlspecialchars($row['party_size']) . ' people</p>';
                        if (!empty($row['note'])) {
                            echo '<p>Special Requests: ' . htmlspecialchars($row['note']) . '</p>';
                        }
                        echo '</div>';
                        echo '<button class="cancel-btn" onclick="cancelReservation(' . $row['reservation_id'] . ')">Cancel Reservation</button>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="no-reservations">';
                    echo '<p>You have no reservations.</p>';
                    echo '<a href="reservation.php" class="btn">Make a Reservation</a>';
                    echo '</div>';
                }
                
                $stmt->close();
            }
            $conn->close();
            ?>
        </div>
    </main>

    <script>
    function cancelReservation(id) {
        if (confirm('Are you sure you want to cancel this reservation?')) {
            fetch('cancel_reservation.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + id
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to cancel reservation');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred');
            });
        }
    }
    </script>

    <script src="logout.js"></script>
</body>
</html> 