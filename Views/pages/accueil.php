﻿<?php
	session_start();
?>
<html>
<head> 
	<script src="../../Library/jquery.js" type="text/javascript"></script>
	<script src="../include/slide_up_down.js" type="text/javascript"></script>
	<link rel="stylesheet" href="../style/style_accueil.css"/>
	<title> Accueil </title> 
</head>
<body>
<?php 
include_once "../include/banniere_menu.php"; 
?>
<div id="conteneur">
	<div id="menu_gauche">
	<span class="menu">Accueil</span>
	<span class="menu">Artistes</span>
	<span class="menu">Albums</span>
	<span class="menu">Musiques</span>
	<span class="menu">Mon Panier</span>
	<span class="menu">Playlists</span>
	<span class="menu">Coup de coeur</span>
	</div>
	<div id="player">
	<!-- TEST INTEGRATION PLAYER -->
		<object id="player_mp3" type="application/x-shockwave-flash" data="playerMP3playlist.swf">
		<param name="quality" value="high" />
		<param name="movie" value="playerMP3playlist.swf" />
		<param name="flashvars" value="barre_chargement=126547&navigation=584796&texte_color=ffffff&bouton=000000&lien_xml=xml/play.xml" />
		<param name="wmode" value="transparent" />
		</object>
	<!-- FIN TEST -->
	</div>
	<div id="classement">
		<div id="top_albums">
		TOP ALBUMS
		<p>
		<?php
		include ('../../Models/top_album.php');
		$top_album=new Top_Album();
		$top_album->top_album();
		echo "<table>";
		for ($i=0;$i<count($top_album->tableau_top_album);$i++)
		{
			echo "<tr>
				<td>".$top_album->tableau_top_album[$i]."</td>
			</tr>";
		}
		echo "</table>";
		?>
		</p>
		</div>
		<div id="top_artistes">
		TOP ARTISTES
		<p>
		<?php
		include ('../../Models/top_artiste.php');
		$top_artiste=new Top_Artiste();
		$top_artiste->top_artiste();
		echo "<table>";
		for ($i=0;$i<count($top_artiste->tableau_top_artiste);$i++)
		{
			echo "<tr>
				<td>".$top_artiste->tableau_top_artiste[$i]."</td>
			</tr>";
		}
		echo "</table>";
		?>
		</div>
		<div id="top_titres">
		TOP TITRES
		<p>
		<?php
		include ('../../Models/top_musique.php');
		$top_musique=new Top_Musique();
		$top_musique->top_musique();
		echo "<table>";
		for ($i=0;$i<count($top_musique->tableau_top_musique);$i++)
		{
			echo "<tr>
				<td>".$top_musique->tableau_top_musique[$i]."</td>
			</tr>";
		}
		echo "</table>";
		?>
		</p>
		</div>
	</div>
	<?php include_once "../include/footer.php" ?>
</div>
</body>
</html>