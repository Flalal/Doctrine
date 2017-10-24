<?php
/**
 * Auteur: F. Hémery 19/09/2017 13:55
 *
 */

namespace TP\DataFixtures;


use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TP\Entity\Note;

class LoadNoteData implements FixtureInterface,
    DependentFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $generator = \Faker\Factory::create();
        $etudiants = $manager->getRepository('TP\Entity\Etudiant')
            ->findAll();
        $epreuves = $manager->getRepository('TP\Entity\Epreuve')
            ->findAll();
        foreach ($epreuves as $epreuve) {
            foreach ($etudiants as $etudiant) {
                $etat = $generator->optional($weight = 0.99, $default = 'valide')->randomElement(['neutre', 'valide', 'absent']);
                $note = new Note();
                $note->setEpreuve($epreuve)->
                setEtudiant($etudiant)->
                setEtat($etat);
                if ($etat == 'valide')
                    $note->setValeur($generator->randomFloat($nbMaxDecimals = 2, $min = 0.0, $max = 20.0));
                elseif ($etat == 'absent') {
                    $epreuve->addAbsent($etudiant);
                    $manager->persist($epreuve);
                }
                $manager->persist($note);
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
        return ['TP\DataFixtures\LoadEtudiantData', 'TP\DataFixtures\LoadEpreuveData'];
    }
}