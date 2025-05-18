<?php

##funnkce pro registraci
require "./utils/init.php";
require "./db/users.php";

require "./layout/head.phtml";
if (isset($_POST["registerForm"])) {
    if ($_POST["password"] !== $_POST["password-again"]) {
        echo "<p>Hesla se neshodují!</p>";
    } else {
        registerUser($db,$_POST["username"],$_POST["password"],$_POST["tel"],$_POST["email"],$_POST["adresa"],$_POST["psc"],$_POST["rights"]);
    }
}
#rights 1 == zakaznik
#rights 2 == root/spravce
require "./registrace.phtml";
require "./layout/tail.phtml";