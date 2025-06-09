<?php
function pridatObjednavku($db,$nazev,$stav,$produktID){
        $casVytvoreni = date('Y-m-d H:i:s');

        $stmt = mysqli_prepare($db, "
        INSERT INTO objednavky
        (nazev_objednavky,stav_objednavky,cas_vytvoreni,produkty_kod_produktu)
        VALUES(?, ?, ?, ?)
    ");
    if ($stmt === false) {
        echo "<h1>Objednavku se nezdařilo přidat.</h1>";
        echo mysqli_error($db);
        }

    mysqli_stmt_bind_param($stmt, "sssi",$nazev,$stav,$casVytvoreni,$produktID);
    $result = mysqli_execute($stmt);

    if ($result === false) {
        echo "<h1>Objednavku se nezdařilo přidat.</h1>";
        echo mysqli_error($db);
        exit;
    }
}