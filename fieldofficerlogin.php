<?php 

session_start();

	include("connection.php");
	include("adminfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        
		$officer_username = $_POST['officer_username'];
		$officer_password = $_POST['officer_password'];

			$query = "select * from admin where officer_username= '$officer_username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_data = mysqli_fetch_assoc($result);
					
					if($admin_data['officer_password'] === $officer_password)
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
    <link rel="stylesheet" href="cssstyle/Login.css">
    <title>Admin Login</title>
</head>
<body>
    <header>
        <img src="picture/Department-LOGO.png" alt="Department of Agriculture Logo" >
        
    </header>
    <div class="login-container">
        <h2>Field officer login</h2>
        <form action="#" method="post">
            
            <div class="form-group">
                <label for="Field Officer-username">Field Officer-username</label>
                <input type="text" id="Field Officer-username" placeholder="Field Officer Username" name="officer_username" required>
            </div>
            <div class="form-group">
                <label for="Field Officer-password">Field Officer-password</label>
                <input type="password" id="Field Officer-password" placeholder="Field Officer Password" name="officer_password" required>
            </div>

            <button type="submit">Login</button>
        </form>
        
    </div>
</body>
</html>


