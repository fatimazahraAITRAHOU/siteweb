<?php
require_once 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

      

        // تنظيف المدخلات لمنع هجمات SQL Injection
        $name = $con7->real_escape_string($name);
        $email = $con7->real_escape_string($email);
        $message = $con7->real_escape_string($message);

        // تنفيذ استعلام الإدخال
        $insert = "INSERT INTO `message`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";

        if ($con7->query($insert) === TRUE) {
            // إعادة التوجيه إلى صفحة الرسائل بعد النجاح
            header('Location: ../dashboard/message.php');
            exit();
        } else {
            echo "Error: " . $insert . "<br>" . $con7->error;
        }

        // إغلاق الاتصال بقاعدة البيانات
       
    }
}
?>
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

    <!-- header -->
    <?php
   require_once 'header.php';
   ?>

     <!-- Contact -->
     <section class="contact">
        <div class="contact-info">
            <h3>Contact Us</h3>
            <div class="info">
                <h5><i class="fa-solid fa-location-crosshairs"></i> 25, derb sultan kissariyat el hefary,20000 casablanca</h5>
                <h5><i class="fa-solid fa-envelope"></i> afatimazahraaitrahou@gmail.com</h5>
                <h5><i class="fa-solid fa-phone"></i> +212700156151</h5>
                <h5><i class="fa-solid fa-phone"></i> +212653850577</h5>
                <h5><i class="fa-brands fa-square-instagram"></i> aljomla_wata9sit</h5>
            </div>
        </div>
        <div class="contact-message">
            <h3>Send a message</h3>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Enter Your Name"><br><br>
                <input type="email" name="email" placeholder="Enter Your Email"><br><br>
                <textarea name="message" id="" cols="40" rows="15" placeholder="Typing your message here..."></textarea>
                <input type="submit" name="send" value="send">
            </form>
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