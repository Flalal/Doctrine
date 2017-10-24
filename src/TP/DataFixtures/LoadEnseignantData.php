<?php
/**
 * Auteur: F. Hémery 19/09/2017 10:01
 *
 */

namespace TP\DataFixtures;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TP\Entity\Enseignant;

class LoadEnseignantData implements FixtureInterface {
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $tab = Utility::tableauNomsPrenom($GLOBALS['repData']."/enseignants.txt");
        for ($i = 0; $i < count($tab); $i++) {
            $enseignant = new Enseignant();
            $enseignant->
            setNom($tab[$i][0])->
            setPrenom($tab[$i][1]);
            $manager->persist($enseignant);
        }
        $manager->flush();
    }
}