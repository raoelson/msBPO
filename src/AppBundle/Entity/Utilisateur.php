<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as Base;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends Base
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;
    
    /**
     * @var ArrayCollection $journees
     * @ORM\OneToMany(targetEntity="Journee", mappedBy="createur", cascade={"persist", "merge"})
     */
    private $journees;
    
    /**
     * @var ArrayCollection $validations
     * @ORM\OneToMany(targetEntity="Journee", mappedBy="validateur", cascade={"persist", "merge"})
     */
    private $validations;
    
    /**
     * @var ArrayCollection $saisie
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="operateur", cascade={"persist", "merge"})
     */
    private $saisies;
    
    /**
     * @var ArrayCollection $controles
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="controleur", cascade={"persist", "merge"})
     */
    private $controles;
    
    public function __construct() {
        parent::__construct();
        
        $this->enabled = true;
        $this->journees = new ArrayCollection();
        $this->validations = new ArrayCollection();
        $this->saisies = new ArrayCollection();
        $this->controles = new ArrayCollection();
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
     * @return Utilisateur
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
     * Add journees
     *
     * @param \AppBundle\Entity\Journee $journees
     * @return Utilisateur
     */
    public function addJournee(\AppBundle\Entity\Journee $journees)
    {
        $journees->setCreateur($this);
        $this->journees[] = $journees;

        return $this;
    }

    /**
     * Remove journees
     *
     * @param \AppBundle\Entity\Journee $journees
     */
    public function removeJournee(\AppBundle\Entity\Journee $journees)
    {
        $this->journees->removeElement($journees);
    }

    /**
     * Get journees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJournees()
    {
        return $this->journees;
    }

    /**
     * Add validations
     *
     * @param \AppBundle\Entity\Journee $validations
     * @return Utilisateur
     */
    public function addValidation(\AppBundle\Entity\Journee $validations)
    {
        $validations->setValidateur($this);
        $this->validations[] = $validations;

        return $this;
    }

    /**
     * Remove validations
     *
     * @param \AppBundle\Entity\Journee $validations
     */
    public function removeValidation(\AppBundle\Entity\Journee $validations)
    {
        $this->validations->removeElement($validations);
    }

    /**
     * Get validations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getValidations()
    {
        return $this->validations;
    }
}
