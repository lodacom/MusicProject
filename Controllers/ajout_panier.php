<?php
include ('../Models/connexion_base.php');
class Ajout_Panier
{
	private $connexion=null;
	private $num_musique=null;
	
	function __construct()
	{
		$this->connexion=new Connexion_Base();
		$this->num_musique=$_POST['num_musique'];
	}
	
	function ajout_panier()
	{
		session_start();
		if (isset($_SESSION['pseudo'])
		{
			$util_pres=$_SESSION['pseudo'];
			$requete=("INSERT INTO Panier
			(pseudo,num_musique) 
			VALUES ('$util_pres',$this->num_musique)");
		
			$resultat=mysql_query($requete,$this->connexion->link);
			if (!$resultat)
			{
				echo("Oups erreur d'insertion!\n");
			}
			else
			{
				header("../Models/panier.php");
			}
		}
		else
		{
			echo("Veuillez vous connecter, nous ne pouvons ajouter
			vos musiques à votre panier\n");
		}
	}
}
$ajout_panier=new Ajout_Panier();
$ajout_panier->ajout_musique();
?>