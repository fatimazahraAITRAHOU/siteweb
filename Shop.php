
<?php
require_once 'connect.php';
$select = "SELECT * FROM `products` ";
$data = mysqli_query($con2, $select);
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
   <?php
   require_once 'header.php';
   ?>
     
    <!-- Featured Products -->
    <section id="pruducts1" class="section-p1">
        <div class="pro-container">
        <?php foreach($data as $product) {
                    ?>
                    <form action="" method="post">
            <div class="pro" onclick="window.location.href ='product_shop.php?id=<?php echo $product['id']; ?>';">
            <?php
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

    <!-- pagination -->
    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><ion-icon class="i" name="arrow-forward-outline"></ion-icon></a>
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