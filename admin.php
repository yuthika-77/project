<?php
require_once("conn.php");

if (isset($_POST['submit'])) {
    $UserName = $_POST['Fullname'];
    $UserPassword = $_POST['password'];

    $query = "INSERT INTO admin (name, password) VALUES ('$UserName', '$UserPassword')";
    $result = mysqli_query($con, $query);
} else {
    header("Location: adminlogin.php");
    exit();
}

$clothes = "SELECT * FROM clothes";
$res = mysqli_query($con, $clothes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Libre Baskerville', serif;
            background-color: #F5EBE0;
            padding: 20px;
            margin: 0;
        }

        .inventory {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 100%;
            margin: 20px auto;
        }

        .inventory p {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #376444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 10px;
        }

        th {
            background-color: #376444;
            color: white;
        }

        .inventory-buttons button,
        .inventory a {
            background-color: #376444;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .inventory-buttons button:hover,
        .inventory a:hover {
            background-color: #4e7a5a;
        }
    </style>
</head>
<body>

<div class="inventory">
    <p>Current Inventory</p>
    
    <table>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Delete</th>
        </tr>
        
        <?php
       
        if (mysqli_num_rows($res) > 0||($_GET['redirect'] == 1)) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo '
                <tr>
                    <td>' . htmlspecialchars($row['ProductName']) . '</td>
                    <td>' . htmlspecialchars($row['description']) . '</td>
                    <td> RS' . htmlspecialchars($row['Price']) . '</td>
                    <td><img src="' . htmlspecialchars($row['image_name']) . '" alt="Product Image" style="width:50px; height:50px;"></td>
                     
                    <td><a href="deleteitem.php?Delete=' . $row['item_ID'] . '">Delete</a></td>
                </tr>';
            }
        }
        ?>
    </table>

    <form action="additem.php" method="POST" class="inventory-buttons">
        <button type="submit" name="add">Add Item</button>
    </form>
</div>

</body>
</html>
