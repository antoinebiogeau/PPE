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
<body>
<main>
        <section>
            <h2 class=".confirm">
                Bonjour <?= $_SESSION["nom"] ?>
            </h2>
        </section>
        <section class="userInfo">
            <h2>Information</h2>
            <ul>
                <li><?= $_SESSION["nom"] ?></li>
                <li><?= $_SESSION["prenom"] ?></li>
                <li><?= $_SESSION["mail"] ?></li>
                <li><?= $_SESSION["ville"] ?></li>
                <li><?= $_SESSION["pays"] ?></li>
            </ul>
            <a href="#">Voir l'historique des évenements</a>
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
</html>