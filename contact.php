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
    <title>Contact - Delish Bistro</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="home-header">
        <?php include 'header.php'; ?>
    </header>

    <main>
        <section class="contact-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?w=1600');">
            <div class="hero-content">
                <h1>Contact Us</h1>
                <p>We'd Love to Hear From You</p>
            </div>
        </section>

        <section class="contact-section section-padding">
            <div class="container">
                <div class="contact-grid">
                    <div class="contact-info">
                        <h2 class="section-title">Get in Touch</h2>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h3>Location</h3>
                                <p>123 Ravintola Street</p>
                                <p>Helsinki, 01200</p>
                                <p>Finland</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h3>Opening Hours</h3>
                                <p>Monday - Friday: 11:00 AM - 11:00 PM</p>
                                <p>Saturday - Sunday: 10:00 AM - 12:00 AM</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h3>Contact</h3>
                                <p>Tel: (358) 456-7890</p>
                                <p>Email: info@delishbistro.com</p>
                            </div>
                        </div>
                        <div class="social-links contact-social">
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

                    <div class="contact-form">
                        <h2 class="section-title">Send us a Message</h2>
                        <form id="contactForm">
                            <div class="form-group">
                                <input type="text" id="name" name="name" required>
                                <label for="name">Your Name</label>
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" name="email" required>
                                <label for="email">Your Email</label>
                            </div>
                            <div class="form-group">
                                <input type="tel" id="phone" name="phone">
                                <label for="phone">Your Phone (Optional)</label>
                            </div>
                            <div class="form-group">
                                <textarea id="message" name="message" required></textarea>
                                <label for="message">Your Message</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
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

    <script src="logout.js"></script>
</body>
</html> 