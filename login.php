<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Delish Bistro</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .home-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
        }

        .home-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .nav-left, .nav-right {
            display: flex;
            align-items: center;
        }

        main {
            flex: 1;
            padding-top: 80px; /* 为固定的header留出空间 */
            min-height: calc(100vh - 80px);
            width: 100vw;
            overflow-x: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.4)), 
                        url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1600') center/cover fixed;
        }

        .footer {
            position: relative;
            width: 100%;
            background: #1a1a1a;
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-family: 'Playfair Display', serif;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
        }

        .form-group input {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-btn {
            background-color: #9c8354;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #7d6943;
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            color: #9c8354;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 4px;
            display: none;
        }

        .loading-spinner {
            margin-left: 8px;
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 12px 24px;
            background-color: #333;
            color: white;
            border-radius: 4px;
            z-index: 1000;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .form-group.error input {
            border-color: #dc3545;
        }

        .form-group.error .error-message {
            display: block;
        }
    </style>
</head>
<body>
    <!-- 更新页眉结构以匹配index.php -->
    <header class="home-header">
        <div class="home-nav-container">
            <div class="nav-wrapper">
                <div class="home-logo">
                    <span class="logo-text">D</span>
                    <span class="logo-dot">•</span>
                    <span class="logo-text">ELISH</span>
                </div>
                <div class="auth-buttons">
                    <a href="login.php" class="nav-item active">
                        <i class="fas fa-user"></i>
                        <span>Login</span>
                    </a>
                </div>
            </div>
            <nav class="home-nav">
                <a href="index.php" class="nav-item">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="menu.php" class="nav-item">
                    <i class="fas fa-utensils"></i>
                    <span>Menu</span>
                </a>
                <a href="about.php" class="nav-item">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
                <a href="contact.php" class="nav-item">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                </a>
                <a href="reservation.php" class="nav-item nav-cta">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Book</span>
                </a>
            </nav>
        </div>
    </header>

    <main style="margin-top: 30px;">
        <div class="login-container">
            <h2 class="login-title">Welcome Back</h2>
            <form class="login-form" id="loginForm" onsubmit="return handleLogin(event)">
                <div class="form-group">
                    <input type="email" id="email" name="email" required 
                           placeholder="Email"
                           onfocus="this.placeholder = ''" 
                           onblur="this.placeholder = 'Email'">
                    <span class="error-message" id="emailError"></span>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" required
                           placeholder="Password"
                           onfocus="this.placeholder = ''" 
                           onblur="this.placeholder = 'Password'">
                    <span class="error-message" id="passwordError"></span>
                </div>
                <button type="submit" class="login-btn" id="loginButton">
                    <span class="button-text">Login</span>
                    <span class="loading-spinner" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i>
                    </span>
                </button>
            </form>
            <div class="forgot-password">
                <a href="forgot-password.php">Forgot Password?</a>
            </div>
            <div class="register-link" style="text-align: center; margin-top: 15px;">
                Don't have an account? <a href="register.php" style="color: #9c8354; text-decoration: none;">Register here</a>
            </div>
        </div>

        <!-- 添加提示消息容器 -->
        <div id="toast" class="toast" style="display: none;">
            <span id="toastMessage"></span>
        </div>
    </main>

    <!-- 复用相同的页脚 -->
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
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Delish Bistro Restaurant. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function handleLogin(event) {
            event.preventDefault();
            resetErrors();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Validate email
            if (!validateEmail(email)) {
                return false;
            }
            
            // Validate password
            if (password.length < 6) {
                showError('password', 'Password must be at least 6 characters');
                return false;
            }
            
            setLoadingState(true);
            
            // 创建 FormData 对象
            const formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);
            
            // 发送 AJAX 请求
            fetch('login_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message);
                    // 更新右上角的用户名显示
                    updateUserDisplay(data.username);
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 1500);
                } else {
                    showToast(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Login error:', error);
                showToast('An error occurred. Please try again.', 'error');
            })
            .finally(() => {
                setLoadingState(false);
            });
            
            return false;
        }
        
        function validateEmail(email) {
            // 更新邮箱验证规则，确保包含 "@" 符号
            if (!email.includes('@')) {
                showError('email', 'Email must include "@" symbol');
                return false;
            }
            
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!re.test(email)) {
                showError('email', 'Please enter a valid email address');
                return false;
            }
            
            return true;
        }
        
        function showError(field, message) {
            const formGroup = document.getElementById(field).parentElement;
            const errorElement = document.getElementById(`${field}Error`);
            formGroup.classList.add('error');
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }
        
        function resetErrors() {
            const errorMessages = document.querySelectorAll('.error-message');
            const formGroups = document.querySelectorAll('.form-group');
            errorMessages.forEach(msg => msg.style.display = 'none');
            formGroups.forEach(group => group.classList.remove('error'));
        }
        
        function setLoadingState(isLoading) {
            const button = document.getElementById('loginButton');
            const buttonText = button.querySelector('.button-text');
            const loadingSpinner = button.querySelector('.loading-spinner');
            
            button.disabled = isLoading;
            buttonText.style.display = isLoading ? 'none' : 'inline';
            loadingSpinner.style.display = isLoading ? 'inline' : 'none';
        }
        
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            toast.style.backgroundColor = type === 'success' ? '#28a745' : '#dc3545';
            toastMessage.textContent = message;
            toast.style.display = 'block';
            
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }
        
        function showForgotPassword() {
            showToast('Password reset feature coming soon');
        }

        function updateUserDisplay(username) {
            const authButtons = document.querySelector('.auth-buttons');
            if (authButtons) {
                authButtons.innerHTML = `
                    <a href="#" class="nav-item">
                        <i class="fas fa-user"></i>
                        <span>${username}</span>
                    </a>
                    <a href="#" onclick="handleLogout(event)" class="nav-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                `;
            }
        }

        function handleLogout(event) {
            event.preventDefault();
            // 清除会话
            fetch('logout.php')
            .then(() => {
                window.location.href = 'login.php';
            });
        }
    </script>
</body>
</html> 