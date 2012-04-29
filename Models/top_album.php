<?php
include ('connexion_base.php');
class Top_Album
{
	private $connexion=null;
	public $tableau_top_album=null;
	
	function __construct()
	{
		$this->connexion=new Connexion_Base();
		$this->tableau_top_album=array();
	}
	
	function top_album()
	{
		$requete="SELECT nom 
		FROM Top_Album";
	
		$resultat=mysql_query($requete,$this->connexion->link);
		for ($i=0;$i<mysql_num_rows($resultat);$i++)
		{
			$nom=mysql_result($resultat,$i,'nom');
			array_push($this->tableau_top_album,
			$nom);
		}
	}
}
?>