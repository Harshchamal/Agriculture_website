<?php
session_start();
include("connection.php");
include("adminfunctions.php");


$sql = "SELECT * FROM farmer";
$result = $con->query($sql);

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Settings</title>
    <link rel="stylesheet" href="cssstyle/Famersetting.css">
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
        <h1>Farmer Settings & Information</h1> 

        <a href="faccadmin.php">
        <button type="submit" class="logout-button">Create new farmer account</button>
        </a>
        

    </div>
    

    <div class="box" >
    
        <table border="1" >
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Province</th>
            <th>Corps</th>
            <th>Date</th>
            <th>GN</th>
            <th>Service center</th>
            <th>Actions</th>
        </tr>

        <?php
        if ($result !== null) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['farmer_name']}</td>
                    <td>{$row['farmer_phone']}</td>
                    <td>{$row['farmer_province']}</td>
                    <td>{$row['farmer_corps']}</td>
                    <td>{$row['starting_date']}</td>
                    <td>{$row['gn']}</td>
                    <td>{$row['service_center']}</td>
                    <td>
                        <a href='FarmerEdit.php?id=$row[id]'>
                            <button type='button' class='logout-button'>Edit</button>
                        </a>
                        <a href='FarrmerDelete.php?id=$row[id]'>
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




<script src="JavaScript/searchjava.js"></script>


</body>
</html>
