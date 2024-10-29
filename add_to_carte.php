<?php

session_start();
require_once ('connect.php');

$select = "SELECT * FROM `cart` ";

   $data = mysqli_query($con , $select);
   $total = 0;
   $products = [];

   
   

   while ($row = mysqli_fetch_assoc($data)) {
    $total += $row['price'] * $row['quantite'];
    $products[] = $row['name'];
}
   $_SESSION['total'] = $total;
   $_SESSION['products'] = $products;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add to cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        th,td{
            border:solid 1px #000;
            padding: 10px;
        }
    </style>
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
               <a href="login.html"> <span><img src="image/enter.png" width="20px" alt=""></span>
                <span>Login</span></a>
            </div>
        </div>
    </div>
    <nav class="nav container">
              <a class="logo" href="index.php">LOGO.</a>
              <ul id="navbar">
                <li><a  href="index.php">Home</a></li>
                <li><a href="Shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a  href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="add to carte.php"><ion-icon name="cart-outline"></ion-icon></a></li>
                <a href="#" id="close"><ion-icon name="close-outline"></ion-icon></a>
            </ul>
         <div id="mobile">
            <a href="cart.php"><ion-icon name="cart-outline"></ion-icon></a>
            <ion-icon id="bar" name="menu-outline"></ion-icon>
        </div>   
        </nav>
      </header>

 
      <!-- cart -->
       <section class="cart section-p1">
        <div class="cart-container">
        <table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Color</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Price</th>
            <th >Remove</th>
        </tr>
    </thead>
    <tbody>
    <?php
                    $data = mysqli_query($con, $select); 
                    while ($row = mysqli_fetch_assoc($data)) { ?>
                        <tr>
                            <td><img src="../images1/<?php echo $row['image']?>" alt="image" style="width: 80px;"></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['color']?></td>
                            <td><?php echo $row['size']?></td>
                            <td><?php echo $row['quantite']?></td>
                            <td><?php echo $row['price']?></td>
                            <td><a href='suprimer.php?id=<?php echo $row['id']?>'>Remove</a></td>
                        </tr>
                  <?php } ?>
                </tbody>
</table>
        </div>
        <div class="details-cart">
        <div class="coupon">
            <h4>Apply Coupon</h4><br>
                <input type="text" name="coupon" class="couponinput" id="coupon" placeholder="Enter You Coupon"><br><br>
                <input type="submit" class="Apply" name="Apply" id="Apply" value="Apply">
            </div>
            <div class="total">
                <h4>Cart Total</h4><br>
                <table>
                    <tr>
                        <td>Cart subtotal</td>
                        <td><?php echo $total; ?> MAD</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong><?php echo $total; ?> MAD </strong></td>
                    </tr>
                </table><br>
                <input type="hidden" name="total" value="<?php echo $total; ?>">
         <a href="checkout.php"><input type="submit"class="Apply"name="Apply"id="Apply"value="Proceed to checkout" ></a> 
         
            </div>
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