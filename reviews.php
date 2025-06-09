<?php
require "./utils/init.php";
require "./db/recenze.php";
require "./db/objednavky.php";

$user = $_SESSION["user"] ?? null; // Pokud není přihlášen, bude null

require "./layout/head2.phtml";

require "./review.phtml";
if (isset($_GET["idRecenze"]) && $user !== null) {
    if (isset($_POST["postReview"])) {

        
        if (isset($_POST["popis"], $_POST["pocetStar"], $_POST["koupitPriste"])) {
        
            pridatRecenzi($db,$_POST["popis"],$_POST["pocetStar"],$_POST["koupitPriste"],$user["uzivatelske_jmeno"],$user["uzivatelske_jmeno"], $_GET["idRecenze"]);
        } else {
            echo "<p style='color:red;'>Chybí některé údaje ve formuláři.</p>";
        }
    }

} elseif ($user === null) {
    echo "<p style='color:red;'>Musíte být přihlášen, abyste mohl přidat recenzi.</p>";
} else {
    echo "<p style='color:red;'>Chybí ID recenze v URL.</p>";
}

require "./layout/tail.phtml";
