

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Playfair+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="CartStyle.css">

</head>
<body>
    <script>
        function Thank() {
            alert("Thank you for Shopping with us");
        }
    </script>
    
    <header>
        <div class="header">
            <div id="pagetop">
                <a href="LoginForm.html">Login</a>
            </div>
            <div class="navbar">

                <a href="index.html">Home</a>
                <a href="#">Cart</a>
                <div class="dropdown">
                    <button class="dropbtn">Shop</button>
                    <div class="dropdown-content">
                        <a href="apparel.php">Apparel</a>
                        <a href="accessories.php">Accessories</a>

                    </div>
                </div>
            </div>

        </div>
    </header>

    <div id="Purchase">
        <?php
        require_once("conn.php");
        session_start();
  $max=6;
       
        $total = 0;
        $res_ids = [];
        $res_prices = [];
        $subtotal=[];
         
        if(isset($_SESSION['User_ID']))
            {   
                $user= $_SESSION['User_ID'];
                $countQuery = "SELECT COUNT(*) AS total FROM cart where User_ID='$user'";
                $res_count = mysqli_query($con, $countQuery);
                $row = mysqli_fetch_assoc($res_count);
                $total_count = $row['total'];
                
                if ($total_count > 0) {
            
                    $user_id=$_SESSION['User_ID'];
                    $itemQuery = "SELECT Item_ID, price ,quantity FROM cart where User_ID='$user_id'";
                    $result = mysqli_query($con, $itemQuery);
                     
                
                    while ($item = mysqli_fetch_assoc($result)) {
                        $res_ids[] = $item['Item_ID'];
                        $res_prices[] = $item['price'];
                    $res_quantity[] = $item['quantity'];
                        
                
                    }
                    for($i = 0;$i < $total_count ; $i++)
                         { $subtotal[$i]=$res_prices[$i] * $res_quantity[$i];
                             $total+=$subtotal[$i];
                         }
        
        
                         foreach($res_ids as $index => $x) {
                     
        
                    
        
                            $img_query = "SELECT image_name FROM clothes WHERE item_ID = '$x'";
                            $res = mysqli_query($con, $img_query);
                            $fetch = mysqli_fetch_assoc($res);
                            $img = $fetch['image_name'];  
                            
                             
                            echo '<div class="item">
             
             <div class="img-container">
                <img src="' . $img . '" alt="Item Image">
             </div>
             
              
             <div class="item-details">
                    <ul>
                        <li>Item ID: ' . $x . '</li>
                        <li>Price: RS' . $res_prices[$index] . '</li>
                        <li>quantity: <form action="update.php" method="POST" style="display:inline;">
                        <input type="number" name="quantity" id="quantity" value="' . $res_quantity[$index] . '" min="0" max="' . $max . '">
                        <input type="hidden" name="item_id" value="' . $x . '">
                        <button type="submit" class="update">Update</button>
                    </form></li>
                        <li>subtotal: '.$subtotal[$index].'</li>
                    </ul>
              
            </div>       
            <div class="change">
                        <a href = "delete.php?item_id='.$x.'" >Remove </a>
            </div>
        </div>';
                
                                  
            
                         }
                       
                    
                    
                    echo '
                    <div class="total"> Total : RS'.$total.'</div>
                    <div class="Buy">
                    <form action="bill.php" method="POST">
                    <button type="submit" name="buy">Buy items</button>
                    </form
               </div>';
                  }
        
                  else
                  {
                    echo '<div id ="empty"style=" height:50px; padding:45px; font-size:30px; text-align:center;">Cart is empty </div>';
                  }
            }
            else
            {
                header("Location:LoginForm.html");
            }
        
          
        
        ?>
    </div>
   
    <div class="footers">
        <div class="footer-data">
            <h3>Contact</h3>
            <p><strong>Address:</strong> Wildflower Grove Apparel,<br> 4567 Garden Path, Suite 89, Blossom Heights, OR 97405</p>
            <p><strong>Email:</strong> info@wildflowergrove.com</p>
            <p><strong>Phone:</strong> (555) 123-4567</p>
        </div>
        <div class="footer-data">
            <h3>Policy</h3>
            <p>Privacy</p>
            <p>Refund</p>
            <p>Terms and Conditions</p>
        </div>
        <div class="footer-data">
            <h3>Main Menu</h3>
            <p>Shop</p>
            <p>Accessories</p>
        </div>
    </div>

</body>
</html> 