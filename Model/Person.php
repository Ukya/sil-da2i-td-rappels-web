<?php

class Person
{
	public function getBaseInfos($idPerson)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=movie_db;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		$request = $db->prepare('SELECT * FROM moviehasperson JOIN person ON moviehasperson.idPerson = person.id JOIN personhaspicture ON person.id = personhaspicture.idPerson JOIN picture ON personhaspicture.idPicture = picture.id WHERE person.id = ?');
        $request->execute(array($idPerson));
        $person = $request->fetch();

        return $person;
	}

	public function getFilmographie($idPerson)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=movie_db;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		$request = $db->prepare('SELECT * FROM movie JOIN moviehasperson on movie.id = moviehasperson.idMovie JOIN person ON moviehasperson.idPerson = person.id WHERE person.id = ?');
        $request->execute(array($idPerson));
        $person = $request->fetch();

        return $person;
	}
}