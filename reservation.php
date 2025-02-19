<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation - Delish Bistro</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="home-header">
        <?php include 'header.php'; ?>
    </header>

    <main>
        <!-- 英雄区域 -->
        <section class="reservation-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1504718855392-c0f33b372e72?w=1600');">
            <div class="hero-content">
                <h1>Book a Table</h1>
                <p>Reserve Your Perfect Dining Experience</p>
            </div>
        </section>

        <!-- 预订表单部分 -->
        <section class="reservation-section section-padding">
            <div class="container">
                <div class="reservation-grid">
                    <!-- 预订信息 -->
                    <div class="reservation-info">
                        <h2 class="section-title">Dining Hours</h2>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h3>Lunch Service</h3>
                                <p>Monday - Friday: 11:00 AM - 3:00 PM</p>
                                <p>Saturday - Sunday: 10:00 AM - 3:00 PM</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-moon"></i>
                            <div>
                                <h3>Dinner Service</h3>
                                <p>Monday - Friday: 5:00 PM - 11:00 PM</p>
                                <p>Saturday - Sunday: 5:00 PM - 12:00 AM</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-info-circle"></i>
                            <div>
                                <h3>Special Notes</h3>
                                <p>For groups larger than 8 people, please contact us directly.</p>
                                <p>Tel: (358) 456-7890</p>
                                <p>Email: reservations@delishbistro.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- 预订表单 -->
                    <div class="reservation-form">
                        <h2 class="section-title">Make a Reservation</h2>
                        <form id="reservationForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" id="name" name="name" required>
                                    <label for="name">Your Name</label>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" name="email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="tel" id="phone" name="phone" required>
                                    <label for="phone">Your Phone</label>
                                </div>
                                <div class="form-group">
                                    <input type="number" id="guests" name="guests" min="1" max="8" required>
                                    <label for="guests">Number of Guests</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                                    <label for="date">Date</label>
                                </div>
                                <div class="form-group">
                                    <input type="time" id="time" name="time" required>
                                    <label for="time">Time</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea id="special-requests" name="special-requests" rows="4"></textarea>
                                <label for="special-requests">Special Requests (Optional)</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- 页脚 -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section footer-info">
                    <h3>Delish Bistro</h3>
                    <p>Crafting unforgettable dining experiences with passion and creativity since 2010.</p>
                </div>
                <div class="footer-section footer-hours">
                    <h4>Opening Hours</h4>
                    <p>Monday - Friday</p>
                    <p>11:00 AM - 11:00 PM</p>
                    <p>Saturday - Sunday</p>
                    <p>10:00 AM - 12:00 AM</p>
                </div>
                <div class="footer-section footer-contact">
                    <h4>Contact Info</h4>
                    <p>123 Ravintola Street</p>
                    <p>Helsinki, HL 01200</p>
                    <p>Tel: (358) 456-7890</p>
                    <p>Email: info@delishbistro.com</p>
                </div>
                <div class="footer-section footer-social">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Delish Bistro Restaurant. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        <?php if (!isset($_SESSION['email'])): ?>
            window.location.href = 'login.php';
            return;
        <?php endif; ?>
        
        const formData = new FormData(this);
        
        fetch('process_reservation.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text().then(text => {
                try {
                    return JSON.parse(text);
                } catch (e) {
                    console.error('Invalid JSON:', text);
                    throw new Error('Invalid JSON response');
                }
            });
        })
        .then(data => {
            if (data.success) {
                alert('Reservation successful!');
                window.location.href = 'my_reservations.php';
            } else {
                alert(data.message || 'Failed to make reservation');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your reservation');
        });
    });
    </script>

    <script src="logout.js"></script>
</body>
</html> 