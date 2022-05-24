<!DOCTYPE html>
<html lang="fr">
<?php
    include_once './src/header.inc.php';
    session_start(); //démarrage de la session
    //verifie si la session est ouverte
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        //redirige vers l'index
        header('Location: ./index.php');
    } else {
        echo "Please log in first to see this page.";
    }
?>
<body class="light">
    <header>
        <img src="./assets/logo.png" alt="logo">
        <h1>Films, séries TV et <span>bien plus en illimité.</span></h1>
        <span class="" id="toggle"><img src="./assets/sun_weather_icon_152003.png" alt="Jour nuit" id="theme"></span>
    </header>
    <main>
        <section>
            <h2>Prêt à regarder? Remplissez le formulaire proposé dans cette page</h2>
            <p>Tous les mois profitez de toutes les nouveautés série et cinéma. A partir du mois
                prochain on vous propose tous les classiques du cinéma. Où que vous soyez. Tous
                le s films en VO, VOST, VF et plus d'options</p>
                <ul class="grid-picture-large" aria-hidden="true">
                    <li data-img src="./assets/Ad_Astra.jpg" data-title="ad astra"
                    data-description="c'est un film épatant, entre action et émotion..." data-dates="02/01/1983">
                    <figure>
                        <img src="./assets/Ad_Astra.jpg" alt="ad astra" />
                        <figcaption>
                            <h2>
                                <i class="material-icons" aria-hidden="true">
                                    pages
                                </i>
                                Agrandir
                            </h2>
                        </figcaption>
                    </figure>
                </li>
                <li data-image="./assets/avatar.jpg" data-title="avatar"
                            data-description="c'est un film épatant, entre action et émotion..." data-dates="02/01/1983">
                            <figure>
                                <img src="./assets/avatar.jpg" alt="avatar" />
                                <figcaption>
                                    <h2>
                                        <i class="material-icons" aria-hidden="true">
                                            pages
                                        </i>
                                        Agrandir
                                    </h2>
                                </figcaption>
                            </figure>
                        </li>
                        <li data-image="./assets/avenger-afinity.jpg" data-title="avenger"
                            data-description="c'est un film épatant, entre action et émotion..." data-dates="02/01/1983">
                            <figure>
                                <img src="./assets/avenger-afinity.jpg" alt="avenger" />
                                <figcaption>
                                    <h2>
                                        <i class="material-icons" aria-hidden="true">
                                            pages
                                        </i>
                                        Agrandir
                                    </h2>
                                </figcaption>
                            </figure>
                        </li>
                        <li data-image="./assets/batman.jpg" data-title="batman"
                            data-description="c'est un film épatant, entre action et émotion..." data-dates="02/01/1983">
                            <figure>
                                <img src="./assets/batman.jpg" alt="batman" />
                                <figcaption>
                                    <h2>
                                        <i class="material-icons" aria-hidden="true">
                                            pages
                                        </i>
                                        Agrandir
                                    </h2>
                                </figcaption>
                            </figure>
                        </li>
                        <li data-image="./assets/captain_america.jpg" data-title="captain america"
                            data-description="c'est un film épatant, entre action et émotion..." data-dates="02/01/1983">
                            <figure>
                                <img src="./assets/captain_america.jpg" alt="captain america" />
                                <figcaption>
                                    <h2>
                                        <i class="material-icons" aria-hidden="true">
                                            pages
                                        </i>
                                        Agrandir
                                    </h2>
                                </figcaption>
                            </figure>
                        </li>
            </ul>
        </section>
        <form method="POST">
            <fieldset>
                <legend>Remplissez le formulaire</legend>
                <label for="nom">nom</label>
                <input type="text" id="nom" name="nom" placeholder="nom" aria-required="true" autofocus required>
                <label for="prenom">prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="prénom" aria-required="true" required>
                <label for="email">email</label>
                <input type="email" id="email" name="email" placeholder="email" aria-required="true" required>
                <label for="password">mot de passe</label>
                <input type="password" id="password" name="password" placeholder="mot de passe" aria-required="true" required>
                <label for="ville">ville</label>
                <select name="ville" id="ville" aria-required="true" required>
                    <option value="">- Choisissez la ville -</option>
                    <option value="paris">Paris</option>
                    <option value="lyon">Lyon</option>
                    <option value="marseille">Marseille</option>
                    <option value="toulouse">Toulouse</option>
                    <option value="nantes">Nantes</option>
                    <option value="strasbourg">Strasbourg</option>
                    <option value="bordeaux">Bordeaux</option>
                    <option value="lille">Lille</option>
                    <option value="rennes">Rennes</option>
                </select>
                <label for="pays">Pays</label>
                <select name="pays" id="pays" aria-required="true" required>
                    <option value="">- Choisissez le pays -</option>
                    <option value="France">France</option>
                    <option value="Espagne">Espagne</option>
                    <option value="Italie">Italie</option>
                    <option value="Allemagne">Allemagne</option>
                    <option value="Portugal">Portugal</option>
                </select>
                <input type="submit" value="Valider">
            </fieldset>
        </form>
    </main>
    <?php include './src/connect_bdd.inc.php'; ?>
    <?php
    //recuperation des données du formulaire et envoie dnas la base de données
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['ville']) && isset($_POST['pays']) && isset($_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $password = $_POST['password'];
        $requete = $_bdd->prepare("INSERT INTO `client` (`nomClient`, `prenomClient`, `emailClient`, `paysClient`, `villeClient`, `mdpClient`) VALUES (:nom, :prenom, :email, :ville, :pays, :password)");
        print_r($requete);
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':ville', $ville);
        $requete->bindParam(':pays', $pays);
        $requete->bindParam(':password', $password);
        $requete->execute();
        header('Location: ./login.php');
    }
    ?>
    <footer>
        <p>
            &copy;Lord Beubeuh - 2022
        </p>
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