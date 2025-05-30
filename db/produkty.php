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
function getProduct($db, $id) {
    $stmt = mysqli_prepare($db, "
        SELECT * FROM produkty
        WHERE kod_produktu = ?
    ");
    if ($stmt === false) {
        echo "<h1>Nepodařilo se načíst produkt</h1>";
        echo mysqli_error($db);
        exit;
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_execute($stmt);
    if ($result === false) {
        echo "<h1>Nepodařilo se načíst produkt</h1>";
        echo mysqli_error($db);
        exit;
    }
    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
}
function listProducts($db) {
    $result = mysqli_query($db, "
        SELECT *
        FROM produkty;
    ");
    if ($result === false) {
        echo "<h1>Nepodařilo se získat produkty</h1>";
        echo mysqli_error($db);
        exit;
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function editProduct($db,$id,$name,$cost,$weight,$timeArrive){
    $stmt = mysqli_prepare($db,"
    UPDATE produkty
    SET nazev_produktu = ?, cena = ?, hmotnost = ?, doba_doruceni = ?
    WHERE kod_produktu = ?
    ");
    
    if($stmt === false){
           echo "<h1>Produkt se nezdařilo přidat.</h1>";
            echo mysqli_error($db);
    }
    mysqli_stmt_bind_param($stmt, "siiii",$name,$cost,$weight,$timeArrive,$id);
    $result = mysqli_execute($stmt);

    if ($result === false) {
        echo "<h1>Produkt se nezdařilo přidat.</h1>";
        echo mysqli_error($db);
        exit;
    }
}
function deleteProduct($db, $id) {
    $stmt = mysqli_prepare($db, "
        DELETE FROM produkty
        WHERE kod_produktu = ?
    ");
    if ($stmt === false) {
        echo "<h1>Nepodařilo se odebrat produkt</h1>";
        echo mysqli_error($db);
        exit;
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_execute($stmt);
    if ($result === false) {
        echo "<h1>Nepodařilo se odebrat produkt</h1>";
        echo mysqli_error($db);
        exit;
    }
}