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
    <title>About - Delish Bistro</title>
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
        <section class="about-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1503453776591-b4548af666a2?w=1600');">
            <div class="hero-content">
                <h1>Our Story</h1>
                <p>Passion for Fine Dining Since 2010</p>
            </div>
        </section>

        <!-- 关于我们部分 -->
        <section class="about-section section-padding">
            <div class="container">
                <div class="about-content">
                    <h2 class="section-title">About Delish Bistro</h2>
                    <p class="about-text">Founded in 2010, Delish Restaurant has been serving exceptional cuisine in the heart of Helsinki. Our commitment to quality ingredients, innovative recipes, and impeccable service has made us a destination for food lovers from around the world.</p>
                    <p class="about-text">Our team of passionate chefs combines traditional techniques with modern creativity to create unforgettable dining experiences. Every dish is crafted with care, using the finest seasonal ingredients sourced from local producers.</p>
                </div>
            </div>
        </section>

        <!-- 餐厅环境 -->
        <section class="interior-section section-padding">
            <div class="container">
                <h2 class="section-title">Our Space</h2>
                <div class="interior-grid">
                    <img src="https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?w=800" alt="Restaurant Interior" class="interior-image">
                    <img src="https://images.unsplash.com/photo-1484659619207-9165d119dafe?w=800" alt="Restaurant Interior" class="interior-image">
                    <img src="https://images.unsplash.com/photo-1504718855392-c0f33b372e72?w=800" alt="Restaurant Interior" class="interior-image">
                    <img src="https://images.unsplash.com/photo-1579027989536-b7b1f875659b?w=800" alt="Restaurant Interior" class="interior-image">
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

    <script src="logout.js"></script>
</body>
</html> 