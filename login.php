<!DOCTYPE html>
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
    $id_session = session_id();
?>

<main>
    <h1>Login</h1>
    <fieldset>
                <legend>
                    <h3>Veuillez vous connecter</h3>
                </legend>
                <form action="<?php $_SERVER['PHP_SELF']?>"  method="post">
                <label for="login">
                    Votre login
                </label>
                <input 
                    type="email" 
                    name="login" 
                    id="login" 
                    placeholder="Votre login" 
                    aria-required="true">
                    <label for="login">
                    Votre Password
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Votre password" 
                    aria-required="true">
                    <input type="submit" value="Connexion">
                </form>
            </fieldset>
        <?php
        include_once './src/connect_bdd.inc.php';
        ?>
        <?php
            //login
            if (isset($_POST['login']) && isset($_POST['password'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM client WHERE emailClient = '$login' AND mdpCLient = '$password'";
                $result = $_bdd->query($sql);
                while($row = $result->fetch()) {
                if ($row) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['nom'] = $row['nomClient'];
                    $_SESSION['prenom'] = $row['prenomClient'];
                    $_SESSION['mail'] = $row['emailClient'];
                    $_SESSION['ville'] = $row['villeClient'];
                    $_SESSION['pays'] = $row['paysClient'];
                    $_SESSION['id'] = $row['idClient'];
                    header('Location: ./index.php');
                } else {
                    echo "Login ou mot de passe incorrect";
                }
            }
                print '<section><p class="success">Bonjour : '.$_SESSION['nom'].'</p></section>';
                print '<section>
                            <a href="./index.php">Accéder à votre compte</a>
                        </section>';
              
                }  
        ?>
    </main>
</html>