<?php
require_once 'connect.php';

if (isset($_POST["submit"])) {
    $LastName = trim($_POST["LastName"]);
    $FirstName = trim($_POST["FirstName"]);
    $Email = trim($_POST["Email"]);
    $Password = trim($_POST["Password"]);
    $ConfirmPassword = trim($_POST["ConfirmPassword"]);

    // Check if all fields are filled
    if (empty($LastName) || empty($FirstName) || empty($Email) || empty($Password) || empty($ConfirmPassword)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        // Check if passwords match
        if ($Password !== $ConfirmPassword) {
            echo "Passwords do not match.";
        } else {
            // Check if email already exists
            $select = "SELECT * FROM `login` WHERE Email = '$Email' AND Password = '$Password'";
            $resultat = mysqli_query($con5, $select);
            if (mysqli_num_rows($resultat) > 0) {
                echo "An account with this email already exists.";
            } else {
                // Insert new record
                $insert = "INSERT INTO `login`(`Last Name`, `First Name`, `Email`, `Password`, `Return The Password`) VALUES ('$LastName','$FirstName','$Email','$Password','$Password')";
                mysqli_query($con5, $insert);
                header('Location: login.php');
                exit();
            }
        }
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
               <a href="login.html"> <span><img src="image/enter.png" width="20px" alt=""></span>
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
                <li id="lg-bag"><a href="cart.php"><ion-icon name="cart-outline"></ion-icon></a></li>
                <a href="#" id="close"><ion-icon name="close-outline"></ion-icon></a>
            </ul>
         <div id="mobile">
            <a href="cart.php"><ion-icon name="cart-outline"></ion-icon></a>
            <ion-icon id="bar" name="menu-outline"></ion-icon>
        </div>   
        </nav>
      </header>



      <div class="container-login" id="container-login">
        <div class="form-container sign-up">
        <form id="form" method="post">
    <h1>Create Account</h1>
    <div class="social-icons">
        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
    </div>
    <h4>or use your email for registration</h4>
    <input type="text" id="LastName" name="LastName" placeholder="LastName" autocomplete="family-name">
    <div class="error" id="lastNameError"></div>
    <input type="text" id="FirstName" name="FirstName" placeholder="FirstName" autocomplete="given-name">
    <div class="error" id="FirstNameError"></div>
    <input type="email" id="Email" name="Email" placeholder="Email" autocomplete="email">
    <div class="error" id="EmailError"></div>
    <input type="password" id="Password" name="Password" placeholder="Password" autocomplete="new-password">
    <div class="error" id="PasswordError"></div>
    <input type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" autocomplete="new-password">
    <div class="error" id="ConfirmPasswordError"></div>
    <button type="submit" class="submit" name="submit">Sign Up</button>
    <h4>You already have an account? <a href="login.php" style="color: white;">your login</a></h4>
</form>

        </div>
        </div>
    
        



       <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="main.js"></script>
</body>
</html>