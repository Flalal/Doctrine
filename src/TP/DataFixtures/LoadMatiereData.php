<?php
/**
 * Auteur: F. Hémery 19/09/2017 13:28
 *
 */

namespace TP\DataFixtures;


use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TP\Entity\Matiere;

class LoadMatiereData implements FixtureInterface,
    DependentFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $tab = Utility::tableauMatieres();
        for ($i = 0; $i < count($tab); $i++) {
            $matiere = new Matiere();
            $matiere->
            setNomLong($tab[$i][0])->
            setNomCourt($tab[$i][1])->
            setUnitEnseignement($tab[$i][2]);
            $manager->persist($matiere);
        }
        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    function getDependencies() {
        return ['TP\DataFixtures\LoadEnseignantData'];
    }
}