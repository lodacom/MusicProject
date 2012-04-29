<?php
class Top_Artiste
{
	public $tableau_top_artiste=null;
	
	function __construct()
	{
		$this->tableau_top_artiste=array();
	}
	
	function top_artiste()
	{
		$requete="SELECT nom_groupe
		FROM Top_Artiste";
	
		$resultat=mysql_query($requete);
		for ($i=0;$i<mysql_num_rows($resultat);$i++)
		{
			array_push($this->tableau_top_artiste,
			mysql_result($resultat,$i,'nom_groupe'));
		}
	}
}
?>