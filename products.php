<?php


require "./utils/init.php";
require "./db/produkty.php";

$user = $_SESSION["user"] ?? null;
    if(isset($_POST["addProduct"])){
        if($user["is_admin"]===2){
 addProduct($db,$_POST["nazev"],$_POST["cena"],$_POST["hmotnost"],$_POST["arrival"]);  
            require "./layout/head2.phtml";
            require "./showproducts.phtml";
            require "./layout/tail.phtml";
}   
    }
else{
    require "./layout/head2.phtml";
    require "./products.phtml";
    require "./layout/tail.phtml";
}
