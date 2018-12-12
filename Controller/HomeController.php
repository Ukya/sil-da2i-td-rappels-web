<?php

require_once('Model/Person.php');
require_once('Model/Actor.php');
require_once('Model/Director.php');
require_once('Model/Movie.php');

class HomeController
{

    public function DisplayHome()
    {
        $movie = new Movie(); 
        $movies = $movie->getAllMovies(); 

        $director = new Director(); 
        $directors = $director->getAllDirectors(); 

        $actor = new Actor(); 
        $actors = $actor->getAllActors(); 

        require('View/HomeView.php');
    }

}

