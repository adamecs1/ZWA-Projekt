<?php
function addProduct($db,$name,$cost,$weight,$timeArrive){
        $stmt = mysqli_prepare($db, "
        INSERT INTO produkty
        (nazev_produktu,cena,hmotnost,doba_doruceni)
        VALUES(?, ?, ?, ?)
    ");
    if ($stmt === false) {
        echo "<h1>Produkt se nezdařilo přidat.</h1>";
        echo mysqli_error($db);
        }

    mysqli_stmt_bind_param($stmt, "siii",$name,$cost,$weight,$timeArrive);
    $result = mysqli_execute($stmt);

    if ($result === false) {
        echo "<h1>Produkt se nezdařilo přidat.</h1>";
        echo mysqli_error($db);
        exit;
    }
    
}