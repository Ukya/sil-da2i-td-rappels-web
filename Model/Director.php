<?php

class Director extends Person
{
	public function getAllDirectors()
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

		return $request;
	}
}