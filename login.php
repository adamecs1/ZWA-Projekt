<?php

require "./utils/init.php";
require "./db/users.php";

##funkce pro login

if(isset($_POST["loginButton"])){
    loginUser($db,$_POST["username"],$_POST["password"]);
    require "orders.php";
}
else{
require "./layout/head.phtml";
require "./login.phtml";
require "./layout/tail.phtml";
}
