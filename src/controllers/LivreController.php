<?php

class LivreController {

    public function afficherTousLesLivres() {
        $model = new LivreModel;
        $livres = $model->recupererTousLesLivres();

        include Config::DOSSIER_VIEWS . '/livres/all.html.php';
    }


    public function supprimerLivre() {
        $empruntModel = new EmpruntModel;
        if ($empruntModel->verifier_emprunt_avec_livre($_GET['id'])) {
            $empruntModel->supprimerUnEmpruntParRapportALivre($_GET['id']);
        }

        $livreModel = new LivreModel;
        $livreModel->supprimerLivre($_GET['id']);

        rediriger('/livres');
    }

    public function creerLivre() {
        if (!empty($_POST)) {
            $model = new LivreModel;
            if (
                !empty($_POST['titre'])
                && !empty($_POST['isbn'])
                && !empty($_POST['auteur'])
                && !empty($_POST['date'])
                && !empty($_POST['stock'])

                && is_numeric($_POST['stock'])
                && is_numeric($_POST['auteur'])

                && verifier_date($_POST['date'])
                // && preg_match('#\d{4}\-\d{2}\-\d{2}#', $date)	// Equivalent à verifier_date

                && $model->verifier_auteur($_POST['auteur'])
            ) {

                $model->creerUnLivre(
                    htmlspecialchars($_POST['titre']),
                    htmlspecialchars($_POST['isbn']),
                    $_POST['auteur'],
                    $_POST['date'],
                    $_POST['stock']
                );

                rediriger('/livres');
            } else {
                $erreur = 'Erreur de saisie du formulaire';
            }
        }

        include Config::DOSSIER_VIEWS . '/livres/creer.html.php';
    }
}
