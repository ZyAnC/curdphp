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
    <title>Forgot Password - Delish Bistro</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .forgot-password-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .forgot-password-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-family: 'Playfair Display', serif;
        }

        .forgot-password-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
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

        .submit-btn {
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

        .submit-btn:hover {
            background-color: #7d6943;
        }

        .submit-btn:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
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

        .security-questions {
            display: none;
        }

        .security-questions.show {
            display: block;
        }

        .security-questions input[required] {
            display: none;
        }

        .security-questions.show input[required] {
            display: block;
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

    <main>
        <div class="forgot-password-container">
            <h2 class="forgot-password-title">Reset Password</h2>
            <form class="forgot-password-form" id="forgotPasswordForm">
                <div class="form-group">
                    <input type="email" id="email" name="email" required
                           placeholder="Enter your email"
                           onfocus="this.placeholder = ''" 
                           onblur="this.placeholder = 'Enter your email'">
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="security-questions" id="securityQuestions">
                    <div class="form-group">
                        <input type="text" id="securityAnswer1" name="securityAnswer1"
                               placeholder="What was your first pet's name?"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'What was your first pet\'s name?'">
                        <span class="error-message" id="securityAnswer1Error"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" id="securityAnswer2" name="securityAnswer2"
                               placeholder="In which city were you born?"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'In which city were you born?'">
                        <span class="error-message" id="securityAnswer2Error"></span>
                    </div>

                    <div class="form-group">
                        <input type="password" id="newPassword" name="newPassword"
                               placeholder="New Password"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'New Password'">
                        <span class="error-message" id="newPasswordError"></span>
                    </div>

                    <div class="form-group">
                        <input type="password" id="confirmPassword" name="confirmPassword"
                               placeholder="Confirm New Password"
                               onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'Confirm New Password'">
                        <span class="error-message" id="confirmPasswordError"></span>
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="submitButton">
                    <span class="button-text">Continue</span>
                    <span class="loading-spinner" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i>
                    </span>
                </button>
            </form>

            <div class="login-link">
                Remember your password? <a href="login.php">Login here</a>
            </div>
        </div>

        <div id="toast" class="toast">
            <span id="toastMessage"></span>
        </div>
    </main>

    <script>
    let emailCheckTimeout;
    const form = document.getElementById('forgotPasswordForm');
    const emailInput = document.getElementById('email');
    const securityQuestions = document.getElementById('securityQuestions');
    let isEmailVerified = false;

    function toggleSecurityQuestions(show) {
        const inputs = securityQuestions.querySelectorAll('input');
        inputs.forEach(input => {
            input.required = show;
        });
        if (show) {
            securityQuestions.classList.add('show');
        } else {
            securityQuestions.classList.remove('show');
        }
    }

    emailInput.addEventListener('input', function() {
        clearTimeout(emailCheckTimeout);
        const email = this.value;
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showError('email', 'Please enter a valid email address');
            return;
        }
        
        emailCheckTimeout = setTimeout(() => {
            checkEmailExists(email);
        }, 500);
    });

    function checkEmailExists(email) {
        const formData = new FormData();
        formData.append('email', email);
        
        fetch('check_email.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (!data.exists) {
                showError('email', 'No account found with this email');
                isEmailVerified = false;
            } else {
                const formGroup = document.getElementById('email').parentElement;
                const errorElement = document.getElementById('emailError');
                formGroup.classList.remove('error');
                errorElement.style.display = 'none';
                isEmailVerified = true;
            }
        })
        .catch(error => {
            console.error('Email check error:', error);
            showToast('An error occurred. Please try again.', 'error');
        });
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!securityQuestions.classList.contains('show')) {
            if (isEmailVerified) {
                toggleSecurityQuestions(true);
                document.querySelector('.button-text').textContent = 'Reset Password';
            } else {
                showError('email', 'Please enter a valid email address');
            }
            return;
        }

        if (!validateSecurityAnswers() || !validateNewPassword()) {
            return;
        }

        setLoadingState(true);
        
        const formData = new FormData(form);
        
        fetch('reset_password.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('Password reset successful. Redirecting to login...');
                setTimeout(() => {
                    window.location.href = 'login.php';
                }, 2000);
            } else {
                showToast(data.message || 'Password reset failed', 'error');
            }
        })
        .catch(error => {
            console.error('Reset password error:', error);
            showToast('An error occurred. Please try again.', 'error');
        })
        .finally(() => {
            setLoadingState(false);
        });
    });

    function validateSecurityAnswers() {
        const answer1 = document.getElementById('securityAnswer1').value;
        const answer2 = document.getElementById('securityAnswer2').value;
        
        if (answer1.length < 2) {
            showError('securityAnswer1', 'Answer must be at least 2 characters long');
            return false;
        }
        if (answer2.length < 2) {
            showError('securityAnswer2', 'Answer must be at least 2 characters long');
            return false;
        }
        return true;
    }

    function validateNewPassword() {
        const password = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (password.length < 8) {
            showError('newPassword', 'Password must be at least 8 characters long');
            return false;
        }
        
        if (!/[A-Z]/.test(password)) {
            showError('newPassword', 'Password must contain at least one uppercase letter');
            return false;
        }
        
        if (!/[a-z]/.test(password)) {
            showError('newPassword', 'Password must contain at least one lowercase letter');
            return false;
        }
        
        if (!/[0-9]/.test(password)) {
            showError('newPassword', 'Password must contain at least one number');
            return false;
        }
        
        if (!/[!@#$%^&*]/.test(password)) {
            showError('newPassword', 'Password must contain at least one special character');
            return false;
        }

        if (password !== confirmPassword) {
            showError('confirmPassword', 'Passwords do not match');
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

    function setLoadingState(isLoading) {
        const button = document.getElementById('submitButton');
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
</body>
</html> 