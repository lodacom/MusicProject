<?php
include ('../Models/connexion_base.php');
class Supp_Panier
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
	
	function suppression_musique()
	{
		$requete=("DELETE FROM Panier
		WHERE pseudo='$this->util_pres'
		AND num_musique=$this->num_musique");
		
		$resultat=mysql_query($requete,$this->connexion->link);
		if (!$resultat)
		{
			echo("Oups erreur de suppression!\n");
		}
		else
		{
			header("../Models/panier.php");
		}
	}
}
$supp_panier=new Supp_Panier();
$supp_panier->suppression_musique();
?>