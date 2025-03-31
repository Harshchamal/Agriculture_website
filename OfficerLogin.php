<?php 

session_start();

	include("connection.php");
	include("officerfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$officer_username = $_POST['officer_username'];
		$officer_password = $_POST['officer_password'];

			$query = "select * from officer where officer_username = '$officer_username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$officer_data = mysqli_fetch_assoc($result);
					
					if($officer_data['officer_password'] === $officer_password)
					{

						$_SESSION['officer_id'] = $officer_data['officer_id'];
						header("Location: OfficerInterface.php");
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
    <link rel="stylesheet" href="cssstyle/offlogin.css">
    <title>Admin Login</title>
</head>
<body>

    <header>
        
        <img src="picture/Department-LOGO.png" alt="Department of Agriculture Logo" onclick="showConfirmation()" style="cursor: pointer;" title="Click to return home page">
        
        <script>
            function showConfirmation() {
                var confirmation = confirm("Do you want to return to the home page?");
                if (confirmation) {
                    window.location.href = "index.html";
                } 
                else{}
            }
        </script>

        <h2>Ecological Farming and Services </h2>
    </header>
    
    <div class="login-container">
            <h2>Officer login</h2>
            <form action="#" method="post">

                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="officer_username" placeholder="Enter your Username" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="officer_password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
              
            </form>
        
    </div>

   

</body>
</html>

















