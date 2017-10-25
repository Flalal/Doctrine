<?php
/**
 * Auteur: F. Hémery 19/09/2017 12:26
 *
 */

namespace TP\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class Note
 * @package TP\Entity
 * @ORM\Entity
 * @ORM\Table(name="notes")
 */
class Note {
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var Epreuve
     * @ORM\ManyToOne(targetEntity="Epreuve", inversedBy="notes")
     *
     */
    protected $epreuve;
    /**
     * @var Etudiant
     * @ORM\ManyToOne(targetEntity="Etudiant", inversedBy="notes")
     *
     */
    protected $etudiant;
    /**
     * @var string ('neutre', 'valide', 'absent')
     * @ORM\Column(type="string", length=10)
     */
    protected $etat = 'neutre';
    /**
     * @var float
     * @ORM\Column(type="decimal", precision=4, scale=2)
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
