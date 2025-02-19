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
    <title>Menu - Delish Bistro</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="home-header">
        <?php include 'header.php'; ?>
    </header>

    <main>
        <section class="menu-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1488992783499-418eb1f62d08?w=1600');">
            <div class="hero-content">
                <br>
                <br>
                <br>
                <br>
                <h1>Menu</h1>
                <p>Savor the Flavors</p>
            </div>
            <div class="hero-border"></div>
        </section>
        <section class="menu-categories section-padding">
            <div class="container">
                <div class="category-section">
                    <h2 class="section-title">Appetizers</h2>
                    <div class="menu-grid">
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1637534370255-729b1bb3e7dc?w=800" alt="Caesar Salad">
                            <div class="menu-item-content">
                                <h3>Caesar Salad</h3>
                                <p>Fresh romaine lettuce, parmesan, croutons</p>
                                <span class="price">$12</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1541014741259-de529411b96a?w=800" alt="Bruschetta">
                            <div class="menu-item-content">
                                <h3>Vietnamese spring roll</h3>
                                <p>Shrimp, vegetables, herbs, and rice noodles wrapped in rice paper</p>
                                <span class="price">$10</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1722012988794-196d72bd12aa?w=800" alt="Tuna Tartare">
                            <div class="menu-item-content">
                                <h3>Tuna Tartare</h3>
                                <p>Fresh tuna with avocado and citrus dressing</p>
                                <span class="price">$16</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-section">
                    <h2 class="section-title">Main Courses</h2>
                    <div class="menu-grid">
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1619719015339-133a130520f6?w=800" alt="Ribeye Steak">
                            <div class="menu-item-content">
                                <h3>Ribeye Steak</h3>
                                <p>Grilled to perfection with herb butter</p>
                                <span class="price">$45</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1432139555190-58524dae6a55?w=800" alt="Lamb Chops">
                            <div class="menu-item-content">
                                <h3>Herb-Crusted Lamb Chops</h3>
                                <p>With mint sauce and roasted vegetables</p>
                                <span class="price">$42</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1582391123232-6130296f1fcd?w=800" alt="Duck Breast">
                            <div class="menu-item-content">
                                <h3>Pan-Seared Duck Breast</h3>
                                <p>With cherry sauce and wild rice</p>
                                <span class="price">$38</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1519233991914-26a44330ccd7?w=800" alt="Sea Bass">
                            <div class="menu-item-content">
                                <h3>Chilean Sea Bass</h3>
                                <p>With saffron risotto</p>
                                <span class="price">$40</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-section">
                    <h2 class="section-title">Seafood Specials</h2>
                    <div class="menu-grid">
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1588791174744-7e9bf4378277?w=800" alt="Lobster">
                            <div class="menu-item-content">
                                <h3>Grilled Lobster</h3>
                                <p>With drawn butter and asparagus</p>
                                <span class="price">$75</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1594030990808-ebd1c2247c28?w=800" alt="King Crab">
                            <div class="menu-item-content">
                                <h3>King Crab Legs</h3>
                                <p>Steamed with garlic butter</p>
                                <span class="price">$85</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-section">
                    <h2 class="section-title">Pasta Selection</h2>
                    <div class="menu-grid">
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1611270629569-8b357cb88da9?w=800" alt="Pasta">
                            <div class="menu-item-content">
                                <h3>Lobster Ravioli</h3>
                                <p>In vodka cream sauce</p>
                                <span class="price">$32</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1555949258-eb67b1ef0ceb?w=800" alt="Pasta">
                            <div class="menu-item-content">
                                <h3>Creamy Pasta</h3>
                                <p>In vodka cream sauce</p>
                                <span class="price">$32</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=800" alt="Pasta">
                            <div class="menu-item-content">
                                <h3>Pesto pasta</h3>
                                <p>In vodka cream sauce</p>
                                <span class="price">$32</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-section">
                    <h2 class="section-title">Vegetarian</h2>
                    <div class="menu-grid">
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1631311695255-8dde6bf96cb5?w=800" alt="Vegetarian">
                            <div class="menu-item-content">
                                <h3>Radish</h3>
                                <p>With quinoa and roasted vegetables</p>
                                <span class="price">$24</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800" alt="Vegetarian">
                            <div class="menu-item-content">
                                <h3>Ceasar Salad</h3>
                                <p>With quinoa and roasted vegetables</p>
                                <span class="price">$24</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1625337904517-2b7bf4ea164e?w=800" alt="Vegetarian">
                            <div class="menu-item-content">
                                <h3>Grilled Portobello</h3>
                                <p>With quinoa and roasted vegetables</p>
                                <span class="price">$24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-section">
                    <h2 class="section-title">Desserts</h2>
                    <div class="menu-grid">
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1712262582604-4cbafeeca156?w=800" alt="Tiramisu">
                            <div class="menu-item-content">
                                <h3>Classic Tiramisu</h3>
                                <p>Italian coffee-flavored dessert</p>
                                <span class="price">$12</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1624695172952-ea2b4113af7f?w=800" alt="Souffle">
                            <div class="menu-item-content">
                                <h3>Chocolate Soufflé</h3>
                                <p>With vanilla ice cream</p>
                                <span class="price">$15</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-section">
                    <h2 class="section-title">Beverages</h2>
                    <div class="menu-grid">
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1566452281814-fb749694b25d?w=800" alt="Wine">
                            <div class="menu-item-content">
                                <h3>Premium Wines</h3>
                                <p>Selected red and white wines</p>
                                <span class="price">from $45</span>
                            </div>
                        </div>
                        <div class="menu-item fade-in">
                            <img src="https://images.unsplash.com/photo-1542849187-5ec6ea5e6a27?w=800" alt="Cocktails">
                            <div class="menu-item-content">
                                <h3>Craft Cocktails</h3>
                                <p>Seasonal specialties</p>
                                <span class="price">$16</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
    function toggleNav() {
        var nav = document.getElementById('mainNav');
        if (nav.style.display === 'block') {
            nav.style.display = 'none';
        } else {
            nav.style.display = 'block';
        }
    }
    </script>
    <script src="logout.js"></script>
</body>
</html> 