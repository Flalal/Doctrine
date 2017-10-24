<?php
/**
 * Auteur: F. Hémery 19/09/2017 13:55
 *
 */

namespace TP\DataFixtures;


use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TP\Entity\Epreuve;

class LoadEpreuveData implements FixtureInterface,
    DependentFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $generator = \Faker\Factory::create();
        $enseignants = $manager->getRepository('TP\Entity\Enseignant')
            ->findAll();
        $matieres = $manager->getRepository('TP\Entity\Matiere')
            ->findAll();
        foreach ($enseignants as $enseignant) {
            $nbEpreuves = random_int(1, 4);
            $matiere = $matieres[random_int(0, count($matieres)-1)];
            for ($i = 0; $i < $nbEpreuves; $i++) {

                $epreuve = new Epreuve();
                $epreuve->
                setLibelle($generator->sentence($nbWords = 4, $variableNbWords = true))->
                setCoefficient($generator->randomFloat($nbMaxDecimals = 2, $min = 0.5, $max = 3.0))->
                setDateCompose(
                    $generator->dateTimeBetween(
                        $startDate = '-1 year',
                        $endDate = 'now',
                        $timezone = date_default_timezone_get()
                    )
                )->
                setEnseignant($enseignant)->
                setMatiere($matiere);

                $manager->persist($epreuve);
            }
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
        return ['TP\DataFixtures\LoadEnseignantData', 'TP\DataFixtures\LoadMatiereData'];
    }
}