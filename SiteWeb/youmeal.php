<!DOCTYPE html>
<html lang="fr-FR">
    <head>  
        <title>DevOn - Projet YouMeal</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/youmeal.css" />
    </head>
    <body>

        <?php include('header.html');?>

            <img id="logo" src="images\logo_youmeal.png" alt="Logo YouMeal"/>

        <p class="centre police_cano">YouMeal est un projet universitaire visant à créer une application de live de cuisine entre particuliers.</p>
        <p class="centre police_cano">Organiser des diffusions en direct avec d'autres utilisateurs afin de cuisiner le même plat tous ensembles en visio !</p>
        
        <img id="presentation"src="images\presentation.png" alt="Présentation de l'appli"/>

        <div class="bouton">
        <form action="https://youmeal.000webhostapp.com/">
            <button type="submit" id="bouton" class="police_cano">Accès à l'application !</button>
        </form>
            
        </div> 
        
        <?php include('footer.html');?>
    </body>
</html>