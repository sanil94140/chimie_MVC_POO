<?php

class EmpruntModel extends Model {
    function verifier_emprunt_avec_livre($id_livre): bool {
        $requete = "SELECT * FROM emprunt WHERE ? = emprunt.livre";

        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $id_livre
        ]);

        $livre = $prep->fetchAll();

        if (empty($livre)) return false;
        else return true;
    }

    public function supprimerUnEmpruntParRapportALivre($id_livre) {
        $requete = 'DELETE FROM emprunt WHERE livre = ?';
        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $id_livre
        ]);
    }

    public function supprimerUnEmprunt($id) {
        $requete = 'DELETE FROM emprunt WHERE id = ?';
        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $id
        ]);
    }

    public function recupererTousLesEmprunts() {
        $requete = 'SELECT 
            emprunt.id,
            emprunt.date_emprunt, 
            emprunt.date_retour, 
            personne.prenom AS prenom_emprunteur, 
            personne.nom AS nom_emprunteur, 
            `role`.nom AS role_emprunteur, 
            livre.titre, 
            auteur.prenom AS prenom_auteur, 
            auteur.nom AS nom_auteur 
        FROM emprunt 
            INNER JOIN personne ON emprunt.abonne = personne.id 
            LEFT OUTER JOIN `role` ON personne.role_id = `role`.id 
            INNER JOIN livre ON emprunt.livre = livre.id 
            INNER JOIN auteur ON livre.auteur_id = auteur.id 
        ORDER BY `livre`.`titre` ASC
        ';
        $reponse = $this->bdd->query($requete);

        $emprunts = $reponse->fetchAll(PDO::FETCH_ASSOC);

        return $emprunts;
    }

    public function creerUnEmprunt($emprunteur, $livre) {
        $requete = "INSERT INTO emprunt (abonne, livre, date_emprunt) VALUE 
        (?, ?, ?)";
        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $emprunteur,
            $livre,
            date('Y-m-d')
        ]);
    }

    /**
     * Vérifie que l'id_emprunteur fourni existe dans la table des abonnés
     * 
     * 
     * L'idée : Si un id_emprunteur existe
     * Alors je suis capable d'aller chercher un abonné qui a cet id
     */
    function verifier_emprunteur($id_emprunteur): bool {
        $requete = "SELECT * FROM personne WHERE ? = personne.id";

        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $id_emprunteur
        ]);

        $abonne = $prep->fetchAll();

        if (empty($abonne)) return false;
        else return true;
    }
}
