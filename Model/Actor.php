<?php

class Actor extends Person
{
	public function getAllActors()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=movie_db;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		
		$request = $db->query('SELECT * FROM moviehasperson JOIN person ON moviehasperson.idPerson = person.id JOIN personhaspicture ON person.id = personhaspicture.idPerson JOIN picture ON personhaspicture.idPicture = picture.id WHERE role="actor"');

		return $request;
	}
}