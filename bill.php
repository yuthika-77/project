
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <style>
         
        body {
            font-family: 'Libre Baskerville'; /* Set a clean font */
            background-color: #F5EBE0; /* Light background for the body */
            margin: 20px;  
            font-size: 18px;   
        }

        /* Container for bill items */
        .bill_items {
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Padding inside the item container */
            margin-bottom: 20px; /* Space between each bill item */
            background-color: rgba(255, 255, 255, 0.9); /* White background with slight transparency */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }

        /* User information styling */
        .user {
            border-bottom: 1px solid #ccc; /* Divider line between user info and items */
            padding-bottom: 10px; /* Padding below user info */
            margin-bottom: 10px; /* Space below user info */
        }

        .user li {
            list-style: none; /* Remove bullet points */
            margin: 5px 0; /* Space between list items */
            font-size: 16px; /* Slightly larger font size for better readability */
        }

        .items {
            display: flex; /* Use flexbox for item layout */
            justify-content: space-between; /* Space out items */
            flex-wrap: wrap; /* Allow items to wrap if necessary */
        }

        .item {
            background-color: white; /* Background color for each item */
            border: 1px solid #ccc; /* Border for items */
            border-radius: 5px; /* Rounded corners */
            padding: 10px; /* Padding inside each item */
            margin: 5px; /* Space around each item */
            flex: 1 1 30%; /* Allow 3 items per row */
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); /* Shadow for depth */
            min-width: 200px; /* Minimum width for items */
        }

        .items ul {
            list-style: none; /* Remove bullet points */
            padding: 0; /* Remove padding */
        }

        .items li {
            margin: 5px 0;  
            font-size: 14px;  
            color: #333;  
        }

         
        .items li.total {

            font-weight: bold;  
            font-size: 16px;  
            color: #e60000;  
        }

        #final{
            font-size: 30px;
            text-align: center;
            font-family:'Libre Baskerville' ;
            padding:30px;
        }
    </style>
</head>
<body>
<?php
require_once("conn.php");
session_start();

if (isset($_POST['buy'])) {
    $user = $_SESSION['User_ID'];
    $get = "SELECT * from cart where User_ID='$user'";
    $result = mysqli_query($con, $get);
    
    $get_user = "SELECT * from NewUser where User_ID='$user'";
    $result_user = mysqli_query($con, $get_user);
    $user_row = mysqli_fetch_assoc($result_user);
    
    echo '<div class="bill_items">
            <div class="user">
                <li>Name: ' . $user_row['User_Name'] . '</li>
                <li>Phone Number: ' . $user_row['User_Phone'] . '</li>
                <li>Email: ' . $user_row['User_Email'] . '</li>
                <li>Address: ' . $user_row['Address'] . '</li>
            </div>
          </div>';
 
    echo '<div class="items">';
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="item">
                <ul>
                    <li>Item ID: ' . $row['Item_ID'] . '</li>
                    <li>Price: RS' . number_format($row['Price'], 2) . '</li>
                    <li>Quantity: ' . $row['quantity'] . '</li>
                    <li>Total: RS' . number_format($row['quantity'] * $row['Price'], 2) . '</li>
                </ul>
              </div>';
              
    }
    echo '</div>';  
    echo '<div id="final" /">Thank You For Shopping</div>';
}
?>

</body>
</html>
