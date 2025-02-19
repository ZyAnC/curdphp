function handleLogout(event) {
    event.preventDefault();
    fetch('logout.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'login.php';
        }
    })
    .catch(error => {
        console.error('Logout error:', error);
    });
} 