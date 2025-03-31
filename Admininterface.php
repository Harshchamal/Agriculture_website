<?php
session_start();
include("connection.php");
include("adminfunctions.php");
$admin_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssstyle/admin.css">

</head>
<body>
    <header>
        <img src="picture/Department-LOGO.png" alt="Department of Agriculture Logo" >
        
    </header>

    <div class="button-box" onclick="location.href='adminsetting.php'">
        <h2>Admin Settings</h2>
    </div>

    <div class="button-box" onclick="location.href='FarmerSettings.php'">
        <h2>User Settings</h2>
    </div>

    <div class="button-box" onclick="location.href='officersetting.php'">
        <h2>Field Officer Settings</h2>

        
</div>
</body>
</html>
