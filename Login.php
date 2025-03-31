<?php 

session_start();

	include("connection.php");
	include("adminfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        
		$admin_username = $_POST['admin_username'];
		$admin_password = $_POST['admin_password'];

			$query = "select * from admin where admin_username = '$admin_username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_data = mysqli_fetch_assoc($result);
					
					if($admin_data['admin_password'] === $admin_password)
					{

						$_SESSION['admin_id'] = $admin_data['admin_id'];
						header("Location: AdminInterface.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssstyle/adminlogin.css">
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


