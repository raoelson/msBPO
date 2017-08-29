<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Journee
 *
 * @ORM\Table(name="journee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JourneeRepository")
 */
class Journee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime")
     */
    private $dateOperation;

    /**
     * @var bool
     *
     * @ORM\Column(name="validation_demandee", type="boolean", nullable=true)
     */
    private $validationDemandee;

    /**
     * @var bool
     *
     * @ORM\Column(name="validee", type="boolean", nullable=true)
     */
    private $validee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_validation", type="datetime", nullable=true)
     */
    private $dateValidation;
    
    /**
     * @var Utilisateur $createur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="journees", cascade={"persist", "merge"})
     */
    private $createur;
    
    /**
     * @var Utilisateur $validateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="validations", cascade={"persist", "merge"})
     */
    private $validateur;
    
    /**
     * @var ArrayCollection $operations
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="journee", cascade={"persist", "merge"})
     */
    private $operations;
    
    public function __construct() {
        $this->dateOperation = new \DateTime();
        $this->operations = new ArrayCollection();
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
     * Set dateOperation
     *
     * @param \DateTime $dateOperation
     * @return Journee
     */
    public function setDateOperation($dateOperation)
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    /**
     * Get dateOperation
     *
     * @return \DateTime 
     */
    public function getDateOperation()
    {
        return $this->dateOperation;
    }

    /**
     * Set validationDemandee
     *
     * @param boolean $validationDemandee
     * @return Journee
     */
    public function setValidationDemandee($validationDemandee)
    {
        $this->validationDemandee = $validationDemandee;

        return $this;
    }

    /**
     * Get validationDemandee
     *
     * @return boolean 
     */
    public function getValidationDemandee()
    {
        return $this->validationDemandee;
    }

    /**
     * Set validee
     *
     * @param boolean $validee
     * @return Journee
     */
    public function setValidee($validee)
    {
        $this->validee = $validee;

        return $this;
    }

    /**
     * Get validee
     *
     * @return boolean 
     */
    public function getValidee()
    {
        return $this->validee;
    }

    /**
     * Set dateValidation
     *
     * @param \DateTime $dateValidation
     * @return Journee
     */
    public function setDateValidation($dateValidation)
    {
        $this->dateValidation = $dateValidation;

        return $this;
    }

    /**
     * Get dateValidation
     *
     * @return \DateTime 
     */
    public function getDateValidation()
    {
        return $this->dateValidation;
    }

    /**
     * Set createur
     *
     * @param \AppBundle\Entity\Utilisateur $createur
     * @return Journee
     */
    public function setCreateur(\AppBundle\Entity\Utilisateur $createur = null)
    {
        $this->createur = $createur;

        return $this;
    }

    /**
     * Get createur
     *
     * @return \AppBundle\Entity\Utilisateur 
     */
    public function getCreateur()
    {
        return $this->createur;
    }

    /**
     * Set validateur
     *
     * @param \AppBundle\Entity\Utilisateur $validateur
     * @return Journee
     */
    public function setValidateur(\AppBundle\Entity\Utilisateur $validateur = null)
    {
        $this->validateur = $validateur;

        return $this;
    }

    /**
     * Get validateur
     *
     * @return \AppBundle\Entity\Utilisateur 
     */
    public function getValidateur()
    {
        return $this->validateur;
    }

    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return Journee
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {
        $operations->setJournee($this);
        $this->operations[] = $operations;

        return $this;
    }

    /**
     * Remove operations
     *
     * @param \AppBundle\Entity\Operation $operations
     */
    public function removeOperation(\AppBundle\Entity\Operation $operations)
    {
        $this->operations->removeElement($operations);
    }

    /**
     * Get operations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperations()
    {
        return $this->operations;
    }
}
