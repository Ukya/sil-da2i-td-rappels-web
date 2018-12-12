<?php

class Movie
{
	public function getAllMovies()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=movie_db;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		$request = $db->query('SELECT * FROM movie');

		return $request;
	}

	public function getBaseInfos($idMovie)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=movie_db;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		$request = $db->prepare('SELECT * FROM person JOIN moviehasperson ON person.id = moviehasperson.idPerson JOIN movie ON moviehasperson.idMovie = movie.id JOIN moviehaspicture ON movie.id = moviehaspicture.idMovie JOIN picture ON moviehaspicture.idPicture = picture.id WHERE movie.id = ?');
        $request->execute(array($idMovie));
        $movie = $request->fetch();

        return $movie;
	}

	public function getMovieActors($idMovie)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=movie_db;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		
		$request = $db->prepare('SELECT * FROM moviehasperson JOIN person ON moviehasperson.idPerson = person.id WHERE movie.id = ?');
		$request->execute(array($idMovie));
        $movie_actors = $request->fetch();

		return $request;
	}
}