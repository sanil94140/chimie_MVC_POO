<?php

class EmpruntController {
    public function supprimerEmprunt() {
        if (empty($_GET['id'])) die();
        $model = new EmpruntModel;
        $model->supprimerUnEmprunt($_GET['id']);
        rediriger('/emprunts');
    }

    public function creerEmprunt() {

        if (!empty($_POST)) {
            $modelEmprunt = new EmpruntModel;
            $modelLivre = new LivreModel;
            if (
                !empty($_POST['livre'])
                && !empty($_POST['emprunteur'])

                && $modelLivre->verifier_livre($_POST['livre'])
                && $modelEmprunt->verifier_emprunteur($_POST['emprunteur'])
            ) {

                $modelEmprunt->creerUnEmprunt($_POST['emprunteur'], $_POST['livre']);
                rediriger('/emprunts');
            } else {
                $erreur = 'Erreur de saisie du formulaire';
            }
        }

        include Config::DOSSIER_VIEWS . '/emprunts/creer.html.php';
    }

    public function afficherTousLesEmprunts() {
        $model = new EmpruntModel;
        $emprunts = $model->recupererTousLesEmprunts();

        include Config::DOSSIER_VIEWS . '/emprunts/all.html.php';
    }
}
