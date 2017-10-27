<?php
/**
 * Created by PhpStorm.
 * User: florian.flahaut
 * Date: 27/10/17
 * Time: 10:32
 */
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/config.php';

$isDevMode = true;


$entityManager = \TP\EntityManagerFactory::getEntityManager($dbParams, $entityPath, $isDevMode);

$matiereRepository = $entityManager->getRepository('\TP\Entity\Matiere');
$matiere = $matiereRepository->findAll();
$matiere = $matiereRepository->find(1);
$matiere = $matiereRepository->findBy(['unitEnseignement' => 'UE42']);
$matiere = $matiereRepository->findOneBy(['unitEnseignement' => 'UE42']);


//print_r($matiere);



$etudiantRepository = $entityManager->getRepository(\TP\Entity\Etudiant::class);

//print_r($etudiantRepository);

$noteEtu = $etudiantRepository->findOneBy(["nom" => "Dupont"])->getNotes();



$queryEtu = $entityManager->createQuery('SELECT e FROM \TP\Entity\Etudiant e WHERE e.nom = :name')->setParameter("name","Dupont");

//echo $matiere->getNomLong() . PHP_EOL;
$etudiants = $queryEtu->getResult();
//print_r($etudiants);

foreach ($etudiants as $etu)
    foreach ($etu->getNotes() as $note)
        echo $note->getValeur() . PHP_EOL;



//Q1  : Liste des matieres
/*
$requete = $entityManager->createQuery('SELECT m FROM \TP\Entity\Matiere m ');
$matieres = $requete->getResult();
foreach ($matieres as $matiere)
    echo $matiere->getNomLong(). " nom court : ". $matiere->getNomCourt().PHP_EOL;
*/


//Q2 : Nom prenom etu

$requete = $entityManager->createQuery('SELECT e.nom, e.prenom FROM \TP\Entity\Etudiant e');
$etudiantNomPrenom = $requete->getResult();
print_r($etudiantNomPrenom);
foreach ($etudiantNomPrenom as $etuNP)
    echo $etuNP['nom'] . " " . $etuNP['prenom'] . PHP_EOL;

//Q3 : Note Etu avec nom en parametre

$dql = 'SELECT n FROM \TP\Entity\Note n join n.etudiant e where e.nom =?1 ';
$requete = $entityManager->createQuery($dql)->setParameter(1,'Lepage');
$reponse = $requete->getResult();

//print_r($reponse);

foreach ($reponse as $note){
    echo $note->getEtudiant()->getNom() . " " . $note->getValeur() . PHP_EOL;
}