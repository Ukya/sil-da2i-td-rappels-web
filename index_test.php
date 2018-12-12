<?php
require_once('Controller/HomeController.php');
require_once('Controller/MovieController.php');
require_once('Controller/DirectorController.php');
require_once('Controller/ActorController.php');

if (isset($_GET['page'])) 
{
    if ($_GET['page'] == 'movie') 
    {
        $movie = new MovieController();
		$movie->DisplayMovie($_GET['id']);
    }
    elseif ($_GET['page'] == 'director' || $_GET['page'] == 'actor') 
    {
    	$director = new DirectorController();
		$director->DisplayDirector($_GET['id']);
    }
    elseif ($_GET['page'] == 'actor') 
    {
    	$actor = new ActorController();
		$actor->DisplayActor($_GET['id']);
    }
}
else 
{
    $home = new HomeController();
	$home->DisplayHome();
}