<?php

require_once('C:\wamp64\www\sil-da2i-td-rappels-web\config.php');

class DB
{
	public function connect()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=$DB_name;charset=utf8', '$DB_user', '$DB_password');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
	}

}