<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="home-nav-container">
    <div class="nav-wrapper">
        <div class="home-logo">
            <span class="logo-text">D</span>
            <span class="logo-dot">•</span>
            <span class="logo-text">ELISH</span>
        </div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="auth-buttons">
                <div class="user-menu">
                    <a href="#" class="nav-item user-menu-trigger">
                        <i class="fas fa-user"></i>
                        <span><?php echo htmlspecialchars($_SESSION['display_name']); ?></span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="user-dropdown">
                        <a href="my_reservations.php" class="dropdown-item">
                            <i class="fas fa-calendar-check"></i>
                            My Reservations
                        </a>
                        <a href="#" onclick="handleLogout(event)" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="auth-buttons">
                <a href="login.php" class="nav-item">
                    <i class="fas fa-user"></i>
                    <span>Login</span>
                </a>
            </div>
        <?php endif; ?>
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