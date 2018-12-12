<?php

require_once('Model/Person.php');
require_once('Model/Actor.php');
require_once('Model/Director.php');
require_once('Model/Movie.php');

class MovieController
{

    public function DisplayMovie($idMovie)
    {
        $movie = new Movie(); 
        $movie_info = $movie->getBaseInfos($idMovie); 

        $director = new Director(); 
        $directors = $director->getAllDirectors(); 

        $actor = new Actor(); 
        $actors = $actor->getAllActors(); 

        include('View/MovieView.php');
    }

}