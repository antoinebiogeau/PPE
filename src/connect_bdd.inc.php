<?php
try {
        $_pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $_bdd = new PDO(
            'mysql:host=172.190.1.52;
            dbname=abiogeau',
            'abiogeau',
            'azerty',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', $_pdo_options)
        );
        echo "Connexion à la base de données réussie";
        $_response = $_bdd->query('SELECT * FROM client');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}

?>