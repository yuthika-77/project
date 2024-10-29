<?php
session_start();
    require_once("conn.php");  

    if (isset($_POST['SignUpSubmit'])) {
       
        $UserName = $_POST['Fullname'];
        $UserPhone = $_POST['Phone'];
        $UserEmail = $_POST['email'];
        $UserPassword = $_POST['Password'];
        $Address=$_POST['address'];
         
       
        
        $query = "INSERT INTO NewUser (User_Name, User_Phone, User_Email, User_Password, Address) 
          VALUES ('$UserName', '$UserPhone', '$UserEmail', '$UserPassword', '$Address')";

        if (mysqli_query($con, $query)) {

            $loginQuery = "SELECT User_ID FROM NewUser WHERE User_Name='$UserName' AND User_Password='$UserPassword'";
            $current_user = mysqli_query($con, $loginQuery);
        
            // Check if any row was returned
            if ($row = mysqli_fetch_assoc($current_user)) {
                $_SESSION['User_ID'] = $row['User_ID'];
                echo "User logged in successfully, User ID: " . $_SESSION['User_ID'];
            } else {
                echo "Login failed: User not found.";
            }
             
            header("Location: index.html");
        } else {
             
            echo 'Error: Please Check Your Query';
        }
    } else {
         
        header("Location: SignUp1.html");
    }
?>
