<?php
include ('interface_util.php');

class Coup_Coeur_Musique extends Interface_Util
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function affichage_coup_coeur_musique
	{
		session_start();
		if (isset($_SESSION['pseudo'])
		{
			$util_pres=$_SESSION['pseudo'];
			$requete="SELECT M.num_musique,M.titre,A.nom,M.duree,G.nom_groupe
			FROM Coup_Coeur_Musique C, Musique M, Album A
			WHERE pseudo='$util_pres'
			AND C.num_musique=M.num_musique
			AND M.num_album=A.num_album
			AND A.nom_groupe=G.nom_grouper";
	
			$resultat=mysql_query($requete,parent::connexion->link);
			
			parent::interface_commune($resultat);
		}
		else
		{
			echo ("Vous n'etes pas connecte, nous ne pouvons donc afficher votre panier\n");
		}
	}
}
?>