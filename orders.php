<?php

$user = $_SESSION["user"] ?? null; // Pokud není přihlášen, bude null

require "./layout/head2.phtml";
require "./orders.phtml";
require "./layout/tail.phtml";