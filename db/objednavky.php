<?php
function getObjednavku($db, $id) {
    $stmt = mysqli_prepare($db, "
        SELECT * FROM objednavky
        WHERE kod_objednavky = ?
    ");
    if ($stmt === false) {
        echo "<h1>Nepodařilo se načíst objednavku</h1>";
        echo mysqli_error($db);
        exit;
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_execute($stmt);
    if ($result === false) {
        echo "<h1>Nepodařilo se načíst objednavku</h1>";
        echo mysqli_error($db);
        exit;
    }
    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
}
function listObjednavky($db){
    $result = mysqli_query($db, "
        SELECT *
        FROM objednavky;
    ");
    if ($result === false) {
        echo "<h1>Nepodařilo se získat objednávky</h1>";
        echo mysqli_error($db);
        exit;
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function upravitObjednavku($db,$id,$state){
    $stmt = mysqli_prepare($db,"
    UPDATE objednavky
    SET stav_objednavky = ?
    WHERE kod_objednavky = ?
    ");
    
    if($stmt === false){
           echo "<h1>Objednavku se nezdařilo upravit.</h1>";
            echo mysqli_error($db);
    }
    mysqli_stmt_bind_param($stmt, "si",$state,$id);
    $result = mysqli_execute($stmt);

    if ($result === false) {
        echo "<h1>Objednavku se nezdařilo upravit.</h1>";
        echo mysqli_error($db);
        exit;
    }
}
function odstranitObjednavku($db, $id) {
    $stmt = mysqli_prepare($db, "
        DELETE FROM objednavky
        WHERE kod_objednavky = ?
    ");
    if ($stmt === false) {
        echo "<h1>Nepodařilo se odebrat objednavku</h1>";
        echo mysqli_error($db);
        exit;
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_execute($stmt);
    if ($result === false) {
        echo "<h1>Nepodařilo se odebrat objednavku</h1>";
        echo mysqli_error($db);
        exit;
    }
}