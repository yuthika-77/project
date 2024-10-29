<?php
require_once("conn.php"); 

if (isset($_POST['add'])) {
    
    $Name = $_POST['item_name'];
    $desc = $_POST['description'];
    $type = $_POST['category'];
    $price = $_POST['price'];
    $img = $_POST['image']; 

     
    $insert = "INSERT INTO clothes (ProductName, Price, description, image_name, type) VALUES ('$Name', '$price', '$desc', '$img', '$type')";

   
    if (mysqli_query($con, $insert)) {
        echo "Insert successfull";
         exit();
    } else {
        echo "Error: " . mysqli_error($con); 
    }
} else {
    header("Location: additem.php");  
}
?>
