<?php
session_start();

if (isset($_SESSION['f_id'])) {
    echo '<script>
        if (confirm("Do you really want to log out?")) {
            window.location.href = "FarmerLogin.php";
        } else {
            window.location.href = "UserInterface.php";
        }
    </script>';
} else {
    // If the session variable is not set, redirect to the login page
    header("Location: FarmerLogin.php");
    die;
}
?>
