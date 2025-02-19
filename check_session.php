<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['user_id']);
$displayName = $isLoggedIn ? $_SESSION['display_name'] : '';

// 返回 HTML 代码
if ($isLoggedIn) {
    echo '<div class="auth-buttons">
        <a href="#" class="nav-item">
            <i class="fas fa-user"></i>
            <span>' . htmlspecialchars($displayName) . '</span>
        </a>
        <a href="#" onclick="handleLogout(event)" class="nav-item">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </div>';
} else {
    echo '<div class="auth-buttons">
        <a href="login.php" class="nav-item">
            <i class="fas fa-user"></i>
            <span>Login</span>
        </a>
    </div>';
}
?> 