<?php
require_once("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
    $UserName = $_POST['Fullname'];
    $UserPassword = $_POST['password'];
     
    $UserName = mysqli_real_escape_string($con, $UserName);
    $UserPassword = mysqli_real_escape_string($con, $UserPassword);
	
    $query = "SELECT User_Name, User_Password FROM NewUser WHERE User_Name='$UserName'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "Error in executing queries: " . mysqli_error($con);
        exit();
    }

     
    if (mysqli_num_rows($result) > 0) {
          
        $row = mysqli_fetch_assoc($result);
        $fetchedPassword = $row['User_Password'];
 	$fetchedName=$row['User_Name'];
        if ($UserPassword === $fetchedPassword) {
             
		  $loginQuery = "SELECT User_ID FROM newuser WHERE User_Name='$UserName' AND User_Password='$UserPassword'";
    $current_user = mysqli_query($con, $loginQuery);
	
 	$row = mysqli_fetch_assoc($current_user);
    	$_SESSION['User_ID'] = $row['User_ID'];
            header("Location: index.html");
            exit();  
        } else {
             
            header("Location: SignUp1.html");
            exit();
        }
    } else { 
        header("Location: SignUp1.html");
        exit();
    }
}
?>
