$(document).ready(function()
{
	$("#Connexion").click(function()
	{
        if ($("#Formulaire_Connexion").is(":hidden"))
		{
            $("#Formulaire_Connexion").slideDown("slow");
			$("#Formulaire_Connexion").css({zIndex: 1000});
		}
        else
		{
			$("#Formulaire_Connexion").slideUp("slow");
        }
    });
});
            
function closeForm()
{
    $("#message_connexion").show("slow");
    setTimeout('$("#message_connexion").hide();$("#contactForm").slideUp("slow")', 2000);
	setTimeout('$("#Formulaire_Connexion").slideUp("slow")',1000);
}

function closeForm2()
{
    $("#message_inscription").show("slow");
    setTimeout('$("#message_inscription").hide();$("#contactForm").slideUp("slow")', 2000);
	setTimeout('$("#Formulaire_Connexion").slideUp("slow")',1000);
}