<?php
session_start();
require __DIR__ . '/functions.php';

if (est_connecte()) {
    if (
        !empty($_POST['nom'])
        && !empty($_POST['formule'])
    ) {
        $bdd = se_connecter();
        $requete = sprintf("INSERT INTO molecule VALUE (NULL, '%s', '%s')", $_POST['nom'], $_POST['formule']);
        $bdd->query($requete);
        rediriger('molecules.php');
    } else {
        echo 'Formulaire mal rempli.';
        die();
    }
} else {
    echo 'Accès refusé.';
    die();
}
