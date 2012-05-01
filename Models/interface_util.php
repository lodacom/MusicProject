<?php
include ('connexion_base.php');
class Interface_Util
{
	public $connexion=null;
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
	
	function interface_commune($p_resultat)
	{
		if(!$p_resultat)
			{
				echo ("Vous n'avez rien mis dans votre panier\n");
			}
			else
			{
				for ($i=0;$i<mysql_num_rows($p_resultat);$i++)
				{
					array_push($this->tab_num_musique,
					mysql_result($p_resultat,$i,'M.num_musique'));
					
					array_push($this->tab_titre,
					mysql_result($p_resultat,$i,'M.titre'));
					
					array_push($this->tab_album,
					mysql_result($p_resultat,$i,'A.nom'));
					
					array_push($this->tab_duree,
					mysql_result($p_resultat,$i,'M.duree');
					
					array_push($this->tab_groupe,
					mysql_result($p_resultat,$i,'G.nom_groupe');
				}
			}
	}
}
?>