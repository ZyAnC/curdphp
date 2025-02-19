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
    <title>Home - Delish Bistro</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="home-header">
        <?php include 'header.php'; ?>
    </header>

    <section class="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1488992783499-418eb1f62d08?w=1600');">
        <div class="hero-content">
            <h1>Welcome to Delish Bistro</h1>
            <p>Experience Fine Dining at its Best</p>
        </div>
        <div class="hero-border"></div>
    </section>

    <section class="menu-categories section-padding">
        <div class="container">
            <!-- 前菜 Appetizers -->
            <div class="category-section">
                <h2 class="section-title">Appetizers</h2>
                <div class="menu-grid">
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1580013759032-c96505e24c1f?w=800" alt="Caesar Salad">
                        <div class="menu-item-content">
                            <h3>Caesar Salad</h3>
                            <p>Fresh romaine lettuce, parmesan, croutons</p>
                            <span class="price">$12</span>
                        </div>
                    </div>
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1572695157360-1153aaad020b?w=800" alt="Bruschetta">
                        <div class="menu-item-content">
                            <h3>Bruschetta</h3>
                            <p>Toasted bread with tomatoes and herbs</p>
                            <span class="price">$10</span>
                        </div>
                    </div>
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1476718406336-bb5a9690ee2a?w=800" alt="Soup">
                        <div class="menu-item-content">
                            <h3>Mushroom Soup</h3>
                            <p>Creamy wild mushroom soup</p>
                            <span class="price">$9</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 主菜 Main Courses -->
            <div class="category-section">
                <h2 class="section-title">Main Courses</h2>
                <div class="menu-grid">
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1706513043845-afb903a8c4c5?w=800" alt="Premium Steak">
                        <div class="menu-item-content">
                            <h3>Ribeye Steak</h3>
                            <p>Grilled to perfection with herb butter</p>
                            <span class="price">$45</span>
                        </div>
                    </div>
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1606850780554-b55ea4dd0b70?w=800" alt="Seafood Platter">
                        <div class="menu-item-content">
                            <h3>Seafood Platter</h3>
                            <p>Fresh selection of daily catch</p>
                            <span class="price">$65</span>
                        </div>
                    </div>
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1516100882582-96c3a05fe590?w=800" alt="Truffle Pasta">
                        <div class="menu-item-content">
                            <h3>Truffle Pasta</h3>
                            <p>Handmade pasta with black truffle</p>
                            <span class="price">$35</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 甜点 Desserts -->
            <div class="category-section">
                <h2 class="section-title">Desserts</h2>
                <div class="menu-grid">
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1712262582493-01aa9ec5c7f8?w=800" alt="Tiramisu">
                        <div class="menu-item-content">
                            <h3>Classic Tiramisu</h3>
                            <p>Italian coffee-flavored dessert</p>
                            <span class="price">$12</span>
                        </div>
                    </div>
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1582650949011-13bacf9a35fd?w=800" alt="Chocolate Cake">
                        <div class="menu-item-content">
                            <h3>Chocolate Lava Cake</h3>
                            <p>Warm chocolate cake</p>
                            <span class="price">$14</span>
                        </div>
                    </div>
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1622814651041-b9a3c54d60ab?w=800" alt="Crème Brûlée">
                        <div class="menu-item-content">
                            <h3>Crème Brûlée</h3>
                            <p>custard Crème Brûlée</p>
                            <span class="price">$10</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 酒水 Beverages -->
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
                            <h3>Signature Cocktails</h3>
                            <p>Handcrafted mixed drinks</p>
                            <span class="price">$16</span>
                        </div>
                    </div>
                    <div class="menu-item fade-in">
                        <img src="https://images.unsplash.com/photo-1497636577773-f1231844b336?w=800" alt="Coffee">
                        <div class="menu-item-content">
                            <h3>Artisan Coffee</h3>
                            <p>Freshly brewed specialty coffee</p>
                            <span class="price">$6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="reviews-section section-padding">
        <div class="container">
            <h2 class="section-title">Customer Reviews</h2>
            
            <?php if (isset($_SESSION['email'])): ?>
            <!-- 添加评价表单 -->
            <div class="review-form">
                <h3>Write a Review</h3>
                <form id="reviewForm">
                    <div class="form-group">
                        <div class="star-rating">
                            <span class="star" data-rating="5">★</span>
                            <span class="star" data-rating="4">★</span>
                            <span class="star" data-rating="3">★</span>
                            <span class="star" data-rating="2">★</span>
                            <span class="star" data-rating="1">★</span>
                            <input type="hidden" name="rating" value="5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment">Your Review</label>
                        <textarea id="comment" name="comment" rows="4" placeholder="Share your experience..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
            <?php endif; ?>

            <!-- 评价列表 -->
            <div class="reviews-container">
                <?php
                require_once 'db_connect.php';
                
                $sql = "SELECT r.*, u.email 
                        FROM reviews r 
                        JOIN users u ON r.userid = u.userid 
                        ORDER BY r.time DESC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // 从邮箱中提取用户名并去除数字
                        $emailName = strstr($row['email'], '@', true) ?: $row['email'];
                        $displayName = preg_replace('/[0-9]+/', '', $emailName); // 去除所有数字
                        $displayName = trim($displayName); // 去除可能的多余空格
                        ?>
                        <div class="review-card">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <h4><?php echo htmlspecialchars($displayName); ?></h4>
                                    <div class="stars">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo '<span class="star' . ($i <= $row['rating'] ? ' filled' : '') . '">★</span>';
                                        }
                                        ?>
                                    </div>
                                    <span class="review-date"><?php echo date('F j, Y', strtotime($row['time'])); ?></span>
                                </div>
                                <?php if (isset($_SESSION['email']) && $_SESSION['email'] === $row['email']): ?>
                                    <button class="delete-review" onclick="deleteReview(<?php echo $row['review_id']; ?>)">×</button>
                                <?php endif; ?>
                            </div>
                            <p class="review-text"><?php echo nl2br(htmlspecialchars($row['review_content'])); ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="no-reviews">No reviews yet. Be the first to write one!</p>';
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>

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
    document.addEventListener('DOMContentLoaded', function() {
        // 如果需要 toggleMenu 功能，可以保留这个函数
        window.toggleMenu = function() {
            var nav = document.getElementById('mainNav');
            if (nav) {
                nav.classList.toggle('show');
            }
        };

        // 其他导航相关的功能
        const menuButton = document.querySelector('.menu-button');
        if (menuButton) {
            menuButton.addEventListener('click', function() {
                // 菜单按钮的处理代码
            });
        }

        const navLinks = document.querySelectorAll('.nav-item');
        if (navLinks.length > 0) {
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // 导航链接的处理代码
                });
            });
        }
    });
    </script>

    <script src="logout.js"></script>
    <style>
    .reviews-section {
        background-color: #f9f9f9;
        padding: 60px 0;
    }

    .review-form {
        max-width: 600px;
        margin: 0 auto 40px;
        padding: 30px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }

    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        resize: vertical;
        font-size: 14px;
    }

    textarea:focus {
        outline: none;
        border-color: #4a90e2;
        box-shadow: 0 0 5px rgba(74,144,226,0.2);
    }

    .btn-primary {
        background-color: #4a90e2;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #357abd;
    }

    .reviews-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .review-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .reviewer-info h4 {
        margin: 0 0 8px;
        color: #333;
        font-size: 18px;
    }

    .review-date {
        font-size: 14px;
        color: #666;
    }

    .review-text {
        margin: 0;
        line-height: 1.6;
        color: #444;
    }

    .delete-review {
        background: none;
        border: none;
        color: #dc3545;
        font-size: 24px;
        cursor: pointer;
        padding: 0 5px;
        transition: color 0.2s;
    }

    .delete-review:hover {
        color: #c82333;
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .reviewer-info {
        flex-grow: 1;
    }

    .no-reviews {
        text-align: center;
        color: #666;
        font-style: italic;
        padding: 20px;
    }

    .star-rating {
        display: inline-flex;
        flex-direction: row-reverse;
        gap: 5px;
        margin-bottom: 15px;
    }

    .star-rating .star {
        cursor: pointer;
        font-size: 30px;
        color: #ddd;
        transition: color 0.2s;
        padding: 0 2px;
    }

    .star-rating .star:hover,
    .star-rating .star:hover ~ .star {
        color: #ff4444;
    }

    .star-rating .star.selected,
    .star-rating .star.selected ~ .star {
        color: #ff4444;
    }

    /* 已显示的评价星级样式 */
    .stars {
        margin: 5px 0;
        display: flex;
        gap: 2px;
    }

    .stars .star {
        font-size: 18px;
        color: #ddd;
        cursor: default;
    }

    .stars .star.filled {
        color: #ff4444;
    }
    </style>
    <script>
    document.getElementById('reviewForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const comment = this.querySelector('textarea[name="comment"]').value.trim();
        
        if (!comment) {
            alert('Please write a review');
            return;
        }
        
        const formData = new FormData(this);
        
        fetch('process_review.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Review submitted successfully!');
                location.reload();
            } else {
                alert(data.message || 'Failed to submit review');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting your review');
        });
    });

    function deleteReview(reviewId) {
        if (confirm('Are you sure you want to delete this review?')) {
            fetch('delete_review.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'review_id=' + reviewId
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // 刷新页面以显示更新
                } else {
                    alert(data.message || 'Failed to delete review');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting the review');
            });
        }
    }

    // 添加星级评分的交互效果
    document.querySelector('.star-rating')?.addEventListener('click', function(e) {
        if (e.target.classList.contains('star')) {
            const rating = e.target.dataset.rating;
            const stars = this.querySelectorAll('.star');
            const hiddenInput = this.querySelector('input[name="rating"]');
            
            // 更新隐藏的 input 值
            hiddenInput.value = rating;
            
            // 更新星星的选中状态
            stars.forEach(star => {
                star.classList.remove('selected');
                if (star.dataset.rating <= rating) {
                    star.classList.add('selected');
                }
            });
        }
    });

    // 初始化星级显示
    document.addEventListener('DOMContentLoaded', function() {
        const starRating = document.querySelector('.star-rating');
        if (starRating) {
            const stars = starRating.querySelectorAll('.star');
            const hiddenInput = starRating.querySelector('input[name="rating"]');
            const initialRating = hiddenInput.value;
            
            stars.forEach(star => {
                if (star.dataset.rating <= initialRating) {
                    star.classList.add('selected');
                }
            });
        }
    });
    </script>
</body>
</html>    