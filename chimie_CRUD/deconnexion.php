<?php

session_start();

session_destroy();

require __DIR__ . '/functions.php';
rediriger('molecules.php');
