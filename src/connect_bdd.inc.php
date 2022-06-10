<?php
try {
        $_pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $_bdd = new PDO(
            'mysql:host=localhost;
            dbname=ppeweb',
            'root',
            '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', $_pdo_options)
        );
        $_response = $_bdd->query('SELECT * FROM client');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}

?>