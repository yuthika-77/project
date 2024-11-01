<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Playfair+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="LoginStyle.css">
    <link rel="stylesheet" type="text/css" href="PlayfairDisplay-Italic-VariableFont_wght.ttf">
    <script>
        function LoginValidate(event) {
            var lname = document.getElementById("name");
            var lpwd = document.getElementById("password");
            var isValid = true;

             
            if (lname.value === "" || !isNaN(lname.value)) {
                alert("Enter a correct name");
                isValid = false;
                lname.focus();  
            }

             
            if (lpwd.value.length < 8 || lpwd.value === "") {
                alert("Please enter a valid password (at least 8 characters)");
                isValid = false;
                lpwd.focus();  
            }

             
            if (!isValid) {
                event.preventDefault();
            }


            
        }
        
    </script>
</head>
<body>
    <header>
        <div class="header">
            <div id="pagetop">
                <a href="LoginForm.html">Login</a>
                <a href="logout.php">Logout</a>
            </div>
            <div class="navbar">
                <a href="index.html">Home</a>
                <a href="Cart.php">Cart</a>
                 
                <div class="dropdown">
                    <button class="dropbtn">Shop</button>
                    <div class="dropdown-content">
                        <a href="apparel.html">Apparel</a>
                        <a href="accessories.html">Accessories</a>
    
                    </div>
                </div>
            </div>
           
        </div>
    </header>
    <div class="login-container">
    <div id="Login">
        <form method="post" action="admin.php" onsubmit="LoginValidate(event)">
            <h3 style="font-size:40px;text-align:center;">Admin</h3><br>
            <label for="name">Enter your name</label><br>
            <input type="text" id="name" name="Fullname" placeholder="Enter your name" required><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Enter your password" required><br>
            <button class="button" type="submit" name="submit">Login</button>
             
        </form>
    </div>
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
    </div>
</body>
</body>
</html>
