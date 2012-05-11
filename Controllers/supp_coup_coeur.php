<?php
include ('../Models/connexion_base.php');
class Supp_Coup_Coeur
{
	private $connexion=null;
	private $num_musique=null;
	private $util_pres=null;
	
	function __construct()
	{
		$this->connexion=new Connexion_Base();
		$this->util_pres=$_SESSION['pseudo'];
		$this->num_musique=$_POST['num_musique'];
	}
	
	function suppression_coup_coeur_musique()
	{
		$requete=("DELETE FROM Coup_Coeur_Musique
		WHERE pseudo='$this->util_pres'
		AND num_musique=$this->num_musique");
		
		$resultat=mysql_query($requete,$this->connexion->link);
		if (!$resultat)
		{
			echo("Oups erreur de suppression!\n");
		}
		else
		{
			header("../Models/coup_coeur_musique.php");
		}
	}
}
$supp_coup_coeur=new Supp_Coup_Coeur();
$supp_coup_coeur->suppression_coup_coeur_musique();
?>