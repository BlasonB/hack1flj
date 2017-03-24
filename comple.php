<?php

if(isset($_GET['query'])) {
    // Mot tapé par l'utilisateur
    $q = htmlentities($_GET['query']);

    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=sport', 'root ', 'francois');
    } catch(Exception $e) {
        exit('Impossible de se connecter à la base de données.');
    }

    // Requête SQL
    $requete = "SELECT sport FROM sport WHERE sport LIKE '". $q ."%' LIMIT 0, 10";

    // Exécution de la requête SQL
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

    // On parcourt les résultats de la requête SQL
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // On ajoute les données dans un tableau
        $suggestions['suggestions'][] = $donnees['sport'];
    }

    // On renvoie le données au format JSON pour le plugin
    echo json_encode($suggestions);
}