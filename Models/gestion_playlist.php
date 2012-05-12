<?php
class Gestion_Playlist_Util
{
/*Plusieurs cas se présentent:
-1/L'utilisateur viens de s'enregistrer: il faut créer un répertoire vide à son nom dans le répertoire Playlist
-L'utilisateur est déjà enregistré:
	-2/Il veut créer une nouvelle playlist: il faut créer un nouveau fichier xml avec le titre de celle-ci
	-3/Il veut ajouter une musique dans une playlist
	-4/Il veut supprimer une musique dans une playlist
	-5/Il veut supprimer une playlist
-6/L'utilisateur se supprime*/
	
	function creation_repertoire($p_pseudo)
	{
		/*On est dans le cas 1: Ici on va créer un répertoire du nom(pseudo) 
		de l'utilisateur qui vient de s'enregistrer*/
		$creation_rep=mkdir("../Playlist/$p_pseudo", 0777);
		if ($creation_rep)
		{
			echo "Creation du repertoire $p_pseudo reussi\n";
		}
		else
		{
			echo "Erreur de creation du repertoire\n";
		}
	}
	
	function supp_repertoire($p_pseudo)
	{
		/*On est dans le cas 6: Ici on va supprimer un répertoire entier car l'utilisateur vient de se supprimer*/
		/*$result=shell_exec("C:\cygwin\bin\rmdir.exe ../Playlist/$p_pseudo");
		print_r($result);*/
		$tmp_path=("../Playlist/$p_pseudo");
		$handle = opendir($tmp_path); 
		while($tmp=readdir($handle))
		{
			if($tmp!='..' && $tmp!='.' && $tmp!='')
			{
				if(is_writeable($tmp_path."/".$tmp) && is_file($tmp_path."/".$tmp))
				{
					unlink($tmp_path."/".$tmp);
				}
				elseif(!is_writeable($tmp_path."/".$tmp) && is_file($tmp_path."/".$tmp))
				{
					chmod($tmp_path."/".$tmp,0777);
					unlink($tmp_path."/".$tmp);
				} 
			}
		}
		closedir($handle);
		$supp_repertoire=rmdir($tmp_path);
		if ($supp_repertoire)
		{
			echo "Suppression du repertoire $tmp_path reussi\n";
		}
		else
		{
			echo "Erreur de suppression de repertoire\n";
		}
	}
	

	function creation_playlist($p_pseudo,$p_titre)
	{
		/*On est dans le cas 2: Ici on va créer une nouvelle playlist avec le titre donné par l'utilisateur
		dans le dossier de l'utilisateur*/
		$file = fopen("..\\Playlist\\$p_pseudo\\$p_titre.xml", "c+");
		chmod("..\\Playlist\\$p_pseudo\\$p_titre.xml",0777);
		$somecontent = "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n
		<play>\n
		</play>\n";

		// Assurons nous que le fichier est accessible en écriture
		if (is_writable($file)) 
		{

			// Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
			// Le pointeur de fichier est placé à la fin du fichier
			// c'est là que $somecontent sera placé
			if (!$file) 
			{
				echo "Impossible d'ouvrir le fichier ($file)";
				$taille_fichier=filesize ($file);
				ftruncate($file,$taille_fichier);//on refait totalement le fichier
				$this->creation_playlist($p_pseudo,$p_titre);
				exit;
			}

			// Ecrivons quelque chose dans notre fichier.
			if (fwrite($file, $somecontent) === FALSE) 
			{
				echo "Impossible d'écrire dans le fichier ($file)";
				exit;
			}

		echo "L'écriture de ($somecontent) dans le fichier ($file) a réussi";

		fclose($handle);

		}
		else 
		{
			echo "Le fichier $file n'est pas accessible en écriture.";
		}	
	}
	
	function supp_playlist($p_pseudo,$p_titre)
	{
		$supp_playlist=unlink("..\\Playlist\\$p_pseudo\\$p_titre.xml");
		if ($supp_playlist)
		{
			echo "Suppression de la playlist reussi\n";
		}
		else
		{
			echo "Erreur de suppression de la playlist\n";
		}
	}
	
	function ajout_dans_playlist()
	{
	
	}
	
	function supp_dans_playlist()
	{
	
	}
	
}
$gestion_playlist=new Gestion_Playlist_Util();
$gestion_playlist->supp_playlist("lolo","essai");
?>