<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="assest1/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .Message h1{
    text-align: center;
    color: #3B6A8C;
  }
  .Message a{
    color: black;
  }
    </style>
</head>

<body>

    <!-- header -->
    <?php
   require_once 'header.php';
   ?>
      <section class=" Message section-p1 section-m1">
        <h1>Nous avons reçu votre demande et vous contacterons dès que possible. <br>
          MERCI</h1>
          <a href="index.php"class='btn'>Retour à l'index </a>
      </section>

<?php
   require_once 'footer.php';
   ?>

       <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assest1/main.js"></script>
</body>
</html>