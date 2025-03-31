<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$farmer_email = $_POST['farmeremail'];
		$farmer_password = $_POST['farmerpw'];

			$query = "select * from farmer where farmer_email = '$farmer_email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$farmer_data = mysqli_fetch_assoc($result);
					
					if($farmer_data['farmer_password'] === $farmer_password)
					{

						$_SESSION['f_id'] = $farmer_data['f_id'];
						header("Location: UserInterface.php");
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
    <title>Department of Agriculture</title>
    <link rel="stylesheet" href="cssstyle/flogin.css">
    
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
            <h2>Farmer Login</h2>
            <form action="#" method="post">

                <div class="input-container">
                    <label for="username">Email</label>
                    <input type="email" id="username" name="farmeremail" placeholder="Enter your email" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="farmerpw" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
              
            </form>
        
    </div>

   

</body>
</html>
