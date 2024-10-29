
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Details.css">
    <script>
        function validate()
        {
           var quantity=document.getElementById("quantity");
           if(quantity==0)
           {
            alert("please enter a quantity");
           }
        }
    </script>
</head>
<body>

    <header>
        <div class="header">
            <div id="pagetop">
                <a href="LoginForm.html">Login</a>
            </div>
            <div class="navbar">

                <a href="index.html">Home</a>
                <a href="cart.php">Cart</a>
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
    <?php

require_once("conn.php");

 
if (isset($_GET['item_id'])) {
    $item_id = (int)$_GET['item_id'];  
    
    $query = "SELECT * FROM clothes WHERE item_ID = '$item_id'";
    $execute = mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($execute);
     $name=$fetch['ProductName'];
     $description=$fetch['description'];
     $price=$fetch['Price'];
     
    $image=$fetch['image_name'];
    echo '
                <div class="items">
                    <div class="img-container">
                        <img src="'.$image .'" alt="Hope You Enjoy Today Tee">
                    </div>
                    <div class="detail">
                        <p id ="imgname">'. $name .'</strong></p>
                         <p>Description :<br>'. $description .'</p>
                        <p>Price: Rs '. $price . '</p>
                         
                       <form method="POST" action="clothes.php" ">
                             
                         <button type="submit" value="'.$item_id.'" name="submit"  >Add to Cart</button>
                          </form>
                    </div>
                </div>
            ';
       
} else {
    echo "No item selected.";
}

 

?>
    

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