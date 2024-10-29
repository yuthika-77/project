<?php
require_once("conn.php");
session_start();

if (isset($_POST['submit']) && isset($_SESSION['User_ID'])) {
    $user_id = $_SESSION['User_ID'];
    
    $id = $_POST['submit']; 
    $max = 6;

     
    $get_items = "SELECT Price FROM clothes WHERE item_ID = '$id'";
    $res = mysqli_query($con, $get_items);

    if ($row = mysqli_fetch_assoc($res)) {
        $price = $row['Price'];

        
        $checkQuery = "SELECT * FROM cart WHERE Item_ID = '$id' AND User_ID = '$user_id'";
        $result = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            $existingItem = mysqli_fetch_assoc($result);
            $currentQuantity = $existingItem['quantity'];
            $newQuantity = $currentQuantity + $quantity;

             
            if ($newQuantity <= $max) {
                $updateQuery = "UPDATE cart SET quantity = '$newQuantity' WHERE Item_ID = '$id' AND User_ID = '$user_id'";
                mysqli_query($con, $updateQuery);
            } else {
                echo "Maximum quantity of $max reached for item ID $id.";
            }
        } else {
             
            $add_query = "INSERT INTO cart (Item_ID, Price, quantity, User_ID) VALUES ('$id', '$price', '$quantity', '$user_id')";
            $result_add = mysqli_query($con, $add_query);

            if (!$result_add) {
                echo "Error adding item ID $id to cart: " . mysqli_error($con);
            }
        }

         
        header("Location: cart.php");
        exit();
    } else {
        echo "Error retrieving price for item ID $id: " . mysqli_error($con);
    }
} else {
    echo "Please log in to add items to your cart.";
}
?>
