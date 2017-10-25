<?php
/**
 * Auteur: F. Hémery 19/09/2017 11:36
 *
 */

namespace TP\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Class Etudiant
 * @package TP\Entity
 * @ORM\Entity
 * @ORM\Table(name="etudiants")
 */
class Etudiant {
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    protected $nom;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    protected $prenom;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10)
     */
    protected $numero;
    /**
     * @var Note[]
     * @ORM\OneToMany(targetEntity="Note", mappedBy="etudiant")
     */
    protected $notes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nom
     *
     * @param string $nom
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Etudiant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Etudiant
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set notes
     *
     * @param \TP\Entity\Note $notes
     * @return Etudiant
     */
    public function setNotes(\TP\Entity\Note $notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return \TP\Entity\Note 
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
