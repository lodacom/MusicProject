<?php
include ('../Models/connexion_base.php');
class Ajout_Coup_Coeur
{
	private $connexion=null;
	private $num_musique=null;
	
	function __construct()
	{
		$this->connexion=new Connexion_Base();
		$this->num_musique=$_POST['num_musique'];
	}
	
	function ajout_coup_coeur()
	{
		session_start();
		if (isset($_SESSION['pseudo'])
		{
			$util_pres=$_SESSION['pseudo'];
			$requete=("INSERT INTO Coup_Coeur_Musique
			(pseudo,num_musique) 
			VALUES ('$util_pres',$this->num_musique)");
		
			$resultat=mysql_query($requete,$this->connexion->link);
			if (!$resultat)
			{
				echo("Oups erreur d'insertion!\n");
			}
			else
			{
				header("../Models/coup_coeur_musique.php");
			}
		}
		else
		{
			echo("Veuillez vous connecter, nous ne pouvons ajouter
			vos musiques à votre panier\n");
		}
	}
}
$ajout_coup_coeur=new Ajout_Coup_Coeur();
$ajout_coup_coeur->ajout_coup_coeur();
?>