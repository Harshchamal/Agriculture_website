<?php
session_start();
include("connection.php");
include("adminfunctions.php");


$sql = "SELECT * FROM officer";
$result = $con->query($sql);

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Settings</title>
    <link rel="stylesheet" href="cssstyle/offset.css">
</head>
<body>

    <header>
        <img src="picture/Department-LOGO.png" alt="Department of Agriculture Logo" onclick="showConfirmation()" style="cursor: pointer;" title="Click to return home page">
        
        <script>
            function showConfirmation() {
                var confirmation = confirm("Do you want to return to the home page?");
                if (confirmation) {
                    window.location.href = "Home.html";
                } 
                else{}
            }
        </script>

        <h2>Ecological Farming and Services </h2>
        
    </header>

    <div class="topic">      
        <a href="AdminInterface.php">
        <button type="submit" class="logout-button">Back to Admin Interface</button>
        </a> 
        <h1>Officer Settings & Information</h1> 

        <a href="officersignup.php">
        <button type="submit" class="logout-button">Create new officer account</button>
        </a>
        

    </div>
    

    <div class="box" >
    
        <table border="1" >
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Province</th>
            <th>Contact</th>
            <th>Service center</th>
            <th>Username</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>

        <?php
        if ($result !== null) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['officer_name']}</td>
                    <td>{$row['officer_province']}</td>
                    <td>{$row['officer_contact']}</td>
                    <td>{$row['service_center']}</td>
                    <td>{$row['officer_username']}</td>
                    <td>{$row['officer_password']}</td>
                    <td>
                        <a href='OfficerEdit.php?id=$row[id]'>
                            <button type='button' class='logout-button'>Edit</button>
                        </a>
                        <a href='OfficerDelete.php?id=$row[id]'>
                            <button type='button' class='logout-button'>Delete</button>
                        </a>
                    </td>
                </tr>
                ";
            }
        }
        ?>
        </table>

    </div>   




<script src="JavaScript/script.js"></script>


</body>
</html>
