<?php
require_once('Controller/HomeController.php');
$controller = new HomeController(); // Création d'un objet
$controller->listMovies(); // Appel d'une fonction de cet objet
$controller->listDirectors();
$controller->listActors();