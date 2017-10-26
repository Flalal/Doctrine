<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/config.php';

$isDevMode = true;

// obtenir une instance d'entity manager
// $dbParams : variable définie dans le fichier 'config/config.php'
// $entityPath : variable définie dans le fichier 'config/config.php' (à ajouter par rapport à la version précédente)

$entityManager = \TP\EntityManagerFactory::getEntityManager($dbParams, $entityPath, $isDevMode);

$enseignantRepository = $entityManager->getRepository('\TP\Entity\Enseignant');
$enseignants = $enseignantRepository->findAll();

foreach ($enseignants as $ens) {
    echo "nom : ".$ens->getNom()." prénom : ".$ens->getPrenom().PHP_EOL;
}

$requete = $entityManager->createQuery("select e from \TP\Entity\Etudiant e ");
$etudiants = $requete->getResult();

foreach ($etudiants as $etu) {
    echo "nom : ".$etu->getNom()." prénom : ".$etu->getPrenom().PHP_EOL;
}
