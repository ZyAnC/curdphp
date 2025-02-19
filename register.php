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
    <title>Register - Delish Bistro</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .register-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .register-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-family: 'Playfair Display', serif;
        }

        .register-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 20px;
            }
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group input {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group.error input {
            border-color: #dc3545;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 4px;
            display: none;
        }

        .register-btn {
            background-color: #9c8354;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .register-btn:hover {
            background-color: #7d6943;
        }

        .register-btn:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        .password-requirements {
            font-size: 0.85rem;
            color: #666;
            margin-top: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 4px;
        }

        .password-requirements ul {
            margin: 5px 0 0 20px;
            padding: 0;
        }

        .password-requirements li {
            margin: 3px 0;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #9c8354;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
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
            display: none;
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
    </style>
</head>
<body>
    <header class="home-header">
        <?php include 'header.php'; ?>
    </header>

    <main style="margin-top: 30px;">
        <div class="register-container">
            <h2 class="register-title">Create Account</h2>
            <form class="register-form" id="registerForm" action="register.php" method="POST" onsubmit="return handleRegister(event)">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="firstName" required
                               placeholder="First Name"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'First Name'">
                        <span class="error-message" id="firstNameError"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" id="lastName" required
                               placeholder="Last Name"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'Last Name'">
                        <span class="error-message" id="lastNameError"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" required
                           placeholder="Email Address"
                           onfocus="this.placeholder = ''" 
                           onblur="this.placeholder = 'Email Address'">
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="password" id="password" required
                               placeholder="Password"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'Password'">
                        <span class="error-message" id="passwordError"></span>
                        <div class="password-requirements">
                            Password must contain:
                            <ul>
                                <li>At least 8 characters</li>
                                <li>At least one uppercase letter</li>
                                <li>At least one lowercase letter</li>
                                <li>At least one number</li>
                                <li>At least one special character</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" id="confirmPassword" required
                               placeholder="Confirm Password"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'Confirm Password'">
                        <span class="error-message" id="confirmPasswordError"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="securityQuestion1" required
                               placeholder="What was your first pet's name?"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'What was your first pet\'s name?'">
                        <span class="error-message" id="securityQuestion1Error"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" id="securityQuestion2" required
                               placeholder="In which city were you born?"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'In which city were you born?'">
                        <span class="error-message" id="securityQuestion2Error"></span>
                    </div>
                </div>

                <button type="submit" class="register-btn" id="registerButton">
                    <span class="button-text">Create Account</span>
                    <span class="loading-spinner" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i>
                    </span>
                </button>
            </form>

            <div class="login-link">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </div>

        <div id="toast" class="toast">
            <span id="toastMessage"></span>
        </div>
    </main>

    <script>
        function handleRegister(event) {
            event.preventDefault();
            resetErrors();
            
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const securityQuestion1 = document.getElementById('securityQuestion1').value;
            const securityQuestion2 = document.getElementById('securityQuestion2').value;
            
            // 验证所有字段
            if (!validateName(firstName, 'firstName') || 
                !validateName(lastName, 'lastName') ||
                !validateEmail(email) ||
                !validatePassword(password) ||
                !validateSecurityAnswers(securityQuestion1, securityQuestion2)) {
                return false;
            }
            
            // 验证密码匹配
            if (password !== confirmPassword) {
                showError('confirmPassword', 'Passwords do not match');
                return false;
            }
            
            setLoadingState(true);
            
            // 创建 FormData 对象
            const formData = new FormData();
            formData.append('firstName', firstName);
            formData.append('lastName', lastName);
            formData.append('email', email);
            formData.append('password', password);
            formData.append('securityQuestion1', securityQuestion1);
            formData.append('securityQuestion2', securityQuestion2);
            
            // 发送 AJAX 请求
            fetch('register_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log('Response status:', response.status); // 添加调试信息
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data); // 添加调试信息
                if (data.success) {
                    showToast(data.message);
                    setTimeout(() => {
                        window.location.href = 'login.php';
                    }, 2000);
                } else {
                    showToast(data.message || 'Registration failed', 'error');
                }
            })
            .catch(error => {
                console.error('Fetch error:', error); // 添加详细的错误信息
                showToast('An error occurred. Please try again.', 'error');
            })
            .finally(() => {
                setLoadingState(false);
            });
            
            return false;
        }
        
        function validateName(name, field) {
            if (name.length < 2) {
                showError(field, 'Name must be at least 2 characters long');
                return false;
            }
            if (!/^[a-zA-Z\s]*$/.test(name)) {
                showError(field, 'Name can only contain letters and spaces');
                return false;
            }
            return true;
        }
        
        function validateEmail(email) {
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
        
        function validatePassword(password) {
            if (password.length < 8) {
                showError('password', 'Password must be at least 8 characters long');
                return false;
            }
            
            if (!/[A-Z]/.test(password)) {
                showError('password', 'Password must contain at least one uppercase letter');
                return false;
            }
            
            if (!/[a-z]/.test(password)) {
                showError('password', 'Password must contain at least one lowercase letter');
                return false;
            }
            
            if (!/[0-9]/.test(password)) {
                showError('password', 'Password must contain at least one number');
                return false;
            }
            
            if (!/[!@#$%^&*]/.test(password)) {
                showError('password', 'Password must contain at least one special character');
                return false;
            }
            
            return true;
        }
        
        function validateSecurityAnswers(answer1, answer2) {
            if (answer1.length < 2) {
                showError('securityQuestion1', 'Security answer must be at least 2 characters long');
                return false;
            }
            if (answer2.length < 2) {
                showError('securityQuestion2', 'Security answer must be at least 2 characters long');
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
            const button = document.getElementById('registerButton');
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
    </script>

    <script src="logout.js"></script>
</body>
</html> 