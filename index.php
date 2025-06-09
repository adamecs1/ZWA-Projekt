<?php


require_once "./utils/init.php";
require "./db/users.php";
$user = $_SESSION["user"] ?? null;
if($user===NULL){
    require "./layout/head.phtml";
    require "./homepage.phtml";
    require "./layout/tail.phtml";
    
}
elseif($user!==NULL){
  require "./orders.php";
}

