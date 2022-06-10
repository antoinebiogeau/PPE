<!DOCTYPE html>
<html lang="en">
    <?php
    include_once './src/header.inc.php';
    include_once './src/connect_bdd.inc.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        header('Location: ./login.php');
    }
    ?>
<body class="light">
    <header>
        <img src="./assets/logo.png" alt="logo">
        <h1>Maison Des Ligues -<span>Tous Les Sports</span></h1>
        <span class="" id="toggle"><img src="./assets/sun_weather_icon_152003.png" alt="Jour nuit" id="theme"></span>
    </header>
<main>
        <section>
            <h2 class=".confirm">
                Bonjour <?= $_SESSION["nom"] ?>
            </h2>
        </section>
        <section >
            <h2>Information</h2>
            <ul class="userInfo">
                <li><?= $_SESSION["nom"] ?></li>
                <li><?= $_SESSION["prenom"] ?></li>
                <li><?= $_SESSION["mail"] ?></li>
                <li><?= $_SESSION["ville"] ?></li>
                <li><?= $_SESSION["pays"] ?></li>
            </ul>
            <h2>Historique des evenements</h2>
            <?php
            include_once './src/list_event.inc.php';
            ?>
        </section>
        <!--bouton deconnexion-->
        <section>
            <a href="./logout.php">Déconnexion</a>
        </section>
    </main>
    
</body>
<script src="./js/app.js"></script>
</html>