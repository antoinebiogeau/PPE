<?php 

try {
    $sqlQuery = 'SELECT DISTINCT nom, description, dateConsultation, id_client FROM date
    INNER JOIN evenement ON date.id_event = evenement.idEvenement
    WHERE date.id_client = :id_client
    GROUP BY date.id_event, date.dateConsultation, nom, description
    ORDER BY date.dateConsultation DESC LIMIT 10';

    $recipesStatement = $_bdd->prepare($sqlQuery);
    $recipesStatement->execute(array(
        'id_client' => $_SESSION['id'],
    ));
    $users = $recipesStatement->fetchAll();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


print '<table>' . '<th>' . "Nom de l'événement" . '</th>' . '<th>' . "Description de l'événement" . '</th>' . '<th>' . "Date de l'événement" . '</th>'. '<th>' . "Date de la consultation" . '</th>';
foreach ($users as $user) {
    if (isset($user['id_client']) == $_SESSION['id']) {
        echo
        '</tr>' .
            '<tr>' . '<td>' . $user['nom'] . '</td>' . '<td>' 
            . $user['description'] . '</td>' . '<td>'
            . $user['dateConsultation'] . '</td>' . '<td>' 
            . $user['dateConsultation'] . '</td>' ;
    }
}
print '</tr> ' . ' </table>';
?>