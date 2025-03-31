<?php 
session_start();

	include("connection.php");
	include("adminfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$admin_username = $_POST['admin_username'];
		$admin_password = $_POST['admin_password'];
        $admin_id = random_num(20);
        $admin_name = $_POST['admin_name'];
        
        $query = "insert into admin (admin_id,admin_username,admin_password,admin_name) values ('$admin_id','$admin_username','$admin_password','$admin_name')";

			mysqli_query($con, $query);

			header("Location: adminsetting.php");
			die;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssstyle/adminsignup.css">
    <title>Admin Login</title>
</head>
<body>
    <header>
        <img src="picture/Department-LOGO.png" alt="Department of Agriculture Logo" >
        
    </header>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="#" method="post">

            <div class="form-group">
                <label for="admin-username">Admin name</label>
                <input type="text" id="admin-username" placeholder="Admin Username" name="admin_Name" required>
            </div>
            
            <div class="form-group">
                <label for="admin-username">Admin Username</label>
                <input type="text" id="admin-username" placeholder="Admin Username" name="admin_username" required>
            </div>
            <div class="form-group">
                <label for="admin-password">Admin Password</label>
                <input type="password" id="admin-password" placeholder="Admin Password" name="admin_password" required>
            </div>

            <button type="submit">Login</button>
        </form>
        
    </div>
</body>
</html>