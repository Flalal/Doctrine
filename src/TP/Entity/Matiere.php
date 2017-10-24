<?php
/**
 * Auteur: F. Hémery 19/09/2017 11:02
 *
 */

namespace TP\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Matiere
 * @package TP\Entity
 * @Entity
 * @Table(name="matieres")
 */
class Matiere {
    /**
     * @var int
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @Column(type="string", length=120, name="nom_long")
     */
    protected $nomLong;
    /**
     * @var string
     * @Column(type="string", length=10, name="nom_court")
     */
    protected $nomCourt;
    /**
     * @var string
     * @Column(type="string", length=10, name="unit_enseignement")
     */
    protected $unitEnseignement;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomLong
     *
     * @param string $nomLong
     * @return Matiere
     */
    public function setNomLong($nomLong)
    {
        $this->nomLong = $nomLong;

        return $this;
    }

    /**
     * Get nomLong
     *
     * @return string 
     */
    public function getNomLong()
    {
        return $this->nomLong;
    }

    /**
     * Set nomCourt
     *
     * @param string $nomCourt
     * @return Matiere
     */
    public function setNomCourt($nomCourt)
    {
        $this->nomCourt = $nomCourt;

        return $this;
    }

    /**
     * Get nomCourt
     *
     * @return string 
     */
    public function getNomCourt()
    {
        return $this->nomCourt;
    }

    /**
     * Set unitEnseignement
     *
     * @param string $unitEnseignement
     * @return Matiere
     */
    public function setUnitEnseignement($unitEnseignement)
    {
        $this->unitEnseignement = $unitEnseignement;

        return $this;
    }

    /**
     * Get unitEnseignement
     *
     * @return string 
     */
    public function getUnitEnseignement()
    {
        return $this->unitEnseignement;
    }
}
