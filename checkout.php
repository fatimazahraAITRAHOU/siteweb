<?php
session_start();
require_once 'connect.php';


$total = isset($_SESSION['total']) ? $_SESSION['total'] : 0 ;
$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

if(isset($_POST['Order'])){
  $Phone = $_POST['Phone'];
  $Country = $_POST['Country'];
  $City = $_POST['City'];
  $Address = $_POST['Address'];
  $Payment = $colors = isset($_POST['Payment']) ? implode(',', $_POST['Payment']) : '';
  $lastname = $_POST['lastName'];
  $firstname = $_POST['firstName'];
  $fullname = $lastname . " ". $firstname; 
   
  $productsString = mysqli_real_escape_string($con, implode(", ", $products));


  $insert ="INSERT INTO `orders`(`Total`,`Orders` , `Customer`, `Phone`, `Country`, `City`, `Address`, `Delivry Type`) VALUES ('$total','$productsString','$fullname','$Phone','$Country','$City','$Address',' $Payment')";
  $resultat= mysqli_query($con6 , $insert);
  if ($resultat) {

          header('location: message.php');
          exit;
       }
       else {
            echo "Error: " . mysqli_error($con6);
        }

 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!-- header -->
    <?php
   require_once 'header.php';
   ?>
      </header>
     <section class="checkout section-p1">
            <form method="post" action="">
              <h3>Complete You Order</h3>  
                <div class="boxInput">
                <div class="input-box">
                <label for="phone"> phone:</label>
                <input type="text" name="Phone" id="Phone" placeholder="Enter Your Phone">
            </div>
                <div class="input-box">
                <label for="Name"> LastName:</label>
                <input type="text" name="lastName" id="lastName" placeholder="Enter Your lastName">
            </div>
                <div class="input-box">
                <label for="Name"> FirstName:</label>
                <input type="text" name="firstName" id="firstName" placeholder="Enter Your firstName">
            </div>
                <div class="input-box">
                <label for="Country"> Country:</label>
                <input type="text" name="Country" id="Country" placeholder="Enter Your Country">
            </div>
                <div class="input-box">
                <label for="City"> City:</label>
                <input type="text" name="City" id="City" placeholder="Enter Your City">
            </div>
                <div class="input-box">
                <label for="Address">Address:</label>
                <input type="text" name="Address" id="Address" placeholder="Enter Your Address">
            </div>
                <div class="input-box">
                <label for="">Payment Method:</label>
                    <label for="">Cache on delivry</label>
                    <input type="checkbox" name="Payment[]" value="Cache on delivry">
                    <label for="">Credit cart</label>
                    <input type="checkbox" name="Payment[]" value="Credit cart">
            </div>
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <div class="input-box">
                  <label for="Total">Total:</label>
                  <input type="text" name="displayTotal" id="displayTotal" value="<?php echo $total . " MAD"; ?>" readonly>
              </div>
              <div class="input-box">
                  <label for="Products">Products:</label>
                  
                  <?php foreach ($products as $product) {
                          echo $product;
                      } ?>
                  
              </div>


            <input type="submit" style="width: 100%; text-align: center; color: white; background-color: #77ABBD;" name="Order" id="Order" value="Order New">
        </div>
            </form>
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