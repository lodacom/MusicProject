<?php
include ('../Models/connexion_base.php');
class Panier
{
	private $connexion=null;
	public $tab_num_titre=null;
	public $tab_titre=null;
	public $tab_album=null;
	public $tab_duree=null;
	public $tab_groupe=null;
	
	function __construct()
	{
		$this->connexion=new Connexion_Base();
		$this->tab_num_musique=array();//sera en hidden pour pouvoir supprimer
		$this->tab_titre=array();
		$this->tab_album=array();
		$this->tab_duree=array();
		$this->tab_groupe=array();
	}
	
	function affichage_panier()
	{
		session_start();
		if (isset($_SESSION['pseudo'])
		{
			$util_pres=$_SESSION['pseudo'];
			$requete="SELECT M.num_musique,M.titre,A.nom,M.duree,G.nom_groupe
			FROM Panier P, Musique M, Album A
			WHERE pseudo='$util_pres'
			AND P.num_musique=M.num_musique
			AND M.num_album=A.num_album
			AND A.nom_groupe=G.nom_grouper";
	
			$resultat=mysql_query($requete,$this->connexion->link);
			
			if(!$resultat)
			{
				echo ("Vous n'avez rien mis dans votre panier\n");
			}
			else
			{
				for ($i=0;$i<mysql_num_rows($resultat);$i++)
				{
					array_push($this->tab_num_musique,
					mysql_result($resultat,$i,'M.num_musique'));
					
					array_push($this->tab_titre,
					mysql_result($resultat,$i,'M.titre'));
					
					array_push($this->tab_album,
					mysql_result($resultat,$i,'A.nom'));
					
					array_push($this->tab_duree,
					mysql_result($resultat,$i,'M.duree');
					
					array_push($this->tab_groupe,
					mysql_result($resultat,$i,'G.nom_groupe');
				}
			}
		}
		else
		{
			echo ("Vous n'etes pas connecte, nous ne pouvons donc afficher votre panier\n");
		}
	}
}
?>