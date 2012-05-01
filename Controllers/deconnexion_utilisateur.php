<?php
class Deconnexion_Utilisateur
{
	function __construct()
	{
		unset($_SESSION['pseudo']);
		session_destroy();
		header("location: ../index.php");
	}
}
$disconnect=new Deconnexion_Utilisateur();
?>