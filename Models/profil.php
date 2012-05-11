<?php
include ('interface_util.php');

class Profil extends Interface_Util
{
	function __construct()
	{
		parent::__construct();
	}
	
	function affichage_profil()
	{
		session_start();
		if (isset($_SESSION['pseudo'])
		{
			$util_pres=$_SESSION['pseudo'];
			$requete="SELECT pseudo,nom,prenom,mot_passe
				FROM Utilisateur";
			$resultat=mysql_query($requete,parent::connexion->link);
			
			parent::profil($resultat);
			
			/*$_SESSION['pseudo']
			parent::nom
			parent::prenom
			parent::mot_passe*/
		}
		else
		{
			echo ("Vous n'etes pas connecte, nous ne pouvons donc afficher votre profil\n");
		}
	}
}
?>