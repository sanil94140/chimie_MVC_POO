<?php

class Router {
    private $route;

    public function __construct() {
        if (isset($_SERVER['PATH_INFO'])) $this->route = $_SERVER['PATH_INFO'];
        else $this->route = '/accueil';
    }

    public function meneMoiAuBonController() {

        switch ($this->route) {

            case '/connexion':
                session_start();
                se_connecter();
                rediriger('/molecules');

                break;

            case '/deconnexion':
                se_deconnecter();
                rediriger('/molecules');

                break;

            case '/supprimer-molecule':
                $controller = new MoleculeController;
                $controller->supprimerMolecule();
                break;


            case '/creer-molecule':
                $controller = new MoleculeController;
                $controller->creerUneMolecule();
                break;

            case '/molecules':
                $controller = new MoleculeController;
                $controller->afficherTousLesMolecules();
                break;

            case '/supprimer-emprunt':
                $controller = new EmpruntController;
                $controller->supprimerEmprunt();
                break;

            default:
                echo 'Page non trouvée';
        }
    }
}

?>