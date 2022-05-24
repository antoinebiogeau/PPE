<!DOCTYPE html>
<html lang="en">
<?php
    include_once './src/header.inc.php';
?>
<?php
//seesion
session_start();
?>
<body class="light">
    <header>
        <img src="./assets/logo.png" alt="logo">
        <h1>Maison Des Ligues -<span>Tous Les Sports</span></h1>
        <span class="" id="toggle" aria-hidden="true">
            <img src="./assets/sun_weather_icon_152003.png" alt="Jour nuit" id="theme">
        </span>
        <a href="./user_account.php"><img src="./assets/compte-utilisateur-1.png" alt="compte"></a>
    </header>
    <main>
    <?php include_once "./src/connect_BDD.inc.php" ?>
        <h1><?php isset($_SESSION['nom']) ? print $_SESSION['nom'] : return null ?></h1>
        <h2>Prêt à la compétition ? Remplissez le formulaire proposé dans cette page</h2>
            <p>Tous les mois profitez de toutes les nouveautés et opportunités. A partir du mois
                prochain on vous propose toutes les séance de sport sur vos support préférés</p>
            <ul class="grid-picture-large" aria-hidden="true">
                <?php
            try {
                    // On récupère tout le contenu de la table recipes
                    $request = "SELECT * FROM `evenement` ";
                    $recipesStatement = $_bdd->prepare($request);
                    $recipesStatement->execute();
                    $evenement = $recipesStatement->fetchAll();

                    // On affiche chaque recette une à une
                    foreach ($evenement as $event) {
                        echo
                        '<li' . ' data-image=' . $event['image'] . ' data-title="' . $event['nom'] . '" ' 
                        . 'data-description="' . $event['description'] 
                        . '"' . ' data-dates="' . $event['date_creation'] . '"' . 'data-id="' . $event['idEvenement']
                        . '" >' 
                             . '<figure>' . '<img src=' . $event['image'] . ' alt=' . $event['nom'] . " />"

                            . '<figcaption>' . '<h2>' . '<span class="material-icons" aria-hidden="true"> ' . 'add' . '</span> ' . "En savoir" . '</h2>' . '</figcaption>'


                            . '</figure>' .

                            '</li>';
                    }
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                ?>

            </ul>
    </main>
    <nav>
        <ul>
            <li><a href="./formulaire.php">Cliquez ici pour commencer</a></li>
            <li><a href="./login.php">Se connecter</a></li>
        </ul>
    </nav>
    <footer>
       <p>&copy;Lord Beubeuh - 2022</p> 
    </footer>
    <div class="parent-modale" role="dialog" aria-label="true">
        <figure class="modale">
            <button aria-label="closed">
                <span class="material-icons">clear</span>
            </button>
            <img src="https://via.placeholder.com/500" alt="picture" />
            <figcaption class="desc">
                <h3>title</h3>
                <p> </p>
                <time>Years : </time>
            </figcaption>
        </figure>
    </div>
    <script src="./js/app.js"></script>
</body>
</html>