<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=film_bd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$request = $db->query('SELECT * FROM movie');
/*$movies = [];
while ($movie = $request->fetch())
{
    $movies[] = $movie;
}*/



while ($donnees = $request->fetch())
{
echo $donnees['title'];
}
$request->closeCursor();
 

/*foreach ($movies as $movie) 
{
    echo $movie['title'];
}*/

?>