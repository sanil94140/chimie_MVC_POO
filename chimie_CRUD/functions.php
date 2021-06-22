<?php

function se_connecter() {
    $bdd = new PDO('mysql:host=localhost;dbname=chimie', 'root', '');
    return $bdd;
}

function rediriger(string $url) {
    header('location: ' . $url);
    die();
}

function est_connecte() {
    return isset($_SESSION['is_connected']) && $_SESSION['is_connected'] === true;
}
