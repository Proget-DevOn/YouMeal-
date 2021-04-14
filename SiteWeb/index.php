<!DOCTYPE html>
<html lang="fr-FR">
    <head>  
        <title>Gary's Shop - Page d'accueil</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="CSS_img/normalize.css" />
        <link rel="stylesheet" type="text/css" href="CSS_img/style.css" />
        <link rel="stylesheet" type="text/css" href="CSS_img/simplegrid.css" />
    </head>
    <body>
        
        <?php include('header.html');?>
        <!-- <header>
            <h1>Gary's Shop</h1>
            <form method="GET" action="article.html">
                <input class="search" type="text" placeholder="Rechercher un produit..."/>
                <button><img src="CSS_img/img/Magicalconch.png" alt="Coquillage magique de Bob"/></button>
            </form>
            <img id="gary" src="CSS_img/img/gary.png" alt="Gary"/>
            <nav>
                <div class="navi">
                        <div class="col-1-4">
                            <a href="index.html" title="Retour à la page d'accueil du site">Accueil</a>
                        </div>
                        <div class="col-1-4">
                            <a href="article.html" title="Nos articles">Nos articles</a>
                        </div>
                        <div class="col-1-4">
                            <a href="panier.html" title="Mon Panier">Mon Panier</a>
                        </div>
                        <div class="col-1-4">
                            <a href="who.html" title="Qui sommes-nous ?">Qui sommes-nous ?</a>
                        </div>
                </div>
            </nav>
        </header> -->
        <main>
            <p id="welcome">Bienvenue chez Gary's Shop, LE site des goodies Bob l'éponge</p>
            <section class="grid">
                    <h2 id="promo">Les promos de la semaine !</h2>
                    <article>
                        <div class="col-1-3">
                            <h3>Figurine Pop : Bob de Noël</h3>
                            <a href="page_article.html" title="Figurine Pop Bob de Noël"><img class="produit" src="CSS_img/img/popbob.jpg" alt="Figurine Pop Bob l'éponge (Noël)"/></a>
                            <p class="reduc">4,99 €</p> <p class="prix">9.99 €</p>
                        </div>
                        <div class="col-1-3">
                            <h3>Sofa Bob l'éponge</h3>
                            <img class="produit" src="CSS_img/img/sofa.jpg" alt="Sofa Bob L'Eponge"/>
                            <p class="reduc">62.99 €</p> <p class="prix">89,99 €<p>
                        </div>
                        <div class="col-1-3">
                            <h3>Chaussons Gary</h3>
                            <img src="CSS_img/img/chausson_gary.jpg" alt="Chaussons Gary"/>
                            <p class="reduc">12,49 €</p> <p class="prix">24,99 €</p>
                        </div>
                    </article>
            </section>
        </main>
    </body>
</html>