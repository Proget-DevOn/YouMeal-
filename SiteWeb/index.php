<?php include('header.html');?>

<!DOCTYPE html>
<html lang="fr-FR">
    <head>  
        <title>Devon</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container police_cano">
            <h1 id="h1">Bienvenue chez Devon !</h1>
            <button onclick="scrollWin()" id="scroll">NOUS CONNAÎTRE</button>
            <h2 id="scrolldown">Notre expertise</h2>
            
            <div id="images">
                <div class="image">
                    <img id="image1" src="images/codage-web.png">
                    <div>Développement web</div>
                </div>
                <div class="image">
                    <img id="image2" src="images/appel.png">
                    <div>Développement d'applications</div>
                </div>
                <div class="image">
                    <img id="image3" src="images/moniteur.png">
                    <div>Hébergement web</div>
                </div>
                <div class="image">
                    <img id="image4" src="images/mot-de-passe.png">
                    <div>Sécurité informatique</div>
                </div>
                <div class="image">
                    <img id="image5" src="images/reparer.png">
                    <div>Maintenance</div>
                </div>
            </div>

            <h2>Ils nous font confiance</h2>
            <div id="clients">
                <img id="client1" class="clients" src="images/airbnb.png" alt="">
                <img id="client2" class="clients" src="images/paypal.png" alt="">
                <img id="client3" class="clients" src="images/spotify.png" alt="">
                <img id="client4" class="clients" src="images/booking.png" alt="">
            </div>
        </div>
    </body>
</html>

<script>
function scrollWin() {
    document.getElementById('scrolldown').scrollIntoView();
}
</script>