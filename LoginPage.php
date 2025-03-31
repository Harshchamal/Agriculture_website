<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Agriculture</title>
    <link rel="stylesheet" href="cssstyle/Loginpage.css">
 
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

        <h2>Ecological Farming and Services</h2>
    </header>

    <div class="container1">
        <a href="Login.php"><button class="stylish-button">Log in as an Admin</button></a>
        <a href="OfficerLogin.php"><button class="stylish-button">Log in as a Field Officer</button></a>
        <a href="FarmerLogin.php"><button class="stylish-button">Log in as a Farmer</button></a>
    </div>

    <footer>
        <p>&copy; 2023 Department of Agriculture</p>
        <p>All rights reserved</p>
    </footer>

</body>
</html>

