<?php

require_once('Model/Person.php');
require_once('Model/Actor.php');
require_once('Model/Director.php');
require_once('Model/Movie.php');

class HomeController
{

    public function listMovies()
    {
        $movie = new Movie(); // Création d'un objet
        $movies = $movie->getAllMovies(); // Appel d'une fonction de cet objet

        require('View/HomeView.php');
    }

    public function listDirectors()
    {
        $director = new Director(); // Création d'un objet
        $directors = $director->getAllDirectors(); // Appel d'une fonction de cet objet

        require('View/HomeView.php');
    }

    public function listActors()
    {
        $actor = new Actor(); // Création d'un objet
        $actors = $actor->getAllActors(); // Appel d'une fonction de cet objet

        require('View/HomeView.php');
    }

}

