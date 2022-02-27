<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=connect;charset=utf8', 'root', '');
	}catch(Execption $e)
	{
		die('Erreur'.$e->getMessage());
	}