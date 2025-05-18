<?php
function registerUser($db,$username,$passwd,$tel,$email,$address,$psc,$rights){
    $stmt = mysqli_prepare($db, "
        INSERT INTO users
        (uzivatelske_jmeno, heslo, tel_cislo,email,adresa,psc,is_admin)
        VALUES
        (?, ?, ?, ?, ?, ?, ?)
    ");
    if ($stmt === false) {
        echo "<h1>Registrace se nezdařila.</h1>";
        echo mysqli_error($db);
        exit;
    }
    $hashedPasswd = password_hash($passwd, PASSWORD_BCRYPT);
    mysqli_stmt_bind_param($stmt, "ssissii", $username, $hashedPasswd, $tel,$email,$address,$psc,$rights);
    $result = mysqli_execute($stmt);

    if ($result === false) {
        echo "<h1>Registrace se nezdařila.</h1>";
        echo mysqli_error($db);
        exit;
    }
}

function loginUser($db,$username,$passwd){
    $stmt = mysqli_prepare($db,"
    SELECT * FROM users
    WHERE uzivatelske_jmeno = ?
    ");
        if ($stmt === false) {
        echo "<h1>Přihlášení se nezdařilo.</h1>";
        echo mysqli_error($db);
        exit;
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    $result = mysqli_execute($stmt);
    if ($result === false) {
        echo "<h1>Přihlášení se nezdařilo.</h1>";
        echo mysqli_error($db);
        exit;
    }
    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    if ($user === null || password_verify($passwd, $user["heslo"])) {
        echo "<p>Neplatné přihlašovací údaje.</p>";
        return;
    }

    $_SESSION["user"] = $user;

   
}
?>