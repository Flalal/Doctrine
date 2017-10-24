<?php
/**
 * Auteur: F. Hémery 19/09/2017 08:50
 *
 */

namespace TP\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @Table(name="enseignants")
 */
class Enseignant {
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     *
     * @Column(type="string", length=40)
     */
    protected $nom;
    /**
     * @var string
     *
     * @Column(type="string", length=40)
     */
    protected $prenom;
    /**
     * @var Epreuve[]
     * @OneToMany(targetEntity="Epreuve", mappedBy="enseignant", cascade={"persist"})
     */
    protected $epreuves;
    /**
     * Enseignant constructor.
     */
    public function __construct() {
        $this->epreuves = new ArrayCollection();
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
     * @return Enseignant
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
     * @return Enseignant
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
     * Add epreuve
     *
     * @param \TP\Entity\Epreuve $epreuve
     * @return Enseignant
     */
    public function addEpreufe(\TP\Entity\Epreuve $epreuve)
    {
        $this->epreuves[] = $epreuve;

        return $this;
    }

    /**
     * Remove epreuve
     *
     * @param \TP\Entity\Epreuve $epreuve
     */
    public function removeEpreufe(\TP\Entity\Epreuve $epreuve)
    {
        $this->epreuves->removeElement($epreuve);
    }

    /**
     * Get epreuves
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEpreuves()
    {
        return $this->epreuves;
    }
}
