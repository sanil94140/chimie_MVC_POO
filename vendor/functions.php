<?php

function rediriger(string $route) {
    header('location: ' . Config::BASE_URL . $route);
    die();
}

function url(string $route) {
    return Config::BASE_URL . $route;
}

function est_connecte() {
    return isset($_SESSION['is_connected']) && $_SESSION['is_connected'] === true;
}

function se_connecter() {
    $bdd = new PDO('mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME, Config::DB_USER, Config::DB_PSW);
     $_SESSION['is_connected'] === true;
     return;
}

function se_deconnecter(){
    session_destroy();
    session_start();
    return;
    
}

// /**
//  * Vérifie qu'une date est bien au format qu'on attend
//  * (AAAA-MM-JJ)
//  * 
//  * @param string $date La date à vérifier
//  * @return bool Indique si la date est valide ou non
//  */
// function verifier_date(string $date): bool {


//     if (strlen($date) != 10) return false;    // Si j'ai pas 10 caractères, je renvoie false
//     if (substr_count($date, '-') != 2) return false; // Si j'ai pas exactement 2 '-', je renvoie false


//     $date_separee = explode('-', $date); // Je sépare ma date avec les '-'

//     return checkdate($date_separee[1], $date_separee[2], $date_separee[0]);
// }
