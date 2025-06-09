<?php

require "./utils/init.php";
require "./db/produkty.php";
require "./db/addOrder.php";

require "./db/users.php";

if (isset($_POST["deleteProduct"])) {
    deleteProduct($db, $_POST["id"]);
}
$user = $_SESSION["user"] ?? null;
if($user===NULL){
    require "./layout/head3.phtml";
}
elseif($user!==NULL){
     if(isset($_POST["submitOrder"])){
            pridatObjednavku($db,$_POST["nazevObj"],$_POST["state"],$_POST["id"]);
            require "./orders.php";
        }
        else{
    require "./layout/head2.phtml";



if (isset($_GET["id"])) {
    if (isset($_POST["editProductForm"])) {
       editProduct($db,$_GET["id"],$_POST["nazev"],$_POST["cena"],$_POST["hmotnost"],$_POST["arrival"]);
       require "./showproducts.php";
    }

    $product = getProduct($db, $_GET["id"]);
    require "./editProduct.phtml";
} else {
    $products = listProducts($db);
    require "./showproducts.phtml";
}
require "./layout/tail.phtml";
    }
}

