<?php
	class connect_db
	{
		private static $host = 'localhost';
		private static $db_name = 'tfe';
		private static $user = 'root';
		private static $password = '';

		public static function connexion()
		{
		 	$pdo = new PDO('mysql:host='.self::$host.';dbname='.self::$db_name."; charset=utf8", self::$user, self::$password);
		 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 	return $pdo;
		}
	}
 
