<html>
<head> 
<script src="../../Library/jquery.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $("#Connexion").click(function(){
                    if ($("#Formulaire_Connexion").is(":hidden")){
                        $("#Formulaire_Connexion").slideDown("slow");
						$("#Formulaire_Connexion").css({zIndex: 1000});
                    }
                    else{
                        $("#Formulaire_Connexion").slideUp("slow");
                    }
                });
                
            });
            
            function closeForm(){
                $("#message_connexion").show("slow");
                setTimeout('$("#message_connexion").hide();$("#contactForm").slideUp("slow")', 2000);
				setTimeout('$("#Formulaire_Connexion").slideUp("slow")',1000);

           }
		   function closeForm2(){
                $("#message_inscription").show("slow");
                setTimeout('$("#message_inscription").hide();$("#contactForm").slideUp("slow")', 2000);
				setTimeout('$("#Formulaire_Connexion").slideUp("slow")',1000);
           }
        </script>
	<link rel="stylesheet" href="../style/style_accueil.css"/>
	<title> Accueil </title> 
</head>
<body>
<?php include_once "../include/banniere_menu.php" ?>
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
		</div>
		<div id="top_artistes">
		TOP ARTISTES 
		</div>
		<div id="top_titres">
		TOP TITRES
		</div>
	</div>
	<?php include_once "../include/footer.php" ?>
</div>
</body>
</html>