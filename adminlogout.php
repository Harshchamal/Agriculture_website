<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    echo '<script>
        if (confirm("Do you really want to log out?")) {
            window.location.href = "AdminLogin.php";
        } else {
            window.location.href = "AdminInterface.php";
        }
    </script>';
} else {
    // If the session variable is not set, redirect to the login page
    header("Location: AdminLogin.php");
    die;
}
?>
