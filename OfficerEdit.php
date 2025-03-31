 <?php
session_start();
include("connection.php");
include("adminfunctions.php");

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    $officer_id = $_GET['id'];

    // Retrieve the officer's data based on the ID
    $sql = "SELECT * FROM officer WHERE id = '$officer_id'";
    $result = $con->query($sql);

    if ($result !== null) {
        $officer_data = $result->fetch_assoc();
    } else {
        // Handle the case where the officer ID is not found
        echo "officer not found.";
        die();
    }
} else {
    // Handle the case where 'id' parameter is missing
    echo "officer ID is missing.";
    die();
}

// Handle form submission for updating officer data
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve and validate updated data from the form
    $officer_username = $_POST['officer_username'];
    $officer_password = $_POST['officer_password'];
    $officer_name = $_POST['officer_name'];


    // Update the officer's data in the database
    $update_sql = "UPDATE officer SET
        officer_name = '$officer_name',
        officer_password = '$officer_password',
        officer_username= '$officer_username'
        WHERE id = '$officer_id'";

    if ($con->query($update_sql)) {
        // Data updated successfully, you can redirect to officerSettings.php or another page
        header("Location: OfficerSettings.php");
        die();
    } else {
        echo "Error updating data: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>officer edit Interface</title>
    <link rel="stylesheet" href="cssstyle/officer.css">
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

    <div class="topic">       
        <h1>Officer edit interface</h1> 
        
    </div>

    <div class="container">
        <div class="box">
            
            <h3>Edit Officer Details</h3>
            <form method="post">
        <div class="form-group">
                <label for="officername">Edit officer name</label>
                <input type="text" id="officername" value="<?php echo $officer_data['officer_name']; ?>" name="officer_name" required>
            </div>
            <div class="form-group">
                <label for="phone">Edit Phone Number</label>
                <input type="tel" id="phone" value="<?php echo $officer_data['officer_contact']; ?>" name="officerphone" required>
            </div>
            <div class="form-group">
                <label for="Province">Edit Officer Province</label>
                <select id="Province" required name="officerprovince" value="<?php echo $officer_data['officer_province']; ?>">
                    <option value="Central">Central Province</option>
                    <option value="North Central">North Central Province</option>
                    <option value="Sabaragamuwa">Sabaragamuwa Province</option>
                    <option value="Uva Province">Uva Province</option>
                    <option value="North Western">North Western Province</option>
                    <option value="Eastern">Eastern Province</option>
                    <option value="Western">Western Province</option>
                    <option value="Southern">Southern Province</option>
                    <option value="Northern">Northern Province</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Agrarian Service Center">Edit Agrarian Service Center: </label>
                <input type="text" id="asc" required value="<?php echo $officer_data['service_center']; ?>" name="oasc">
            </div>
            <div class="form-group">
                <label for="officerusername">Edit Username</label>
                <input type="text" id="officerusername" value="<?php echo $officer_data['officer_username']; ?>" name="officer_username" required>
            </div>
            <div class="form-group">
                <label for="officerpassword">Edit password: </label>
                <input type="text" id="officerpassword" name="officer_password" value="<?php echo $officer_data['officer_password']; ?>" required>
            </div>
            <button type="submit" class="submit-button">Update officer details</button>
        </form>
        </div>
    </div>

<footer>
        <p>&copy; 2023 Department of Agriculture</p>
        <p>All rights resvered</p>  
</footer>

<script src="JavaScript/script.js"></script>
</body>
</html>
make it beautiful with css