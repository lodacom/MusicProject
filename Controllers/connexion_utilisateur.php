<?php
include ('../Models/connexion_base.php');
class Connexion_Utilisateur
{
	private $pseudo=null;
	private $mot_passe=null;
	private $connexion=null;
	
function __construct()
{
	$this->pseudo=$_POST['pseudo'];
	$this->mot_passe=$_POST['pass'];
	$this->connexion=new Connexion_Base();
}

function __destruct()
{
	session_unset();
	session_destroy();
}

function verification_connexion()
{
	$requete="SELECT pseudo,mot_passe 
	FROM Utilisateur 
	WHERE pseudo='$this->pseudo'
	AND mot_passe='$this->mot_passe'";
	
	$resultat=mysql_query($requete,$this->connexion->link);
	
	if (mysql_num_rows($resultat)==1)
	{
		session_start();
		if (isset($_SESSION['pseudo']))
		{
			echo ("Vous etes deja connecte\n");
			//boite de dialogue js déjà connecté
		}
		else
		{
			$_SESSION['pseudo']=$this->pseudo;
		}
		
	}
	else
	{
		echo ("Erreur de mot de passe ou de login\n");
		/*boite de dialogue js erreur mot de passe, login
		*Propose de s'inscrire...
		*/
	}
}
}
$connexion=new Connexion_Utilisateur();
$connexion->verification_connexion();
header("location: ../index.php");
?>