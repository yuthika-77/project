<html>
 <head>
     <title>Accessories</title>
     <link rel="stylesheet" type="text/css" href="accStyle.css">
     <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Playfair+Display&display=swap" rel="stylesheet">

 </head>
 <body>
     <header>
         <div class="header">
             <div id="pagetop">
                 <a href="LoginForm.html">Login</a>
             </div>
             <div class="navbar">

                 <a href="index.html">Home</a>
                 <a href="Cart.php">Cart</a>
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

     <div id="acc">
    <?php
    require_once("conn.php");

    $get = "SELECT * FROM clothes WHERE type='Accessories'";
    $run = mysqli_query($con, $get);

    while ($row = mysqli_fetch_assoc($run)) {
        $item = $row['item_ID'];
        $img = $row['image_name'];
        
        echo '<div class="image-container">
            <a href="clothes_detail.php?item_id=' . $item . '">
                <img src="' . $img . '" alt="accessory image">
            </a>
        </div>';
    }
    ?>
</div>


        
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

<div>
    <p>'.$total.'</p>
</div>