<?php
require_once ('connect.php');


$limit1 = 8;
$select1 = "SELECT * FROM `products` LIMIT $limit1";
$data1 = mysqli_query($con2, $select1);


$limit2 = 8;
$offset2 = $limit1; 
$select2 = "SELECT * FROM `products` LIMIT $limit2 OFFSET $offset2";
$data2 = mysqli_query($con2, $select2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>


    <!-- header -->
    <header>
        <div class="container-header">
        <div class="top-header container">
            <div class="contact-header">
                <span>+212600000000</span>
                <span ><a href="https://maps.app.goo.gl/7ck2BDiH68QCJJSA7">Our Location</a></span>
            </div>
            <div class="login-header">
                <a href="login.php"> <span><img src="image/enter.png" width="20px" alt=""></span><span>Login</span></a>
                 <a  href="logout.php"><span><i class="bi bi-box-arrow-right"></i></span><span>Sign Out</span></a>
             </div>
        </div>
    </div>
    <nav class="nav container">
              <a class="logo" href="index.php">THE FOUR SEASON.</a>
              <ul id="navbar">
                <li><a  href="index.php">Home</a></li>
                <li><a  href="Shop.php">Shop</a></li>
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
     
<!-- landing -->
    <section class="hero">
        <div class="content-hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button ><a class="box" href="Shop.php">Shop Now</a></button>
    </div>
        <img src="image/background.jpg" alt="">
    </section>
     

    <!-- feature -->
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="image/Free Shipping.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="image/Online Order.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="image/Save money.png" alt="">
            <h6>Save money</h6>
        </div>
        <div class="fe-box">
            <img src="image/Promotions.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="image/Happy Sell.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="image/F 247 Support.png" alt="">
            <h6>F 24/7 Support</h6>
        </div>
    </section>

    <!-- product -->
    <section id="pruducts1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container" > 
            <?php foreach($data1 as $product) {
                    ?>
                    <form action="" method="post">
            <div class="pro" onclick="window.location.href ='product_shop.php?id=<?php echo $product['id']; ?>';">
            <?php
                // الحصول على الصورة الرئيسية للمنتج
                $productId = $product['id'];
                $selectImage = "SELECT * FROM `product_images` WHERE `product_id` = '$productId' LIMIT 1";
                $imageData = mysqli_query($con2, $selectImage);
                $image = mysqli_fetch_assoc($imageData);
                ?>
                <img src="../images1/<?php echo htmlspecialchars($image['image_path']); ?>" alt="Product Image">
                    <span>Product </span>
                    <h5><?php echo $product['title']?></h5>
                    <div class="star">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price">
                <span><?php echo $product['price']?> MAD</h4></span><h4>
                <span><a href="#" class="cart"><ion-icon  name="cart-outline"></ion-icon></a></span>
            </div>
            </div>
        </form>
            <?php 
            }
                    ?>
          
        </div>
    </section>
<!--  cart seasonal-->
    <section id="banner" class="section-p1">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
           <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR <br> COLLECTION</h2>
           <h3>Summer/winter</h3>
        </div>
    </section>
    <!-- NEW ARRIVAL -->
    <section id="pruducts1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container" >
        <?php foreach($data2 as $product) {
                    ?>
                    <form action="" method="post">
            <div class="pro"  onclick="window.location.href ='product_shop.php?id=<?php echo $product['id']; ?>';">
            <?php
                // الحصول على الصورة الرئيسية للمنتج
                $productId = $product['id'];
                $selectImage = "SELECT * FROM `product_images` WHERE `product_id` = '$productId' LIMIT 1";
                $imageData = mysqli_query($con2, $selectImage);
                $image = mysqli_fetch_assoc($imageData);
                ?>
                <img src="../images1/<?php echo htmlspecialchars($image['image_path']); ?>" alt="Product Image">
                    <span>Product </span>
                    <h5><?php echo $product['title']?></h5>
                    <div class="star">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price">
                <span><h4><?php echo $product['price']?> MAD</h4></span>
                <span><a href="#" class="cart"><ion-icon  name="cart-outline"></ion-icon></a></span>
            </div>
        </div>
        </form>
            <?php 
            }
                    ?>
           
        </div>
    </section>
    <!-- footer -->
   <?php
   require_once 'footer.php';
   ?>

       <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="main.js"></script>
</body>
</html>