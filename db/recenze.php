<?php
function pridatRecenzi($db,$popis,$pocetHvezd,$buyNextTime,$user,$userUsers,$idOrder){
    $stmt = mysqli_prepare($db,"
    INSERT INTO recenze
    (popis,pocet_hvezd,koupim_priste,uzivatelske_jmeno,users_uzivatelske_jmeno,objednavky_kod_objednavky)
    VALUES(?,?,?,?,?,?)
    
    ");
    if($stmt === false){
         echo "<h1>Recenzi se nezdařilo přidat.</h1>";
        echo mysqli_error($db);
    }
      mysqli_stmt_bind_param($stmt, "sisssi",$popis,$pocetHvezd,$buyNextTime,$user,$userUsers,$idOrder);
    $result = mysqli_execute($stmt);

    if ($result === false) {
        echo "<h1>Objednavku se nezdařilo přidat.</h1>";
        echo mysqli_error($db);
        exit;
    }
}
