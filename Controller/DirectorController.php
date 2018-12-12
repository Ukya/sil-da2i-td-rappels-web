<?php

require_once('Model/Person.php');
require_once('Model/Director.php');

class DirectorController
{

    public function DisplayDirector($idPerson)
    {
        $director = new Person(); 
        $director_info = $director->getBaseInfos($idPerson); 
        $filmo = $director->getFilmographie($idPerson);

        include('View/DirectorView.php');
    }

}