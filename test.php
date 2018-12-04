<?php

try
{
	$bd = new PDO('mysql:host=localhost;dbname=film_bd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$reponse = $bd->query('SELECT * FROM movie');
$movies = [];
while ($movie = $reponse->fetch())
{
    $movies[] = $movie;
}

foreach ($movies as $movie) 
{
    echo $movie['title'];
}

?>