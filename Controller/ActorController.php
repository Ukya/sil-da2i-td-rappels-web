<?php

require_once('Model/Person.php');
require_once('Model/Actor.php');

class ActorController
{

    public function DisplayActor($idPerson)
    {
        $actor = new Person(); 
        $actor_info = $actor->getBaseInfos($idPerson); 

        include('View/ActorView.php');
    }

}