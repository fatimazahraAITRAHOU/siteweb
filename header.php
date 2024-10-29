
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header-Project E-commerce</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    nav{
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    padding: 30px 80px;
    box-shadow: 0 15px 15px rgba(0, 0, 0,0.05);
    letter-spacing: 2px;
    z-index: 999;
    position: sticky;
    top: 0;
    left: 0;
    background-color: #F1FAEE;
  
}
.logo{
    font-size: 40px;
    font-family: "Merriweather", serif;
    color: #457B9D;
    font-weight: bold;
}
nav ul{
     display: flex;
     gap: 5%;
}
nav ul li {
    position: relative;
   
}
nav ul li a{
    color: #3B6A8C;
    font-size: 18px;
    transition: 0,4s ease;
}

nav ul li .active{
    color: #77ABBD;
}
header ul li a:hover,
header ul li a.active{
    color: #283618;
}
header ul li a.active::after,
header ul li a:hover::after{
    content: "";
    width: 40%;
    height: 2px;
    background-color: #283618;
    position: absolute;
    bottom: -4px;
    left: 1px;
}
#mobile{
    display: none;
    align-items: center;
}
#close{
    display: none;
}
#bar{
    display: none;
}
    @media(max-width:799px){
    #navbar{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        position: fixed;
        top: 0;
        right: -300px;
        height: 100vh;
        width: 300px;
        background-color: #fff;
        box-shadow: 0 40px 60px rgba(0, 0, 0, 0.1);
        padding: 80px 0 0 10px;
        transition: 0.3s;
    }
    #navbar li{
        margin-bottom: 25px;
    }
    #mobile{
        display: flex;
        align-items: center;
        font-size: 24px;
       
    }

    #mobile a{
        color: #1a1a1a;
        font-size: 24px;
        padding-left: 20px;
        margin-top: 7px;
    }
    #navbar.active{
        right: 0px; 
        z-index: 10;
    }
    #close{
        display: initial;
        position: absolute;
        top: 38px;
        left: 30px;
        color: #222;
        font-size: 24px;
    }
    
    #lg-bag{
        display: none;
    }
    }
</style>
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
      <script>
        let bar = document.getElementById('bar');
let close = document.getElementById('close');
let nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    });
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    });
}

      </script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="main.js"></script>
</body>
</html>