<?php

class Person
{
	function getBaseInfos($idPerson)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=film_bd;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		$request = $db->prepare('SELECT * FROM moviehasperson JOIN person ON moviehasperson.idPerson = person.id JOIN personhaspicture ON person.id = personhaspicture.idPerson JOIN picture ON personhaspicture.idPicture = picture.id WHERE person.id = ?');
        $req->execute(array($idPerson));
        $person = $req->fetch();

        return $person;
	}
}

class Director extends Person
{
	function getAllDirectors()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=film_bd;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		$request = $db->query('SELECT * FROM moviehasperson WHERE role="director"');
		$movies = [];
		while ($director = $request->fetch())
		{
		    $directors[] = $director;
		}

		return $directors;
	}
}

class Actor extends Person
{
	function getAllActors()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=film_bd;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		$request = $db->query('SELECT * FROM moviehasperson WHERE role="actor"');
		$movies = [];
		while ($actor = $request->fetch())
		{
		    $actors[] = $actor;
		}

		return $actors;
	}
}

class Movie
{
	function getAllMovies()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=film_bd;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		$request = $db->query('SELECT * FROM movie');
		$movies = [];
		while ($movie = $request->fetch())
		{
		    $movies[] = $movie;
		}

		return $movies;
	}

	function getBaseInfos($idMovie)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=film_bd;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		$request = $db->prepare('SELECT * FROM moviehasperson JOIN movie ON moviehasperson.idMovie = movie.id JOIN moviehaspicture ON movie.id = moviehaspicture.idMovie JOIN picture ON moviehaspicture.idPicture = picture.id WHERE movie.id = ?');
        $req->execute(array($idMovie));
        $movie = $req->fetch();

        return $movie;
	}
}

/*foreach ($movies as $movie) 
{
    echo $movie['title'];
}*/

?>