<?php
require_once "./db/objednavky.php";
$user = $_SESSION["user"] ?? null; // Pokud není přihlášen, bude null

    if($user===NULL){
        unset($_SESSION["user"]);
        require "./layout/head3.phtml";
        require "./homepage.phtml";
        require "./layout/tail.phtml";
    }

if (isset($_POST["deleteOrder"])) {
    odstranitObjednavku($db, $_POST["idObjednavky"]);
}
$user = $_SESSION["user"] ?? null;
if($user===NULL){
    require "./layout/head3.phtml";
}
elseif($user!==NULL){
     if(isset($_POST["submitOrder"])){
            pridatObjednavku($db,$_POST["state"],$_POST["idObjednavky"]);
            require "orders.phtml";
        }
        else{
if (isset($_GET["idObjednavky"])) {
    require "./layout/head2.phtml";
    if (isset($_POST["editOrderForm"])) {
       upravitObjednavku($db,$_GET["idObjednavky"],$_POST["state"]);
    }

    $order = getObjednavku($db, $_GET["idObjednavky"]);
    require "./editOrder.phtml";
} else {
    require "./layout/head2.phtml";
    $orders = listObjednavky($db);
    require "./orders.phtml";
}
    }
    require "./layout/tail.phtml";
}
