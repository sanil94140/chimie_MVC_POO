<?php 
session_start();

include Config::DOSSIER_VIEWS . '/parties/entete.php'; ?>

<form action="create-molecule-handler.php" method="POST">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required autofocus>
    </div>

    <div class="form-group">
        <label for="formule">Formule</label>
        <input type="text" class="form-control" name="formule" id="formule" placeholder="Formule" required>
    </div>

    <button type="submit" class="btn btn-primary">Créer une molécule</button>
</form>

<?php include Config::DOSSIER_VIEWS . '/parties/pied_de_page.php'; ?>