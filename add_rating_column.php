<?php
require_once 'db_connect.php';

$sql = "ALTER TABLE reviews ADD COLUMN rating INT NOT NULL DEFAULT 5 CHECK (rating BETWEEN 1 AND 5)";

if ($conn->query($sql) === TRUE) {
    echo "Rating column added successfully";
} else {
    echo "Error adding rating column: " . $conn->error;
}

$conn->close();
?> 