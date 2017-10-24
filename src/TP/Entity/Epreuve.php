<?php
/**
 * Auteur: F. Hémery 19/09/2017 10:31
 *
 */

namespace TP\Entity;

//use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Epreuve
 * @package TP\Entity
 * @Entity
 * @Table(name="epreuves")
 */
class Epreuve {
    /**
     * @var int
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @Column(type="string", length=60)
     */
    protected $libelle;
    /**
     * @var \DateTime
     * @Column(type="date")
     */
    protected $dateCompose;
    /**
     * @var float
     * @Column(type="decimal", precision=4, scale=2)
     */
    protected $coefficient;
    /**
     * @var Enseignant
     * @ManyToOne(targetEntity="Enseignant", inversedBy="epreuves")
     */
    protected $enseignant;
    /**
     * @var Matiere
     * @ManyToOne(targetEntity="Matiere")
     * @JoinColumn(name="matiere_id", referencedColumnName="id")
     */
    protected $matiere;
    /**
     * @var Etudiant[]
     *
     * @ManyToMany(targetEntity="Etudiant")
     * @JoinTable(name="absences_etd_epr",
     *   joinColumns={@JoinColumn(name="epreuve_id", referencedColumnName="id")},
     *   inverseJoinColumns={@JoinColumn(name="etudiant_id", referencedColumnName="id")}
     * )
     *
     */
    protected $absents;
    /**
     * @var Note[]
     * @OneToMany(targetEntity="Note", mappedBy="epreuve")
     * @Column(nullable=false)
     */
    protected $notes;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle() {
        return $this->libelle;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Epreuve
     */
    public function setLibelle($libelle) {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get dateCompose
     *
     * @return \DateTime
     */
    public function getDateCompose() {
        return $this->dateCompose;
    }

    /**
     * Set dateCompose
     *
     * @param \DateTime $dateCompose
     * @return Epreuve
     */
    public function setDateCompose($dateCompose) {
        $this->dateCompose = $dateCompose;

        return $this;
    }

    /**
     * Get coefficient
     *
     * @return string
     */
    public function getCoefficient() {
        return $this->coefficient;
    }

    /**
     * Set coefficient
     *
     * @param string $coefficient
     * @return Epreuve
     */
    public function setCoefficient($coefficient) {
        $this->coefficient = $coefficient;

        return $this;
    }

    /**
     * Get enseignant
     *
     * @return \TP\Entity\Enseignant
     */
    public function getEnseignant() {
        return $this->enseignant;
    }

    /**
     * Set enseignant
     *
     * @param \TP\Entity\Enseignant $enseignant
     * @return Epreuve
     */
    public function setEnseignant(\TP\Entity\Enseignant $enseignant = null) {
        $this->enseignant = $enseignant;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \TP\Entity\Matiere
     */
    public function getMatiere() {
        return $this->matiere;
    }

    /**
     * Set matiere
     *
     * @param \TP\Entity\Matiere $matiere
     * @return Epreuve
     */
    public function setMatiere(\TP\Entity\Matiere $matiere = null) {
        $this->matiere = $matiere;

        return $this;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->absents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add absent
     *
     * @param \TP\Entity\Etudiant $absent
     * @return Epreuve
     */
    public function addAbsent(\TP\Entity\Etudiant $absent)
    {
        $this->absents[] = $absent;

        return $this;
    }

    /**
     * Remove absent
     *
     * @param \TP\Entity\Etudiant $absent
     */
    public function removeAbsent(\TP\Entity\Etudiant $absent)
    {
        $this->absents->removeElement($absent);
    }

    /**
     * Get absents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAbsents()
    {
        return $this->absents;
    }

    /**
     * Add note
     *
     * @param \TP\Entity\Note $note
     * @return Epreuve
     */
    public function addNote(\TP\Entity\Note $note)
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Remove note
     *
     * @param \TP\Entity\Note $note
     */
    public function removeNote(\TP\Entity\Note $note)
    {
        $this->notes->removeElement($note);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
