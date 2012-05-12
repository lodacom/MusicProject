<?php
include ('connexion_base.php');
class Recherche
{
	private $connexion=null;
	public $proposition=null;
	public $debut=null;
	
	function __construct()
	{
		$this->connexion=new Connexion_Base();
		$this->propositions=array();
	}
	
	function recherche()
	{
		$requete1=("
		SELECT M.titre,A.nom,G.nom_groupe
		FROM Musique M,Album A,Groupe G");
		
		$resultat1=mysql_query($requete1,$this->connexion->link);
		for ($i=0;$i<mysql_num_rows($resultat1);$i++)
		{
			array_push($this->propositions,
			mysql_result($resultat1,$i,'M.titre'));
			
			array_push($this->propositions,
			mysql_result($resultat1,$i,'A.nom'));
			
			array_push($this->propositions,
			mysql_result($resultat1,$i,'G.nom_groupe'));
		}
		asort($this->propositions);
	}
	
	function generation_xml()
	{
		header('Content-Type: text/xml;charset=utf-8');
		echo(utf8_encode("<?xml version='1.0' encoding='UTF-8' ?><options>"));
		if (isset($_GET['debut'])) 
		{
			$this->debut=utf8_decode($_GET['debut']);
		} 
		else 
		{
			$this->debut="";
		}
		//$this->debut=strtolower($this->debut);
	}
	
	function generate_options($p_debut,$p_proposition) 
	{
		$this->generation_xml();
		$i = 0;
		$MAX_RETURN =10;
		foreach ($p_proposition as $element) 
		{
			if ($i<$MAX_RETURN && substr($element, 0, strlen($p_debut))==$p_debut)
			{
				echo(utf8_encode("<option>".$element."</option>"));
				$i++;
			}
		}
		echo("</options>");
	}
}
$generationXML=new Recherche();
$generationXML->recherche();
$generationXML->generate_options($generationXML->debut,$generationXML->propositions);
?>