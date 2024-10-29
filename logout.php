<?php
// Start the session to access session variables
session_start();

// Remove all session variables
session_unset();

// Destroy the session
session_destroy();

// Optionally, unset the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect to login page (or home page) after logging out
header("Location: LoginForm.html");
exit;
?>
