<?php
/**
 * Auteur: F. Hémery 19/09/2017 12:26
 *
 */

namespace TP\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
/**
 * Class Note
 * @package TP\Entity
 * @Entity
 * @Table(name="notes")
 */
class Note {
    /**
     * @var int
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var Epreuve
     * @ManyToOne(targetEntity="Epreuve", inversedBy="notes")
     *
     */
    protected $epreuve;
    /**
     * @var Etudiant
     * @ManyToOne(targetEntity="Etudiant", inversedBy="notes")
     *
     */
    protected $etudiant;
    /**
     * @var string ('neutre', 'valide', 'absent')
     * @Column(type="string", length=10)
     */
    protected $etat = 'neutre';
    /**
     * @var float
     * @Column(type="decimal", precision=4, scale=2)
     */
    protected $valeur=0.0;

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
     * Set etat
     *
     * @param string $etat
     * @return Note
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     * @return Note
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set epreuve
     *
     * @param \TP\Entity\Epreuve $epreuve
     * @return Note
     */
    public function setEpreuve(\TP\Entity\Epreuve $epreuve)
    {
        $this->epreuve = $epreuve;

        return $this;
    }

    /**
     * Get epreuve
     *
     * @return \TP\Entity\Epreuve 
     */
    public function getEpreuve()
    {
        return $this->epreuve;
    }

    /**
     * Set etudiant
     *
     * @param \TP\Entity\Etudiant $etudiant
     * @return Note
     */
    public function setEtudiant(\TP\Entity\Etudiant $etudiant)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \TP\Entity\Etudiant 
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }
}
