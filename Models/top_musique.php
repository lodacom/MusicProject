<?php
class Top_Musique
{
	public $tableau_top_musique=null;
	
	function __construct()
	{
		$this->tableau_top_musique=array();
	}
	
	function top_musique()
	{
		$requete="SELECT titre 
		FROM Top_Musique";
	
		$resultat=mysql_query($requete);
		for ($i=0;$i<mysql_num_rows($resultat);$i++)
		{
			array_push($this->tableau_top_musique,
			mysql_result($resultat,$i,'titre'));
		}
	}
}
?>