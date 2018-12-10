<?php

class Actor extends Person
{
	public function getAllActors()
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

		return $request;
	}
}