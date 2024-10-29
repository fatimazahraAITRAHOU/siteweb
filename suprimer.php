<?php

require_once ('connect.php');
$id = $_GET["id"];
$select = "DELETE FROM `cart` WHERE `id` = '$id'";
mysqli_query($con , $select);
header ("location: add_to_carte.php");
        exit();
?> 