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