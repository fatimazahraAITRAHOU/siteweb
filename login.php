<?php

session_start();

require_once 'connect.php';


if (isset($_POST["submit"])) {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

   
    $select = "SELECT * FROM `login` WHERE Email = '$Email' AND Password = '$Password'";
    $result = mysqli_query($con5, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        
        header("Location:index.php");
        exit();
    } else {
        echo "<script>alert('Wrong username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <!-- Header -->
     <header>
        <div class="container-header">
        <div class="top-header container">
            <div class="contact-header">
                <span>+212600000000</span>
                <span ><a href="https://maps.app.goo.gl/7ck2BDiH68QCJJSA7">Our Location</a></span>
            </div>
            <div class="login-header">
               <a href="login.php"> <span><img src="image/enter.png" width="20px" alt=""></span>
                <span>Login</span></a>
            </div>
        </div>
    </div>
    <nav class="nav container">
              <a class="logo" href="index.php">LOGO.</a>
              <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="Shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="add_to_carte.php"><ion-icon name="cart-outline"></ion-icon></a></li>
                <a href="#" id="close"><ion-icon name="close-outline"></ion-icon></a>
            </ul>
         <div id="mobile">
            <a href="add_to_carte.php"><ion-icon name="cart-outline"></ion-icon></a>
            <ion-icon id="bar" name="menu-outline"></ion-icon>
        </div>   
        </nav>
      </header>
      <div class="container-login" id="container-login">
        <div class="form-container sign-in">
            <form method ="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" name="Email" placeholder="Email" autocomplete="email">
                <input type="password" name="Password" placeholder="Password" autocomplete="current-password">
                <a href="#" style="color: white;">Forget Your Password?</a><br><br>
                <button type="submit" name="submit" class="submit">Sign In</button>
                <h4>You don't have an account? <a href="register.php" style="color: white;">Create an account</a> </h4>
            </form>
        </div>
    
    </div>

    <!-- newsletter -->
     <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        
        <div class="from">
             <input type="text" placeholder="Your email address">
             <button class="normal">Sign UP</button>
        </div>
     </section>
     
     
    <!-- footer -->
    <footer class="section-p1">
        <div class="col">
            <a href="#" class="LOGO">THE FOUR SEASONS</a>
            <h4>Contact</h4>
            <p><strong>Address:</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores.</p>
            <p><strong>Phone:</strong>+212700779284</p>
            <p><strong>Hours:</strong>9:00 - 17:00</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                    <i class="fa-brands fa-telegram"></i>
                    <i class="fa-brands fa-pinterest"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact US</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <p>Securd Payment Gateways</p>
            <div class="pay">
           <img src="image/card.png" alt="">
           <img src="image/logo.png" alt="">
           <img src="image/card (1).png" alt="">
           <img src="image/paypal.png" alt="">
        </div>
        </div>
        <div class="copyright">
        <p> © 2023, Fatima Zahra Aitrahou - HTML CSS Ecommerce Template </p>
        </div>
    </footer>

       <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="main.js"></script>
</body>
</html>