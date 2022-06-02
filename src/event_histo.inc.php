<?php 
    if(isset($_SESSION["id"]) && isset($_GET['id_event'])){
        $_date = new DateTime();
        $_date = $_date->format('Y-m-d H:i:s'); 
        print "L'id event : " . $_GET["id_event"] . " | l'id de la session : " . $_SESSION["id"] . " | la date : " . $_date;
        try {
        $_date = new DateTime();
        $_date = $_date->format('Y-m-d H:i:s');
        $_req = $_bdd->prepare('INSERT INTO date(id_client, id_event, dateConsultation) VALUES (:id_client, :id_event, :date_consultation)');
        $_req->execute(array(
            'id_client' => $_SESSION['id'],
            'id_event' => $_GET['id_event'],
            'date_consultation' => $_date,
        ));
        print $_SESSION['id'] . $_GET['id_event'] . $_date;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
         }
    }
?> 