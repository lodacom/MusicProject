<div id="banniere_top">
	<div id="recherche">
	RECHERCHE
	</div>
	<div id="Conteneur_Formulaire_Connexion">
		<div id="Formulaire_Connexion">
		<form method="post" action="../../Controllers/connexion_utilisateur.php">
			<fieldset class="fieldset1">
				<legend> Connexion </legend>
				<label for="pseudo"> Pseudo : </label>
				<input type="text" name="pseudo" id="pseudo"/>
				<label for="pass"> Mot de passe : </label>
				<input type="password" name="pass" id="pass"/>
				<input id="envoi" name="submit" type="submit" value="Envoyez" onclick="closeForm()"/>
				<span id="message_connexion">Connexion...</span>
			</fieldset>
		</form>
		<form method="post" action="../../Controllers/inscription_utilisateur.php">
			<fieldset class="fieldset2">
			<legend> Inscription </legend>
			<label for="nom"> Nom : </label>
			<input type="text" name="nom" id="nom"/>
			<label for="prenom"> Prénom : </label>
			<input type="text" name="prenom" id="prenom"/>
			<label for="pseudo"> Pseudo : </label>
			<input type="text" name="pseudo" id="pseudo"/>*
			<label for="pass"> Mot de passe : </label>
			<input type="password" name="pass" id="pass"/>*
			<label for="check_pass"> Confirmez votre mot de passe : </label>
			<input type="password" name="check_pass" id="check_pass"/>*
			<input type="submit" type="submit" value="Envoyez" onclick="closeForm2()"/>
			<span id="message_inscription"> Inscription...</span>
		</fieldset>
		</form>
		</div>
		<div id="Connexion"><span class="connexion"> Connexion | Inscription </span></div>
	</div>
</div>
