<?php
            try {
            // Insert dbb connection credentials here
                $_host = "";
                $_dbname = "";
                $_user = "";
                $_password = getenv('MYSQL_SECURE_PASSWORD');

                $_pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    
                $_bdd = new PDO("mysql:host={$_host};dbname={$_dbname};", $_user, $_password);
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',$_pdo_options);
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }

                if(isset($_POST["nom"]) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['ville']) && isset($_POST['email']) && isset($_POST['mdp']))
                {
                    $_nom = $_POST['nom'];
                    $_prenom = $_POST['prenom'];
                    $_age = $_POST['age'];
                    $_ville = $_POST['ville'];
                    $_email = $_POST['email'];
                    $_mdp = $_POST['mdp'];

                    if(strlen($_prenom) > 6 || strlen($_nom) > 20 || strlen($_ville) > 6 || strlen($_email) > 10 || strlen($_mdp) > 6)
                    {
                        if(is_numeric($_prenom) || is_numeric($_nom) || is_numeric($_ville) || is_numeric($_email))
                        {
                            print "<p class=\"warning\"> veuillez saisir des lettres</p>";
                        }
                        if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                            print "<p class=\"warning\"> veuillez saisir un email valide</p>";
                        }
                        else 
                        {
                            $_sql = "SELECT emailClient, mdpClient FROM `client` WHERE emailClient = '$_email' AND mdpClient = '$_mdp'";
                            $_bdd->exec($_sql);

                            
                            if ($_bdd->rowCount() > 0) {
                                die("Mail déjà utilisé");
                                print "<p class=\"warning\"> Cet email est déjà utilisé </p>";
                            }
                                else
                            {
                                print "<p class=\"success\"> Votre inscription a bien été prise en compte </p>";
                                session_start();
                                $_SESSION['email'] = $_email;
                                $_SESSION['mdp'] = $_mdp;
                                header('Location: ./index.php');
                            }
                        }
                    }  
                }
        ?>