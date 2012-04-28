<?php
class Connexion_Base
{
	public $link=null;
	public $db_selected=null;
	
	function __construct()
	{
		$this->link=mysql_connect("localhost","lolo","webproject");
		if (!$this->link)
		{
			echo ("Erreur connection base de donnees!!\n");
		}
		else
		{
			echo("Connection..\n");
		}
		$this->db_selected=mysql_select_db("ProjetWeb",$this->link);
		if (!$this->db_selected)
		{
			("Impossible de selectionner la BD!!\n");
		}
		else
		{
			echo ("Selection...\n");
		}
	}

	function __destruct()
	{
		mysql_close($this->link);
	}
}
?>