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

            case '/supprimer-livre':
                $controller = new LivreController;
                $controller->supprimerLivre();
                break;

            case '/supprimer-molecule':
                $controller = new MoleculeController;
                $controller->supprimerMolecule();
                break;

            case '/creer-livre':
                $controller = new LivreController;
                $controller->creerLivre();
                break;

            case '/livres':

            case '/creer-molecule':
                $controller = new MoleculeController;
                $controller->creerUneMolecule();
                break;

            case '/livres':
                $controller = new LivreController;
                $controller->afficherTousLesLivres();
                break;

            case '/molecules':
                $controller = new MoleculeController;
                $controller->afficherTousLesMolecules();
                break;

            case '/supprimer-emprunt':
                $controller = new EmpruntController;
                $controller->supprimerEmprunt();
                break;

            case '/creer-emprunt':
                $controller = new EmpruntController;
                $controller->creerEmprunt();
                break;

            case '/emprunts':
                $controller = new EmpruntController;
                $controller->afficherTousLesEmprunts();
                break;

            default:
                echo 'Page non trouvée';
        }
    }
}

?>