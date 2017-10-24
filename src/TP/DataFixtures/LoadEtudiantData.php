<?php
/**
 * Auteur: F. Hémery 19/09/2017 10:01
 *
 */

namespace TP\DataFixtures;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TP\Entity\Etudiant;

class LoadEtudiantData implements FixtureInterface {
    /**
     * Number of posts to add
     */

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $generator = \Faker\Factory::create();
        $tab = Utility::tableauNomsPrenom($GLOBALS['repData']."/etudiants.txt");
        for ($i = 0; $i < count($tab); $i++) {
            $etudiant = new Etudiant();
            $etudiant->
            setNom($tab[$i][0])->
            setPrenom($tab[$i][1])->
            setNumero($generator->numerify('2017#####'));
            $manager->persist($etudiant);
        }
        $manager->flush();
    }
}