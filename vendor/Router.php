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
                $connexion= new SessionController();
                $connexion->connexion();
                break;

            case '/deconnexion':
                seDeconnecter();
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


            default:
                echo 'Page non trouvée';
        }
    }
}

?>