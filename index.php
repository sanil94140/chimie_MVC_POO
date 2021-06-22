<?php

session_start();

require __DIR__ . '/vendor/Config.php';
// permet d'avoir accès aux fonctions du fichier config.php
require Config::DOSSIER_MODELS . '/Model.php';
require Config::DOSSIER_MODELS.'/MoleculeModel.php';
require Config::DOSSIER_MODELS.'/SessionModel.php';
// require Config::DOSSIER_MODELS.'/.php';
require Config::DOSSIER_CONTROLLERS . '/MoleculeController.php';
require Config::DOSSIER_CONTROLLERS . '/SessionController.php';
// require Config::DOSSIER_CONTROLLERS . '/.php';

// require Config::DOSSIER_MODELS . '/EmpruntModel.php';
// require Config::DOSSIER_MODELS . '/LivreModel.php';
// require Config::DOSSIER_CONTROLLERS . '/EmpruntController.php';
// require Config::DOSSIER_CONTROLLERS . '/LivreController.php';


require __DIR__ . '/vendor/Router.php';

require __DIR__ . '/vendor/functions.php';


$router = new Router;
$router->meneMoiAuBonController();
