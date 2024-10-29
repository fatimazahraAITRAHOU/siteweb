
<?php
require_once 'connect.php';

$limit1 = 6;
$select1 = "SELECT * FROM `products` LIMIT $limit1";
$data1 = mysqli_query($con2, $select1);

$id = $_GET['id'];
$select = "SELECT * FROM `products` WHERE `id` = '$id'";
$data = mysqli_query($con2 , $select);
$products = mysqli_fetch_array($data);
$colorImages = [];

$select_images = "SELECT * FROM `product_images` WHERE `product_id` = '$id'";
$image_data = mysqli_query($con2, $select_images);

while ($row = mysqli_fetch_assoc($image_data)) {
    $color = $row['color'];
    $image_path = $row['image_path'];
    if (!isset($colorImages[$color])) {
        $colorImages[$color] = [];
    }
    $colorImages[$color][] = $image_path;
}

$defaultColor = array_key_first($colorImages);
$defaultImages = $colorImages[$defaultColor];
if(isset($_POST[''])){
  $Title = $_POST['title'];
  $description= $_POST['description'];
  $quantity = $_POST['quantite'];
  $stock = $_POST['stock'];
  $price = $_POST['price'];
  $colors = isset($_POST['colors']) ? implode(',', $_POST['colors']) : '';
  $size = isset($_POST['size']) ? implode(',', $_POST['size']) : '';
  
  $file_name = $_FILES['image']['name'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $upload_path = "../images1/" . $file_name;
  if(!empty($Title) && !empty($file_name) && !empty($description)&& !empty($quantity)&& !empty($stock)&& !empty($price)&& !empty($colors)&& !empty($size)){
   $Update= "UPDATE `products` SET `title`='$Title',`image`='$file_name',`description`='$description',`quantity`='$quantity',`stock`='$stock',`price`='$price',`colors`='$colors',`size`='$size' WHERE `id` = $id";
  $resultat= mysqli_query($con2 , $Update);
  if($resultat){
    move_uploaded_file($file_tmp, $upload_path);
  $delete_images = "DELETE FROM `product_images` WHERE `product_id` = '$id'";
            mysqli_query($con2, $delete_images);

            if (isset($_POST['color_images']) && is_array($_POST['color_images'])) {
                foreach ($_POST['color_images'] as $color => $image_path) {
                    $insert_image = "INSERT INTO `product_images` (`product_id`, `color`, `image_path`) VALUES ('$id', '$color', '$image_path')";
                    mysqli_query($con2, $insert_image);
                }
            }

            header("Location: products.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con2);
        }
  }

   
} 
  if(isset($_POST['ADD'])){
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantite']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_colors = mysqli_real_escape_string($con, $_POST['product_colors']);
    $product_size = mysqli_real_escape_string($con, $_POST['product_size']);
    $product_image = mysqli_real_escape_string($con, $_POST['product_image']);
    
    $select_cart = "SELECT * FROM `cart` WHERE name = '$product_title'";
    $result = mysqli_query($con, $select_cart);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $message[] = 'Product already added to cart';
        } else {
            $insert = "INSERT INTO `cart`( `image`, `name`, `color`, `size`, `quantite`, `price`) VALUES ('$product_image','$product_title','$product_colors','$product_size','$quantity','$product_price')";
            $resultat = mysqli_query($con, $insert);

            if ($resultat) {
                $message[] = 'Product added to cart successfully!';
                header('location:add_to_carte.php');
                exit();
            } else {
                $message[] = 'Error: ' . mysqli_error($con);
            }
        }
    } else {
        $message[] = 'Error: ' . mysqli_error($con);
    }
}
      
 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product shop</title>
    <link rel="stylesheet" href="assest1/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <!-- Header -->
     <?php
   require_once 'header.php';
   ?>

<?php
  if(isset($message)){
    foreach($message as $message){
        echo '<div><span>'.$message.'</span><i class="fas fa times" onclick="this.parentElement.style.display =`none`;"></i></div>';
    };
  };
?>
    <!-- "product-shop -->
     <section id="product-shop" class="section-p1">
     <form method="post" enctype="MULTIPART/FORM-DATA" style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-top: 20px;" action="">
     <input type="hidden" name="id" value ="<?php echo $products['id'];?>">

        <div class="big-image">
            
        <img src="../images1/<?php echo $defaultImages[0]; ?>" name="image" width="100%" id="BigImage" alt="product image">
                <input type="hidden" name="product_image" value="<?php echo $defaultImages[0]; ?>">
                <div class="small-image">
                    <?php
                    foreach ($colorImages as $color => $images) {
                        foreach ($images as $image_path) {
                            $displayStyle = ($color === $defaultColor) ? 'block' : 'none';
                            echo '<div class="small-image-col" style="display: '.$displayStyle.';">
                                    <img src="../images1/'.$image_path.'" width="100%" class="smallImage" alt="image" data-color="'.$color.'" data-image="../images1/'.$image_path.' ">
                                  </div>';
                        }
                    }
                    ?>
            </div>
          </div>
          <div class="details">
            <h6 >pijama /Women</h6>
            <h4 name="title"><?php echo $products['title']; ?></h4>
            <h2 name="price"><?php echo $products['price']; ?> MAD</h2>
            <input type="hidden" name="product_title" value ="<?php echo $products['title'];?>">
            <input type="hidden" name="product_price" value ="<?php echo $products['price'];?>">
            <div class="color">
            <p name='colors'>Color:</p>
           <?php
                    foreach ($colorImages as $color => $images) {
                        echo '
                        <label for="'.$color.'">
                            <span class="color" style="background-color: '.$color.';" data-image="../images1/'.$images[0].'"  onclick="selectColor(\''.$color.'\')"></span>
                        </label>
                        ';
                    }
                    ?>
        </div><br><br>
        <input type="hidden" name="product_colors" id="selectedColor" value="">
            <select name="size" id="selectedSize" onchange="selectSize(this.value)">
            <option value="">Select Size</option>
            <?php
            $sizes = explode(',', $products['size']);
            foreach ($sizes as $size) {
                echo '
                <option value="'.$size.'">'.$size.'</option>
                ';
            }
            ?>
        </select>
        <input type="hidden" name="product_size" id="hiddenSize" value="">
            <!-- <input type="hidden" name="product_size" value ="<?php echo $products['size'];?>"> -->
            <div class="choose">
            <input type="Number" name="quantite" value="1">     
            <button name="ADD">Add To Cart</button>
        </div>
         <h4 name="stock"><?php echo $products['stock'];?></h4>
            <h4>Product Details</h4>
            <span><?php echo $products['description']; ?></span>
          </div>
          </form>
     </section>


     <section id="pruducts1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container" > 
            <?php foreach($data1 as $product) {
                    ?>
                    <form action="" method="post">
            <div class="pro" onclick="window.location.href ='product_shop.php?id=<?php echo $product['id']; ?>';">
                
                <img src="../images1/<?php echo $product['image'];?>" alt="">
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
    <!-- footer -->
    <?php
   require_once 'footer.php';
   ?>
   <script>
    function selectColor(color) {
    document.getElementById('selectedColor').value = color;
}

function selectSize(size) {
    document.getElementById('hiddenSize').value = size;
}
     document.querySelectorAll('.color span').forEach(color => {
        color.addEventListener('click', function() {
            const newImage = this.getAttribute('data-image');
            document.getElementById('BigImage').src = newImage;
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const colorElements = document.querySelectorAll('.color .color');
        const smallImages = document.querySelectorAll('.small-image .small-image-col');
        const bigImage = document.getElementById('BigImage');

        colorElements.forEach(colorElement => {
            colorElement.addEventListener('click', function() {
                const selectedColor = this.style.backgroundColor;
                const newImage = this.getAttribute('data-image');
                bigImage.src = newImage;
                document.querySelector('input[name="product_image"]').value = newImage;

                smallImages.forEach(img => {
                    img.style.display = 'none';
                });

                smallImages.forEach(img => {
                    if (img.querySelector('img').getAttribute('data-color') === selectedColor) {
                        img.style.display = 'block';
                    }
                });
            });
        });

        document.querySelectorAll('.small-image .small-image-col img').forEach(img => {
            img.addEventListener('click', function() {
                bigImage.src = this.getAttribute('data-image');
            });
        });
    });
   </script>


       <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assest1/main.js"></script>
</body>
</html>