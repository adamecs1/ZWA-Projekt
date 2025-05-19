<?php

$user = $_SESSION["user"] ?? null; // Pokud není přihlášen, bude null

    if($user===NULL){
        unset($_SESSION["user"]);
        require "./layout/head3.phtml";
        require "./homepage.phtml";
        require "./layout/tail.phtml";
    }
    require "./layout/head2.phtml";
    require "./orders.phtml";
    require "./layout/tail.phtml";

