<script type="text/javascript">
window.onload = function()
	{
		initAutoComplete(document.getElementById('form-rech'),
		document.getElementById('recherche_tout'),document.getElementById('bouton-submit'))
	};
</script>
<div id="banniere_top">
	<div id="recherche">
	<form id="form-rech" method="post" ><!--action="../../Models/recherche.php"-->
	<label>RECHERCHE:</label>
	<input type="text" name="recherche" id="recherche_tout"/>
	<input type="submit" id="bouton-submit"/>
	</form>
	</div>
	<?php
		if (!empty($_SESSION['pseudo']))
		{
			include ('banniere_deconnexion.html');
			//echo $_SESSION['pseudo'];
		}
		else
		{
			include ('banniere_connexion.html');
		}
	?>
</div>