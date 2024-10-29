<?php
try{
    $con = mysqli_connect("localhost", "root", "", "shopping-cart");
    if(!$con){
        throw new Exeption("No Connect".mysqli_connect_error());
    }
}catch(Exeption $e){
    echo"ERROR".$e -> getMessage();
}

try{
    $con2 = mysqli_connect("localhost", "root", "", "add products");
    if(!$con2){
        throw new Exeption("No connect.".mysqli_connect_error());
    }
}catch (Exeption $e){
    echo "ERROR".$e -> getMessage();
}
// try{
//     $con4 = mysqli_connect("localhost", "root", "", "checkout");
//     if(!$con4){
//         throw new Exeption("No connect.".mysqli_connect_error());
//     }
// }catch (Exeption $e){
//     echo "ERROR".$e -> getMessage();
// }

try{
    $con5 = mysqli_connect("localhost", "root", "", "login_ecommerce");
    if(!$con5){
        throw new Exeption("No connect.".mysqli_connect_error());
    }
}catch (Exeption $e){
    echo "ERROR".$e -> getMessage();
}

try{
    $con6 = mysqli_connect("localhost", "root", "", "orders_shop");
    if(!$con6){
        throw new Exeption("No connect.".mysqli_connect_error());
    }
}catch (Exeption $e){
    echo "ERROR".$e -> getMessage();
}

try{
    $con7 = mysqli_connect("localhost", "root", "", "email");
    if(!$con7){
        throw new Exeption("No connect.".mysqli_connect_error());
    }
}catch (Exeption $e){
    echo "ERROR".$e -> getMessage();
}
try{
    $con8 = mysqli_connect("localhost", "root", "", "edit profil");
    if(!$con8){
        throw new Exeption("No connect.".mysqli_connect_error());
    }
}catch (Exeption $e){
    echo "ERROR".$e -> getMessage();
}

?>