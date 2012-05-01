<?php
include_once "../Models/connexion_base.php";
class Inscription_Utilisateur
{
	private $nom=null;
	private $prenom=null;
	private $pseudo=null;
	private $mot_passe=null;
	private $mot_passe_verif=null;
	private $connexion=null;

	function __construct()
	{
		$this->nom=$_POST['nom'];
		$this->prenom=$_POST['prenom'];
		$this->pseudo=$_POST['pseudo'];
		$this->mot_passe=$_POST['pass'];
		$this->mot_passe_verif=$_POST['check_pass'];
		$this->connexion=new Connexion_Base();
	}

	function verification_pseudo()
	{
		/*Vérifie si le pseudo existe déjà dans la BD.
		Renvoie vrai si c'est le cas. Faux sinon.*/
		$requete="SELECT pseudo
		FROM Utilisateur
		WHERE pseudo=$this->pseudo";

		$resultat=mysql_query($requete,$this->connexion->link);
		//renvoie faux si rien trouvé
		if ($resultat)
		{
			echo("Au moins un pseudo trouve\n");
			return true;
		}
		else
		{
			echo ("Aucun pseudo trouve\n");
			return false;
		}
	}

	function verification_passe()
	{
		if ($this->mot_passe==$this->mot_passe_verif)
		{
			echo ("Les de mots passes sont les memes\n");
			return true;
		}
		else
		{
			echo("Oups pb de mot de passe\n");
			return false;
		}
	}

	function inscription()
	{
		if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['check_pass']))
		{
			if (!$this->verification_pseudo() && $this->verification_passe())
			{
				$requete_insert="INSERT INTO Utilisateur
				(pseudo,nom,prenom,mot_passe) 
				VALUES ('$this->pseudo','$this->nom',
					'$this->prenom','$this->mot_passe'
					)";
				$insert=mysql_query($requete_insert,$this->connexion->link);
				if (!$insert)
				{
					echo("Oups pb d'insertion\n");
				}
				else
				{
				
				}
			}
		}
		else
		{
			echo ("Vous n'avez pas remplis les champs avec une étoile\n");
			/*boite de dialogue js rappel de remplissage*/
		}
	}
}
$inscription=new Inscription_Utilisateur();
$inscription->inscription();
header("location: ../index.php");
?>